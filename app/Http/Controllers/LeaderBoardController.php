<?php

namespace App\Http\Controllers;

use App\Models\OfficeVisit;
use Carbon\Carbon;

class LeaderBoardController extends Controller
{
    public function index()
    {
        $firstOfficeVisit = OfficeVisit::first();
        $startDate = Carbon::parse($firstOfficeVisit->created_at)->day(17);
        $endDate = Carbon::parse($firstOfficeVisit->created_at)->addMonth()->startOfMonth()->addDays(17);

        $leaders = [];

        while (true)
        {
            $visits = OfficeVisit::with('telegram_user')
                ->selectRaw('count(*) as total, telegram_user_id')
                ->whereBetween('created_at', [$startDate->format('Y-m-d H:i:s'), $endDate->format('Y-m-d H:i:s')])
                ->groupBy('telegram_user_id')
                ->orderByDesc('total')
                ->limit(10)
                ->get();

            $leaders[$startDate->format('Y-m-d').' - '.$endDate->format('Y-m-d')] = $visits;

            $startDate->addMonth();
            $endDate->addMonth();
            if ($endDate > Carbon::now())
            {
                break;
            }
        }

        return view('leaderboard', ['leaders' => $leaders]);
    }
}
