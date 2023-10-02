<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class ShopController extends Controller
{
    function category(Category $category){
       // $category = Category::findOrFail($id);

        //return view('shop.category', compact('category'));

        $products = $category->products;

        return view('shop.category', compact('category', 'products'));

    }
}
