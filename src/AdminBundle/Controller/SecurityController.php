<?php

namespace AdminBundle\Controller;

use AppBundle\AppBundle;
use Shop\Domain\Model\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityController
 *
 * @package AdminBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="admin_login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // create login form
        $form = $this->createForm('AdminBundle\Form\LoginType');

        // render template
        return $this->render(
            'AdminBundle:security:login.html.twig',
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
