<?php

namespace App\Http\Controllers\Ads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index()
    {
    	$ads = Ad::paginate(5);
    	return view('index', $ads);
    }
}
