<?php

namespace App\Http\Controllers;

use App\Helpers\ProgressBar;
use App\Models\OfficeVisit;
use App\Models\TelegramUser;
use App\Repositories\Interfaces\TelegramUserRepositoryInterface;
use App\Repositories\TelegramUserRepository;
use Illuminate\Support\Facades\Cache;
use LevelUp\Experience\Models\Level;

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

    function progress_bar($done, $total, $info="", $width=50) {
        $perc = round(($done * 100) / $total);
        $bar = round(($width * $perc) / 100);
        return sprintf("%s%%[%s>%s]%s\r", $perc, str_repeat("=", $bar), str_repeat("_", $width-$bar), $info);
    }
}

