<?php

/**
 * тут супер ужасный класс
 */

namespace App\Services\FakeApi;

use App\Models\Food;
use App\Models\Image;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IntegrationService
{
    /**
     * @return Response
     */
    public function getAllProducts(): Response
    {
        $key = 'fake_api_products';
        $ttl = 600;
        $products = Cache::get($key);
        if($products == null){
            $products = Http::get('https://668ea04dbf9912d4c92f1d93.mockapi.io/api/v1/foods');
            Cache::put($key, $products->json(), $ttl);
        }
        return $products;
    }

    /**
     * @return bool
     */
    public function getIntoFoodsAvailableProducts(): bool
    {
        $products = $this->getAllProducts();

        foreach ($products as $product) {

            $duplicateFood = Food::where('name', $product['name'])->where('price', $product['price']);

            if($product['available'] && $duplicateFood->doesntExist()){
                $this->insertIntoFood($product);
            }
        }

        $this->updateFoodCache();
        return true;
    }

    /**
     * @param array $product
     * @return void
     */
    public function insertIntoFood(array $product): void
    {
        $food = Food::create([
            'name' => $product['name'],
            'category_id' => 6,
            'price' => $product['price']
        ]);
        $image = new Image();
        $image->setPath($product['image']);
        $food->image()->save($image);
    }

    /**
     * @return void
     */
    public function checkActualityAndAvailability(): void
    {
        $products = $this->getAllProducts();
        $foods = Food::all();

        foreach ($foods as $food) {
            $flag = false;
            foreach ($products as $product) {
                if($food->getName() == $product['name'] && $product['available']){
                    $flag = true;
                }
            }
            if(! $flag){
                $food->image()->delete();
                $food->delete();
            }
        }

        $this->updateFoodCache();
    }

    /**
     * @return void
     */
    protected function updateFoodCache(): void
    {
        $key = 'foods_list';
        $ttl = 600;

        $foods = Food::all();
        Cache::put($key, $foods, $ttl);
    }
}
