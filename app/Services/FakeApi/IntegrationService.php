<?php

namespace App\Services\FakeApi;

use App\Models\Food;
use App\Models\Image;
use Illuminate\Support\Facades\Http;

class IntegrationService
{
    public function getAllProducts()
    {
        $response = Http::get('https://668ea04dbf9912d4c92f1d93.mockapi.io/api/v1/foods');
        return $response->json();
    }

    public function getIntoFoodsAvailableProducts(): bool
    {
        $products = $this->getAllProducts();

        foreach ($products as $product) {
            if($product['available']){
                if(Food::where('name', $product['name'])->where('price', $product['price'])->doesntExist()){
                    $image = Image::create([
                        'path' => $product['image'],
                    ]);

                    $food = Food::create([
                        'name' => $product['name'],
                        'category_id'=>6,
                        'price' => $product['price'],
                        'img_id' => $image->getId(),
                    ]);
                }
            }
        }

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
                        $food->image->delete();
                        $food->delete();
                    }
                }
            }
            if(!$flag){
                $food->image->delete();
                $food->delete();
            }
        }
    }
}
