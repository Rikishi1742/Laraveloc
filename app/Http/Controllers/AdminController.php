<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Bid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	$bids = Bid::orderBy('status')
    		->orderByDesc('created_at')
    		->get();

    	return view('admin.index', compact('categories', 'bids'));

        if(Auth::user()->role!=1) {
            return view('admin.index', compact('categories', 'bids'));
        } else {
            return redirect()->route('client.index');
        }
    }

    public function newCategory(){
		return view('admin.new_category');
	}
}
