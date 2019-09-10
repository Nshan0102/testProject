<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Manufacturer;
use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function accessCheck()
    {
        if (!Auth::user() || Auth::user()->id !== 1){
            return false;
        }else{
            return true;
        }
    }

    public function showCRUD()
    {
        if(!$this->accessCheck()){
            return redirect('home');
        }
        $products = Product::where('id','<',51)->with(['Category','Country','Manufacturer'])->get();
        $countries = Country::all();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('admin.productCrud', compact('products','countries','categories','manufacturers'));
    }

    public function productUpdate(Request $request)
    {
        if(!$this->accessCheck()){
            return redirect('home');
        }
        $product = Product::find((int)$request->input('id'));
        $product->update([
            "sku" => $request->input('sku'),
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "color" => $request->input('color'),
            "category_id" => (int)$request->input('category_id'),
            "country_id" => (int)$request->input('country_id'),
            "manufacturer_id" => (int)$request->input('manufacturer_id'),
        ]);
        return "success";
    }

    public function productDelete(Request $request)
    {
        if(!$this->accessCheck()){
            return redirect('home');
        }
        $product = Product::find((int)$request->input('id'));
        $product->delete();
        return "success";
    }

    public function productLoadMore(Request $request)
    {
        if(!$this->accessCheck()){
            return redirect('home');
        }
        $countStart = (int)$request->input('countStart');
        $loadedProducts = Product::skip($countStart)->take(10)->with(['Category','Country','Manufacturer'])->get();
        return $loadedProducts;
    }
}
