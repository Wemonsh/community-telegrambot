<?php

namespace App\Services\Telegram\Conversations;

use App\Helpers\Localization;
use App\Models\OfficeVisit;
use App\Models\TelegramUser;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class VisitOfficeConversation extends Conversation
{
    public function run()
    {
        $telegram_user = TelegramUser::where('telegram_id', $this->bot->getUser()->getId())->first();

        if ($telegram_user === null) {
            $this->say('Вы еще не зарегистрированы, пройдите пожалуйста регистрацию');
            $this->bot->startConversation(new RegistrationConversation());
            return true;
        }

        $officeVisits = OfficeVisit::where('telegram_user_id', $telegram_user->id)
            ->whereBetween('created_at', [Carbon::today()->startOfDay()->format('Y-m-d H:i:s'),
                Carbon::today()->endOfDay()->format('Y-m-d H:i:s')])->count();

        if ($officeVisits > 0) {
            $this->say(Localization::get('botman.visit_command.visit_registered'));
        } else {
            $this->askOfficeCode();
        }

        return true;
    }

    public function askOfficeCode()
    {
        $this->ask(Localization::get('botman.visit_command.welcome_questions'), function(Answer $answer) {
            if (Cache::get('code') === (int)$answer->getText()) {
                $this->success();
            } else {
                $this->say(Localization::get('botman.visit_command.bad_answers'));
                $this->askOfficeCode();
            }
        });
    }

    public function success()
    {
        $telegram_user = TelegramUser::where('telegram_id', $this->bot->getUser()->getId())->first();
        if ($telegram_user !== null) {
            OfficeVisit::create(['telegram_user_id' => $telegram_user->id]);
        }

        $this->say(Localization::get('botman.visit_command.good_answers'));
    }
}
