<?php

use App\Models\TelegramUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {


        Schema::create('office_visits', function (Blueprint $table) {
            $table->uuid()->primary();

            $table->foreignIdFor(TelegramUser::class, 'telegram_user_uuid')
                ->nullable()
                ->references('uuid')->on((new TelegramUser())->getTable())
                ->constrained()->cascadeOnDelete();


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('office_visits');
    }
};
