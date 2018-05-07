<?php

namespace App\Http\Controllers\Ads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use Carbon\Carbon;

class AdsController extends Controller
{
    public function index()
    {
    	$ads = Ad::paginate(6);
    	return view('ads.index', ["ads" => $ads]);
    }

    public function show($id)
    {
    	$ad = Ad::where('id', $id)->get()->first();
    	return view('ads.show', ["ad" => $ad]);
    }

    public function add()
    {
    	if (auth()->check() == true)
    	{
    		return view('ads.create');
    	} else {
    		return redirect('/login')->withErors([
    			'message' => "You have to log in to leave the Ads",
    		]);
    	}
    }

    public function store()
    {
    	if (auth()->check() == true)
    	{
    		$this->validate(request(), [
    			'title' => 'required|min:2|max:250',
    			'description' => 'required',
    		]);

    		Ad::create([
    			'title' => request('title'),
    			'description' => request('description'),
    			'users_id' => auth()->user()->id,
    		]);

    		$ad_id = Ad::where('title', request('title'))->pluck('id')->first();
    		return redirect("/ad/$ad_id");
    	} else {
    		return redirect('/login')->withErors([
    			'message' => "You have to log in to leave the Ad",
    		]);
    	}
    }

    public function remove(Ad $ad)
    {
        if (auth()->check()) {
            if (auth()->user()->id == $ad->users_id) {
                $ad->delete($ad->users_id);
                return redirect()->home();
            }
        }
    }

    public function edit(Ad $ad)
    {
        return view('ads.edit', ["ad" => $ad]);
    }

    public function update(Ad $ad)
    {
        if (auth()->check()) {    
            if (auth()->user()->id == $ad->users_id) {
                $this->validate(request(), [
                    'title' => 'required|min:2|max:250',
                    'description' => 'required',
                ]);
                Ad::where('id', $ad->id)->update([
                    'title' => request('title'),
                    'description' => request('description'),
                    'updated_at' => Carbon::now()
                ]);
                $ad_id = $ad->id;
                return redirect("/ad/$ad_id");
            } else {
                return back();
            }
        } else {
            return redirect('/login')->withErors([
                'message' => "Log in to edit the post"
            ]);
        }
    }
}
