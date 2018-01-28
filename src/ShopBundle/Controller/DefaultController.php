<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // prepare sort params
        $orderBy = array(
            'field' => $request->query->get('sort', 'addedAt'),
            'asc' => $request->query->get('direction', 'desc')
        );

        // get product list
        $products = $this->get('doctrine_mongodb')
            ->getRepository('Shop:Product')
            ->getProducts(array(), $orderBy);

        // paginator configuration
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products,
            $request->query->getInt('page', 1),
            10
        );

        // render template
        return $this->render(
            'ShopBundle:default:index.html.twig',
            array(
                'products' => $pagination
            )
        );
    }
}
