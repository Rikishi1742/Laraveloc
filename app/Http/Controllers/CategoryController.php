<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryDeleteRequest;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    public function store(CategoryRequest $request){
    	$category = Category::create($request->all());
    	if($category)
    		return redirect()->route('admin.index');
    	return back()->withErrors('Ошибка сохранения');
    }

    public function destroy(CategoryDeleteRequest $request){
    	$category = Category::find($request->category_id);
    	$category->delete();
    	return redirect()->route('admin.index');
    }
}
