<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
class ProductController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	public function productCategory(){
		$value = ProductCategory::all();
		return view('admin.products.category-new',['value' => $value]);
	}
	public function createProductCategory(Request $request){
		$request->validate(['product_category' => 'required|unique:product_categories']);

		if($request->submit){
			$value = new ProductCategory;
			$value->product_category = $request->product_category;
			$value->save();
			return back()->with('success', 'Inserted Successfully');
		}
		else{
			$value = ProductCategory::find($request->id);
			$value->product_category = $request->product_category;
			$value->save();
			return redirect()->route('product-category')->with('success', 'Updated Successfully');
		}
	}
	public function editProductCategory($id){
		$category = ProductCategory::find($id);
		$value = ProductCategory::all();
		return view('admin.products.category-edit',['category' => $category, 'value' => $value]);
	}
	public function deleteProductCategory($id){
		$value = ProductCategory::find($id);
		$value->delete();
		return redirect()->route('product-category')->with('success', 'Deleted Successfully');
	}
	public function ProductName(){
		$categories = ProductCategory::all();
		$products = Product::all();
		return view('admin.products.product-new',['categories' => $categories, 'products' => $products]);
	}
	public function createProductName(Request $request){
		$request->validate(['category_id' => 'required', 'product_name' => 'required']);

		if($request->submit){
			$value = new Product;
			$value->category_id = $request->category_id;
			$value->product_name = $request->product_name;
			$value->save();
			return back()->with('success', 'Inserted Successfully');
		}
		else{
			$value = Product::find($request->id);
			$value->category_id = $request->category_id;
			$value->product_name = $request->product_name;
			$value->save();
			return redirect()->route('product-name')->with('success', 'Updated Successfully');
		}
	}
	public function editProductName($id){
		$categories = ProductCategory::all();
		$product = Product::find($id);
		$products = Product::all();
		return view('admin.products.product-edit',['categories' => $categories, 'product' => $product, 'products' => $products]);
	}
	public function deleteProductName($id){
		$value = Product::find($id);
		$value->delete();
		return redirect()->route('product-name')->with('success', 'Deleted Successfully');
	}
}
?>