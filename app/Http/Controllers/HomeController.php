<?php

namespace App\Http\Controllers;

use App\Models\OfficeVisit;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home');
    }
}

