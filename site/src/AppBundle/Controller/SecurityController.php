<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller {
  /**
  * @Route("/sign-in", name="login")
  */
  public function loginAction(Request $request, AuthenticationUtils $authUtils)
  {
    // get the login error if there is one
    $error = $authUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authUtils->getLastUsername();

    return $this->render('security/login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
    ));
  }

  /**
   * @Route("/login_check", name="security_login_check")
   */
  public function loginCheckAction()
  {

  }

  /**
  * @Route("/sign-out", name="logout")
  */
  public function logoutAction()
  {

  }
}
