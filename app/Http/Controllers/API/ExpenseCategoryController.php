<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    //


public function category(Request $request){
    $category = new ExpenseCategory();
    $category ->name=$request->input('name');
    $category->user_id = $request->user()->id;
    $category -> save();
    return response()->json(['success' => true, $category]);

    }

public function getCateList()
    {
        $categoryList = ExpenseCategory::all();
        return response()->json($categoryList);
    }
        
public function delete($id) 
    {
    $deleteCate = ExpenseCategory::findOrFail($id);
    if($deleteCate)
       $deleteCate->delete(); 
    else
    return response()->json(null); 
}

}
