<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products= Product::latest()->paginate(4);
      return view('product.index',compact('products'));
    }

    public function trashedProducts()
    {
    //  $products = Product::withTrashed()->latest()->paginate(4);
    $products = Product::onlyTrashed()->latest()->paginate(4);
       return view('product.trash', compact('products'));
    }



    public function create()
    {
        return view('product.create');
    }

  

    public function store(Request $request)
    {$request->validate([
'name'=>'required',   
 'price'=>'required',
 'detail'=>'required'
 
    ]);



        $products=Product::create($request->all());
        return redirect()->route('products.index')
        ->with('success',"product added sucessfy" );
    }

   
    public function show(Product $product)
    {

        return view('product.show',compact('product'))
        ->with('success',"product udate it sucessfy" );
    }

  
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

  
    public function update(Request $request, Product $product)
    {
        $request->validate([
        'name'=>'required',   
         'price'=>'required',
         'detail'=>'required'
         
            ]);
        
        
        
                $product->update($request->all());
                return redirect()->route('products.index')
                ->with('success',"product updated sucessfy" );
            }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
        ->with('success',"product deleted sucessfy" );
    }

    public function softDelete($id)
    {

        $products=Product::find($id)->delete();

        return redirect()->route('products.index')
        ->with('success',"product deleted sucessfy" );
    }

 
    public function backFromSoftDelete($id)
    {


        $product = Product::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->route('products.index')
        ->with('success','product back successfully') ;
    }

    public function  deleteForEver(  $id)
    {

        $product = Product::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('product.trash')
        ->with('success','product deleted successflly') ;
    }
}
