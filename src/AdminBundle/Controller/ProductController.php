<?php

namespace AdminBundle\Controller;

use AdminBundle\AdminBundle;
use AdminBundle\Form\ProductType;
use Shop\Domain\Command\NewProductCommand;
use Shop\Domain\Model\Product;
use Shop\Domain\Exception\InvalidProductException;
use Shop\Domain\Exception\ProductNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Shop\Domain\Model\ProductId;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class ProductController
 *
 * @package AdminBundle\Controller
 */
class ProductController extends Controller
{
    /**
     * @Route("/new-product", name="admin_product_add")
     */
    public function productAddAction(Request $request)
    {
        // prepare command
        $command = new NewProductCommand();
        $command->id = new ProductId();
        $command->addedAt = new \DateTime();
        $command->user = $this->getUser();

        // create product form and handle request
        $form = $this->createForm(ProductType::class, $command);
        $form->handleRequest($request);

        // if form is submitted
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // handle by product handler
                $this->get('Shop\Domain\Command\NewProductHandler')->handle($form->getData());

                // set succesfully message
                $this->addFlash('success', $this->get('translator')->trans('Produkt został dodany.'));
            } catch (InvalidProductException $e) {
                $this->addFlash('error', nl2br($e->getMessage()));
            }
        }

        // render template
        return $this->render(
            'AdminBundle:product:product_add.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/products", name="admin_product_list")
     */
    public function productListAction(Request $request)
    {
        // set sort params
        $orderBy = array(
            'field' => $request->query->get('sort', 'addedAt'),
            'asc' => $request->query->get('direction', 'desc')
        );

        // get products
        $products = $this->get('doctrine_mongodb')
            ->getRepository('Shop:Product')
            ->getProducts(array(), $orderBy);

        // configure paginator
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products,
            $request->query->getInt('page', 1),
            20
        );

        // render template
        return $this->render(
            'AdminBundle:product:product_list.html.twig',
            array(
                'products' => $pagination
            )
        );
    }
}
