<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Code extends Component
{
    public function render()
    {
        return view('livewire.code', [
            'code' => Cache::get('code') ?? '000000'
        ]);
    }
}
