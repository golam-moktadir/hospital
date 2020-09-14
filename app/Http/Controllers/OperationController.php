<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OperationCategory;
use App\Operation;
/**
 * 
 */
class OperationController extends Controller
{
	public function operationCategory(){
		$value = OperationCategory::all();
		return view('admin.operations.category-new',['value' => $value]);
	}	
	public function createOperationCategory(Request $request){
		$request->validate(['operation_category' => 'required|unique:operation_categories']);
		if($request->submit){
			$value = new OperationCategory;
			$value->operation_category = $request->operation_category;
			$value->save();
			return back()->with('success', 'Inserted Successfully');
		}
		else{
			$value = OperationCategory::find($request->id);
			$value->operation_category = $request->operation_category;
			$value->save();
			return redirect()->route('operation-category')->with('success', 'Updated Successfully');
		}
	}
	public function editOperationCategory($id){
		$value = OperationCategory::all();
		$category = OperationCategory::find($id);
		return view('admin.operations.category-edit',['category' => $category,'value' => $value]);
	}
	public function deleteOperationCategory($id){
		$value = OperationCategory::find($id);
		$value->delete();
		return redirect()->route('operation-category')->with('success', 'Deleted Successfully');
	}
	public function operationName(){
		$categories = OperationCategory::all();
		$operations = Operation::all();
		return view('admin.operations.operation-new',['categories' => $categories, 'operations' => $operations]);
	}
	public function createOperationName(Request $request){
		$request->validate(['category_id' => 'required', 'operation_name' => 'required', 'rate' => 'required']);
		if($request->submit){
			$value = new Operation;
			$value->category_id = $request->category_id;
			$value->operation_name = $request->operation_name;
			$value->rate = $request->rate;
			$value->save();
			return back()->with('success', 'Inserted Successfully');
		}
		else{
			$value = Operation::find($request->id);
			$value->category_id = $request->category_id;
			$value->operation_name = $request->operation_name;
			$value->rate = $request->rate;
			$value->save();
			return redirect()->route('operation-name')->with('success', 'Updated Successfully');
		}
	}
	public function editOperationName($id){
		$categories = OperationCategory::all();
		$operation = Operation::find($id);
		$operations = Operation::all();
		return view('admin.operations.operation-edit',['categories'=>$categories,'operations'=>$operations,'operation' => $operation]);
	}
	public function deleteOperationName($id){
		$value = Operation::find($id);
		$value->delete();
		return redirect()->route('operation-name')->with('success', 'Deleted Successfully');
	}
}
?>