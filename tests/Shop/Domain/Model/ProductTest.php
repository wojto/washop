<?php
declare(strict_types=1);

namespace Tests\Shop\Domain\Model;

use PHPUnit\Framework\TestCase;
use Shop\Domain\Model\ProductId;
use Shop\Domain\Model\UserId;
use Shop\Domain\Model\ValueObject\Email;
use Shop\Domain\Model\Product;
use Money\Money;
use Shop\Domain\Model\User;

class ProductTest extends TestCase
{
    public function testConstruct()
    {
        // product parameters
        $id = new ProductId();
        $name = 'testowa nazwa';
        $description = 'testowy opis';
        $addedAt = new \DateTime();
        $price = Money::PLN(99);
        $user = new User(
            new UserId(),
            new Email('codesensus@gmail.com'),
            'sha1',
            '',
            'test',
            new \DateTime()
        );

        // create new product
        $product = new Product($id, $name, $description, $price, $addedAt, $user);

        // compare parameters with product values
        $this->assertEquals($id, $product->getId());
        $this->assertEquals($name, $product->getName());
        $this->assertEquals($description, $product->getDescription());
        $this->assertEquals($price, $product->getPrice());
        $this->assertEquals($addedAt, $product->getAddedAt());
        $this->assertEquals($user, $product->getUser());
    }
}
