<?php

namespace App\Services\FakeApi;

use App\Models\Food;
use App\Models\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IntegrationService
{
    public function getAllProducts()
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

    public function getIntoFoodsAvailableProducts(): bool
    {
        $products = $this->getAllProducts();

        foreach ($products as $product) {
            if($product['available']){
                if(Food::where('name', $product['name'])->where('price', $product['price'])->doesntExist()){
                    $food = Food::create([
                        'name' => $product['name'],
                        'category_id'=>6,
                        'price' => $product['price']
                    ]);
                    $image = new Image();
                    $image->setPath($product['image']);
                    $food->image()->save($image);
                }
            }
        }

        $this->updateFoodCache();
        return true;
    }

    public function checkActualityAndAvailability(): void
    {
        $products = $this->getAllProducts();

        $foods = Food::all();

        foreach ($foods as $food) {
            $flag = false;
            foreach ($products as $product) {
                if($food->getName() == $product['name']){
                    $flag = true;
                    if(!$product['available']){
                        $food->image()->delete();
                        $food->delete();
                    }
                }
            }
            if(!$flag){
                $food->image()->delete();
                $food->delete();
            }
        }

        $this->updateFoodCache();
    }

    protected function updateFoodCache(): void
    {
        $key = 'foods_list';
        $ttl = 600;

        $foods = Food::all();
        Cache::put($key, $foods, $ttl);
    }
}
