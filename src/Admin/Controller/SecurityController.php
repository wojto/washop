<?php

namespace Admin\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 *
 * @package Admin\Controller
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="admin_login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // create login form
        $form = $this->createForm('Admin\Form\LoginType');

        // render template
        return $this->render(
            'admin/security/login.html.twig',
            array(
                // last username entered by the user
                'lastUsername' => $lastUsername,
                'error' => $error,
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/logout", name="admin_logout")
     */
    public function logoutAction()
    {
    }
}
