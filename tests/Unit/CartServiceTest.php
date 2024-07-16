<?php

namespace Tests\Unit;

use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{
    private CartService $cartService;
    private $cartMock;

    public function setUp(): void
    {
        $this->cartService = new CartService();
        $this->cartMock = Mockery::mock('alias:App\Models\Cart');
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testGetAll()
    {
        $fake = new Collection([
            (object) ['id' => 1, 'customer_id' => 2],
            (object) ['id' => 2, 'customer_id' => 3],
        ]);

        $this->cartMock->shouldReceive('all')->once()->andReturn($fake);

        $carts = $this->cartService->getAll();

        $this->assertInstanceOf(Collection::class, $carts);
        $this->assertCount(2, $carts);
    }

    public function testGetByUserId()
    {
        $fake = new Collection([
            (object) ['id' => 1, 'customer_id' => 1]
        ]);

        $this->cartMock->shouldReceive('with')->with('foods')->andReturnSelf();
        $this->cartMock->shouldReceive('where')->with('customer_id', 1)->andReturnSelf();
        $this->cartMock->shouldReceive('get')->andReturn($fake);

        $carts = $this->cartService->getByUserId(1);
        $this->assertInstanceOf(Collection::class, $carts);
        $this->assertCount(1, $carts);
    }
}
