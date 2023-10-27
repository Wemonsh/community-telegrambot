<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LevelUp\Experience\Models\Level;

return new class extends Migration {
    public function up(): void
    {
        Schema::table(config('level-up.user.users_table'), function (Blueprint $table) {
            $table->foreignId('level_id')
                ->default(Level::first()->id)
                ->nullable()
                ->constrained();
        });
    }

    public function down(): void
    {
        Schema::table(config('level-up.user.users_table'), function (Blueprint $table) {
            $table->dropConstrainedForeignId('level_id');
        });
    }
};
