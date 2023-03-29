<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BidRequest;
use App\Http\Requests\BidSendForRepairRequest;
use App\Http\Requests\BidRenovateRequest;
use App\Bid;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BidController extends Controller
{
    public function store(BidRequest $request){
    	$photo = $request->photo;
    	$name = Str::random(). '.'. $photo->getClientOriginalExtension();
    	$path = '/photos/' . $name;
    	Storage::disk('public')->put($path, file_get_contents($photo));
    	$bid = Bid::create($request->all()+[
    		'photo_before_url' => $path,
    		'status' => 1,
    		'user_id' => Auth::id()
    	]);

    	if($bid)
    		return redirect()->route('client.index');
    	return back()->withErrors('Ошибка сохранения');

    }

    public function destroy($id)
    {
        $bid = Bid::find($id);
        $bid->delete();

        return redirect()->route('client.index');
    }

    public function sendForRepair(BidSendForRepairRequest $request, $id)
    {
        $bid = Bid::find($id);
        $bid->update($request->all() + [
            'status' => 2,
            'com' => $request->input('com')
        ]);

        return redirect()->route('admin.index');
    }

    public function renovate(BidRenovateRequest $request, $id)
    {
        $photo = $request->photo;
        $name = Str::random() . '.' . $photo->getClientOriginalExtension();
        $path = '/photos/' . $name;
        Storage::disk('public')->put($path, file_get_contents($photo));

        $bid = Bid::find($id);
        $bid->update([
            'photo_after_url' => $path,
            'status' => 3
        ]);

        return redirect()->route('admin.index');
    }

    public function index()
    {
        $bids =Bid::where('status', 3)
            ->orderBy('updated_at')
            ->take(4)
            ->get();

        return view('main', compact('bids'));
    }

    public function successfulBids() {
        return response()->json([
            'amount' => Bid::where('status', 3)->count()
        ])->setStatusCode(200);
    }

}
