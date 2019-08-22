<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index() {
		$country = Country::with('posts')->get();
		dump($country);

		return;  
    }
}
