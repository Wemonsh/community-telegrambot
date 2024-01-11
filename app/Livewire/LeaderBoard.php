<?php

namespace App\Livewire;

use App\Models\OfficeVisit;
use Illuminate\Support\Carbon;
use Livewire\Component;

class LeaderBoard extends Component
{
    public function render()
    {
        $visits = OfficeVisit::with('telegram_user')
            ->selectRaw('count(*) as total, telegram_user_id')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'), Carbon::now()->endOfMonth()->format('Y-m-d H:i:s')])
            ->groupBy('telegram_user_id')
            ->orderByDesc('total')
            ->get();

        return view('livewire.leader-board', ['visits' => $visits]);
    }
}
