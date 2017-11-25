<?php

namespace Tests\Domain\Command;

use Money\Currency;
use Money\Money;
use Shop\Domain\Command\NewProductCommand;
use Shop\Domain\Command\NewProductHandler;
use PHPUnit\Framework\TestCase;
use Shop\Domain\Model\Product;
use Shop\Domain\Model\ProductId;
use Shop\Domain\Model\User;
use Shop\Domain\Transport\MailerInterface;
use Shop\Infrastructure\Repository\InMemoryProductsRepository;
use Shop\Infrastructure\Transport\DummyMailer;
use Shop\Infrastructure\Validator\SatisfiedValidator;

class AdminControllerTest extends TestCase
{
    /**
     * Test success adding product
     */
    public function testAddingProduct()
    {
        $id = new ProductId();

        // create new command
        $command = new NewProductCommand();
        $command->id = $id;
        $command->name = 'testowa nazwa';
        $command->description = 'testowy opis';
        $command->addedAt = new \DateTime();
        $command->price = Money::PLN(99);
        $command->user = \Mockery::mock(User::class);

        // set handler parameters
        $repository = new InMemoryProductsRepository();
        $validator = new SatisfiedValidator();
        $mailer = new DummyMailer();

        // create product handler
        $producthandler = new NewProductHandler(
            $repository,
            $validator,
            $mailer
        );
        $producthandler->handle($command);

        // checking if product is succesfully added and returned
        $product = $repository->getById($id);
        $this->assertTrue($product instanceof Product);

        // checking if number of results is correct
        $this->assertEquals(1, count($repository->getProducts()));
    }
}
