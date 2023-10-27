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

    private TelegramUserRepositoryInterface $telegramRepository;

    public function __construct()
    {
        $this->telegramRepository = new TelegramUserRepository(new TelegramUser());
    }
    public function __invoke()
    {
        $telegramUser = $this->telegramRepository->getByTelegramId(168048474);

        $message = sprintf('Привет, %s', $telegramUser->name) . PHP_EOL . PHP_EOL;
        $message .= sprintf('Твой текущий уровень: %s', $telegramUser->getLevel()) . PHP_EOL;
        $message .= sprintf('До следующиего уровня: %s', $telegramUser->nextLevelAt()) . PHP_EOL . PHP_EOL;

        $message .= ProgressBar::init($telegramUser->getPoints(),
            Level::where('level', '>', $telegramUser->getLevel())->limit(1)->first(['next_level_experience'])->next_level_experience);

        //$message->addPoints(300);
        dd($message);

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
