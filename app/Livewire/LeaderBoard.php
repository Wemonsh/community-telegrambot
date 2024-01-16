<?php

namespace App\Livewire;

use App\Models\OfficeVisit;
use Illuminate\Support\Carbon;
use Livewire\Component;

class LeaderBoard extends Component
{
    public function render()
    {
        if (Carbon::now()->day > 17) {
            $start = Carbon::now()->startOfMonth()->addDays(17);
            $end = Carbon::now()->endOfMonth()->addDays(17);
        } else {
            $start = Carbon::now()->subMonth()->startOfMonth()->addDays(17);
            $end = Carbon::now()->startOfMonth()->addDays(17);
        }


        $visits = OfficeVisit::with('telegram_user')
            ->selectRaw('count(*) as total, telegram_user_id')
            ->whereBetween('created_at', [$start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s')])
            ->groupBy('telegram_user_id')
            ->orderByDesc('total')
            ->get();

        return view('livewire.leader-board', ['visits' => $visits]);
    }
}
