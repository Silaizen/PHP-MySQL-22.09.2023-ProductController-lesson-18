<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
       // $products = Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
         'name' => 'required',
         'price' => 'required|integer',
         'category_id' => 'required|exists:categories,id',
         //'image' => 'image'
       ]);

       $product = Product::create($request->all());


      /*
      Допиши в файле  
      функцию store по такому принципу:
 загрузить изображение, если есть - $product->image = $path 
        в это свойство image будем записывать путь к изображению,
         которое загрузили  и сам продукт сохраним -  $product-> save();
        
        if($request -> image){
        $path = $request->file('image')->store('uploads');
        $product -> image = $path;
        $product -> save();
        }
*/


   // if ($request->hasFile('image')) {
    //    $imagePath = $request->file('image')->store('products'); 
    //    $product->image = $imagePath; 
    //}

   // $product->save(); 

        
         return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
         'price' => 'required|integer',
         'category_id' => 'required|exists:categories, id',
         'image' => 'image'
        ]);
        $product->update($request->all());

    return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       

        
        if ($product->image) {
            Storage::delete($product->image);
        }
    
        $product->delete();
    
        return redirect()->route('product.index');
    }
}
