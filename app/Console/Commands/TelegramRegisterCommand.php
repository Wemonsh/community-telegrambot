<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TelegramRegisterCommand extends Command
{
    protected $signature = 'telegram:register {--remove} {--output}';

    protected $description = 'Register or unregister your bot with Telegram\'s webhook';

    public function handle()
    {
        $url = 'https://api.telegram.org/bot'
            .config('services.telegram.token')
            .'/setWebhook';

        $remove = $this->option('remove', null);

        if (! $remove) {
            $url .= '?url='.config('services.telegram.webhook');
        }

        $this->info('Using '.$url);

        $this->info('Pinging Telegram...');

        $output = json_decode(file_get_contents($url));

        if ($output->ok && $output->result) {
            $this->info(
                $remove
                    ? 'Your bot Telegram\'s webhook has been removed!'
                    : 'Your bot is now set up with Telegram\'s webhook!'
            );
        }

        if ($this->option('output')) {
            dump($output);
        }
    }
}
