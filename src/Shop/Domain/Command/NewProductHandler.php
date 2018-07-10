<?php

namespace Shop\Domain\Command;

use Shop\Domain\Model\ProductId;
use Shop\Domain\Transport\MailerInterface;
use Shop\Domain\Model\Product;
use Shop\Domain\Exception\InvalidProductException;
use Shop\Domain\Repository\ProductRepositoryInterface;
use Shop\Domain\Validator\ValidatorInterface;
use Shop\Infrastructure\Repository\Doctrine\ProductRepository;

/**
 * Handler for NewProduct command
 *
 * @package Shop\Domain\Command
 */
class NewProductHandler
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * NewProductHandler constructor
     *
     * @param ProductRepositoryInterface $productRepository
     * @param ValidatorInterface $validator
     * @param MailerInterface $mailer
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        $validator,
        MailerInterface $mailer
    ) {
        $this->productRepository = $productRepository;
        $this->validator = $validator;
        $this->mailer = $mailer;
    }

    /**
     * @param NewProductCommand $productCommand
     * @return bool|int
     */
    public function handle(NewProductCommand $productCommand)
    {
        // creating new product entity
        $product = new Product(
            $productCommand->id,
            $productCommand->name,
            $productCommand->description,
            $productCommand->price,
            $productCommand->addedAt,
            $productCommand->user
        );

        // validate if data is correct
        $errors = $this->validator->validate($product);
        if ($errors->count()) {
            // product have errors, throw exception
            throw InvalidProductException::forId(new ProductId($product->getId()), $this->prepareErrors($errors));
        }

        // save product by repository
        $this->productRepository->save($product);

        // sending e-mail notification
        $this->mailer->sendNewProductEmail($product);
    }

    /**
     * Preparint error messages
     *
     * @param $errors
     */
    private function prepareErrors($errors)
    {
        $messages = [];

        // iterate through errors
        foreach ($errors as $error) {
            $messages[] = $error->getPropertyPath().': '.$error->getMessage();
        }

        return $messages;
    }
}
