<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
  /**
   *  @Route("/admin", name="admin")
   */
  public function admin()
  {
    return $this->render("admin.html.twig", []);
  }
}
