<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 *
 * @package AdminBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="admin_homepage")
     */
    public function indexAction()
    {
        // render template
        return $this->render('AdminBundle:default:index.html.twig');
    }
}
