<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Shop\Infrastructure\Repository\Doctrine\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Controller used to manage blog contents in the public part of the site.
 *
 * @Route("/")
 */
class ShopController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Cache(smaxage="10")
     */
    public function index(Request $request, ProductRepository $productRepository, PaginatorInterface $paginator)
    {
        // prepare sort params
        $orderBy = array(
            'field' => $request->query->get('sort', 'addedAt'),
            'asc' => $request->query->get('direction', 'desc')
        );

        // get product list
        $products = $productRepository
            ->getProducts(array(), $orderBy);

        // paginator configuration
        $pagination = $paginator->paginate(
            $products,
            $request->query->getInt('page', 1),
            10
        );

        // render template
        return $this->render(
            'shop/default/index.html.twig',
            array(
                'products' => $pagination
            )
        );
    }

//    /**
//     * @Route("/", name="shop_index")
//     * @Method("GET")
//     * @Cache(smaxage="10")
//     */
//    public function index(): Response
//    {
//        return $this->render('shop/index.html.twig');
//    }
}
