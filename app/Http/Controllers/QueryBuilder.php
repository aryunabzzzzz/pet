<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilder extends Controller
{
    public function index(): Collection
    {
//        $customers = DB::table("customers")
//            ->where('name', 'like', 'Ra' . '%')
//            ->select('name', 'email')
//            ->get();

//        $customers = DB::table("customers")
//            ->where('name', 'like', 'Ra' . '%')
//            ->orWhere(function (Builder $query) {
//                $query->where('name', 'like', 'Mr' . '%')
//                    ->where('birthday', '>', '2022-01-01');
//            })
//            ->select('name', 'email')
//            ->get();

//        $customers = DB::table('customers')
//            ->join('carts', 'customers.id', '=', 'carts.customer_id')
//            ->select('customers.name', 'customers.email', 'carts.id as cart_id')
//            ->get();

//        $customers = Customer::query()->has('cart')->get();

//        $customers = Customer::has('cart')
//            ->select('name', 'email')
//            ->get();

//        $customers = Customer::query()
//            ->doesntHave('cart')
//            ->select('name', 'email')
//            ->limit(10)
//            ->get();

//        $products = DB::table('foods')
//            ->where('price', '>', 100)
//            ->selectRaw('name, price, price - 50 as discount_price')
//            ->get();

//        $products = DB::table('categories')
//            ->join('foods', 'categories.id', '=', 'foods.category_id')
//            ->selectRaw('categories.id, categories.name, count(foods.id) as products_count')
//            ->groupBy('categories.id')
//            ->get();
//        return $products;

//        $categories = DB::table('categories')
//            ->join('foods', 'foods.category_id', '=', 'categories.id')
//            ->selectRaw('categories.name, sum (foods.price) as price')
//            ->groupBy('categories.id')
//            ->having('price', '>', 3000)
//            ->get();

        $categories = DB::table('categories')
            ->join('foods', 'categories.id', '=', 'foods.category_id')
            ->selectRaw('categories.name, sum(foods.price) as price')
            ->groupBy('categories.id')
            ->having('price', '>', 2000)
            ->get();

        return $categories;
    }
}
