<?php

namespace App\Http\Controllers;

use App\Models\OfficeVisit;

class HomeController extends Controller
{
    public function __invoke()
    {


        $visits = OfficeVisit::with('telegram_user')
            ->selectRaw('count(*) as total, telegram_user_id')
            ->groupBy('telegram_user_id')
            ->get();


        return view('home', [
            'visits' => $visits
        ]);
    }
}

