<?php

namespace App\Http\Controllers;

use App\Models\OfficeVisit;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke()
    {
        $visits = OfficeVisit::with('telegram_user')
            ->selectRaw('count(*) as total, telegram_user_uuid')
            ->groupBy('telegram_user_uuid')
            ->get();

        $code = Cache::get('code');

        return view('home', [
            'visits' => $visits,
            'code' => $code
        ]);
    }
}
