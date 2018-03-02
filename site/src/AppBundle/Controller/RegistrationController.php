<?php
namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegistrationController extends Controller
{
  /**
   *  @Route("/sign-up", name="user_registration")
   */
  public function registerAction(Request $request,UserPasswordEncoderInterface $passwordEncoder)
  {

    /*
    Création d'un nouvel utilisateur
    */
    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    /*
    Si validation du formulaire pour créer un nouvel utilisateur
    */
    if($form->isSubmitted() && $form->isValid())
    {
      //Encodage du mdp
      $encoder = $this->get('security.password_encoder');
      $password = $encoder->encodePassword($user, $user->getPlainPassword());
      $user->setPassword($password);
      //Détermination du rôle
      $user->setRole('ROLE_USER');
      //Enregistrement du nouvel utilisateur
      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      return $this->redirectToRoute('login');
    }
    /*
    Sinon retour à nouveau de la page de création de compte
    */
    return $this->render('/security/register.html.twig',[
      'form' => $form->createView()
    ]);
  }
}
