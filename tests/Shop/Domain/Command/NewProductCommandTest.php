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
use Shop\Infrastructure\Validator\YmlValidator;

/**
 * Class NewProductCommandTest
 *
 * @package Tests\Domain\Command
 */
class NewProductCommandTest extends TestCase
{
    /**
     * Test of successfully adding product
     */
    public function testProductWasCreatedAndReturnedSuccesfully()
    {
        $id = new ProductId();

        // create new command
        $command = new NewProductCommand();
        $command->id = $id;
        $command->name = 'testowa nazwa';
        $command->description = 'Ex rerum aut quia perferendis culpa duis laborum ipsam quidem dolor ex magni ' .
            'magnam itaque perferendis inventore excepturi Voluptas sed voluptatibus animi ex sed dolore Nam quia ' .
            'reprehenderit consequuntur nostrud nisi excepteur non commodi adipisicing eius eum dolore';
        $command->addedAt = new \DateTime();
        $command->price = Money::PLN(99);
        $command->user = \Mockery::mock(User::class);

        // set handler parameters
        $repository = new InMemoryProductsRepository();
        $validator = new YmlValidator();
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

    /**
     * Test of failed adding product
     *
     * @expectedException Shop\Domain\Exception\InvalidProductException
     */
    public function testNewProductHasNoName()
    {
        $id = new ProductId();

        // create new command
        $command = new NewProductCommand();
        $command->id = $id;

        // name is empty, so it should throw exception
        $command->name = '';

        $command->description = 'Voluptas sed voluptatibus animi ex sed dolore Nam quia reprehenderit consequuntur ' .
            'nostrud nisi excepteur non commodi adipisicing eius eum dolore Omnis consequatur Aspernatur asperiores ' .
            'in natus iste qui sunt rem sed in sit commodo repudiandae doloribus adipisci';
        $command->addedAt = new \DateTime();
        $command->price = Money::PLN(99);
        $command->user = \Mockery::mock(User::class);

        // handle command
        $this->newProductHandle($command);
    }

    /**
     * Test of failed adding product
     *
     * @expectedException Shop\Domain\Exception\InvalidProductException
     */
    public function testNewProductHasTooShortDescription()
    {
        $id = new ProductId();

        // create new command
        $command = new NewProductCommand();
        $command->id = $id;
        $command->name = 'testowa nazwa';

        // description is too short (less than 100 chars), so it should throw exception
        $command->description = 'za krotki opis';

        $command->addedAt = new \DateTime();
        $command->price = Money::PLN(99);
        $command->user = \Mockery::mock(User::class);

        // handle command
        $this->newProductHandle($command);
    }

    /**
     * Handle NewProduct command
     *
     * @param $command
     */
    private function newProductHandle($command)
    {
        // set handler parameters
        $repository = new InMemoryProductsRepository();
        $validator = new YmlValidator();
        $mailer = new DummyMailer();

        // create product handler
        $producthandler = new NewProductHandler(
            $repository,
            $validator,
            $mailer
        );
        $producthandler->handle($command);
    }
}
