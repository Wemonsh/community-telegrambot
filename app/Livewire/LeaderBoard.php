<?php

namespace App\Livewire;

use App\Models\OfficeVisit;
use Livewire\Component;

class LeaderBoard extends Component
{
    public function render()
    {
        $visits = OfficeVisit::with('telegram_user')
            ->selectRaw('count(*) as total, telegram_user_id')
            ->groupBy('telegram_user_id')
            ->orderByDesc('total')
            ->get();

        return view('livewire.leader-board', ['visits' => $visits]);
    }
}
