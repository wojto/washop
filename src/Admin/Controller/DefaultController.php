<?php

namespace Admin\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 *
 * @package Admin\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="admin_homepage")
     * @Method("GET")
     * @Cache(smaxage="10")
     */
    public function indexAction()
    {
        // render template
        return $this->render('admin/default/index.html.twig');
    }
}
