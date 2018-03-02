<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
/**/
use AppBundle\Manager\FilmManager;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * Film controller.
 *
 * @Route("film")
 */
class FilmController extends Controller
{
    private $fm;
    public function __construct(FilmManager $filmManager)
    {
        $this->fm = $filmManager;
    }


    /**
     * Lists all film entities.
     *
     * @Route("/", name="film_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $films = $em->getRepository('AppBundle:Film')->findAll();

        return $this->render('film/index.html.twig', array(
            'films' => $films,
        ));
    }

    /**
     * Creates a new film entity.
     *
     * @Route("/new", name="film_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $film = new Film();
        $form = $this->createForm('AppBundle\Form\FilmType', $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $film->getVideo();
            $fileName = md5(uniqid()).".".$file->guessExtension();
            var_dump($fileName);
            $file->move($this->getParameter("film_directory"), $fileName);
            $film->setVideo($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            return $this->redirectToRoute('film_show', array('id' => $film->getId()));
        }

        return $this->render('film/new.html.twig', array(
            'film' => $film,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a film entity.
     *
     * @Route("/{id}", name="film_show")
     * @Method("GET")
     */
    public function showAction(Film $film)
    {
        $deleteForm = $this->createDeleteForm($film);
        $fileLocation = "uploads/film/".$film->getVideo();
        return $this->render('film/show.html.twig', array(
            'film' => $film,
            'delete_form' => $deleteForm->createView(),
            "fileLocation" => $fileLocation
        ));
    }

    /**
     * Displays a form to edit an existing film entity.
     *
     * @Route("/{id}/edit", name="film_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Film $film)
    {
        $deleteForm = $this->createDeleteForm($film);
        $editForm = $this->createForm('AppBundle\Form\FilmType', $film);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('film_edit', array('id' => $film->getId()));
        }

        return $this->render('film/edit.html.twig', array(
            'film' => $film,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a film entity.
     *
     * @Route("/{id}", name="film_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Film $film)
    {
        $form = $this->createDeleteForm($film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($film);
            $em->flush();
        }

        return $this->redirectToRoute('film_index');
    }

    /**
     * Creates a form to delete a film entity.
     *
     * @param Film $film The film entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Film $film)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('film_delete', array('id' => $film->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @Route("/search", name="film-search")
     */
    public function searchFilmAction(Request $request)
    {
        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->add('titre', TextType::class)
            ->add('Search', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $query = $this->fm->getSearchFilms($data["titre"]);
            if(count($query) > 0)
            {
                return $this->resultSearchAction($query);
            }
            else {
                var_dump("No result");
            }
        }    
        return $this->render("film/search.html.twig", ["form" => $form->createView()]);
    }

    /**
     * @Route("/result", name="film-search-result")
     */
    public function resultSearchAction($form)
    {
        return $this->render("film/result.html.twig", ["data" => $form]);
    }
}
