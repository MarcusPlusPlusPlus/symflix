<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends Controller
{
     /**
      * @Route("/admin", name="admin")
      **/
     public function adminAction()
     {
         return $this->render("admin.html.twig", []);
     }
}
