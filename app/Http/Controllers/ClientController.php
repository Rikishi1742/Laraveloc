<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Bid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ClientController extends Controller
{
   	public function index(Request $request)
    {
      if($request->filled('status') &&
        ($request->status < 1 || $request->status > 3)) {
        return redirect()->route('client.index');
      }
      $bids = Bid::where('user_id', Auth::id())
    	 ->orderByDesc('created_at');
      $filter = 0;
      if($request->filled('status')) {
        $bids->where('status', $request->status);
        $filter = $request->status;
      }
      $bids = $bids->get();

    	return view('client.index', compact('bids', 'filter'));
    }

   	public function newBid()
   	{
   		$categories = Category::all();
   		return view('client.new_bid', compact('categories'));
   	}
}
