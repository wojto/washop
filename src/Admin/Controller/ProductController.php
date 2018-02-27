<?php

namespace Admin\Controller;

use Admin\Form\ProductType;
use Shop\Domain\Command\NewProductCommand;
use Shop\Domain\Model\Product;
use Shop\Domain\Exception\InvalidProductException;
//use Shop\Domain\Exception\ProductNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Shop\Domain\Model\ProductId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Validator\Constraints\Date;
use Shop\Infrastructure\Repository\Doctrine\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Shop\Domain\Command\NewProductHandler;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class ProductController
 *
 * @package Admin\Controller
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/new-product", name="admin_product_add")
     */
    public function productAddAction(
        Request $request,
        NewProductHandler $newProductHandler,
        TranslatorInterface $translator
    )
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
                $newProductHandler->handle($form->getData());

                // set succesfully message
                $this->addFlash('success', $translator->trans('Produkt został dodany.'));
            } catch (InvalidProductException $e) {
                $this->addFlash('error', nl2br($e->getMessage()));
            }
        }

        // render template
        return $this->render(
            'admin/product/product_add.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/products", name="admin_product_list")
     */
    public function productListAction(
        Request $request,
        ProductRepository $productRepository,
        PaginatorInterface $paginator
    )
    {
        // set sort params
        $orderBy = array(
            'field' => $request->query->get('sort', 'addedAt'),
            'asc' => $request->query->get('direction', 'desc')
        );

        // get products
        $products = $productRepository->getProducts(array(), $orderBy);

        // configure paginator
        $pagination = $paginator->paginate(
            $products,
            $request->query->getInt('page', 1),
            20
        );

        // render template
        return $this->render(
            'admin/product/product_list.html.twig',
            array(
                'products' => $pagination
            )
        );
    }
}
