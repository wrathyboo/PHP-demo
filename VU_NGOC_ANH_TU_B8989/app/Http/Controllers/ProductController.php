<?php

namespace App\Http\Controllers;

use App\Models\Applist;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProductController extends Controller
{
    //
    public function create()
    {
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        if (request('image')) {
            if (request('image')->isValid()) {
                $file = request('image');
                $newImage = generateClientFilename(request('name'), $file->getClientOriginalExtension());
                $file->move(public_path('images/products/'), $newImage); 
                $product->image = $newImage;
            }
        }
        else {
            $product->image = 'default.png';
        }
        $product->save();
        return redirect()->route('product.list');
    }
    public function list()
    {
        $_Auth = Auth::user();
        $products = Product::orderBy('name','ASC')->paginate(4);
        $rank = $products->firstItem();
        return view('admin.products-list',compact('_Auth','products','rank'));
        # code...
    }
    public function destroy($id)
    {
        Product::find($id)->delete();
        return  redirect()->back();
    }
    public function update_page($id)
    {
        $_Auth = Auth::user();
        $product = Product::find($id);
        return view('admin.products-update',compact('_Auth','product'));
    }
    public function update($id)
    {
        $_Auth = Auth::user();
        $product = Product::find($id);
 
            $product->name     = request('name');
            $product->price    = request('price');

       
        
        if (!empty(request('image'))) {
            if (request('image')->isValid()) {
                $file = request('image');
                $newImage = generateClientFilename(request('name'), $file->getClientOriginalExtension());
                if (file_exists(public_path('images/'.'/'.$newImage))){
                    File::delete(public_path('images/'.'/'.$newImage));
                }
                
                $file->move(public_path('images/'), $newImage);
               
                $product->image = $newImage;
            }
        }
        else {
            $product->image = 'default.png';
        }
        if ( $product->save()){
            return redirect()->route('product.list');
        }
        else {
            return view('admin.products-update',compact('product','_Auth'));
        }
    }
}
