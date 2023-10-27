<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LevelUp\Experience\Models\Level;

return new class extends Migration
{
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->integer('level')->unique();
            $table->integer('next_level_experience')->nullable()->index();
            $table->timestamps();
        });

        Level::add(
            ['level' => 1, 'next_level_experience' => null],
            ['level' => 2, 'next_level_experience' => 2000],
            ['level' => 3, 'next_level_experience' => 3000],
            ['level' => 4, 'next_level_experience' => 4000],
            ['level' => 5, 'next_level_experience' => 5000],
            ['level' => 6, 'next_level_experience' => 6000],
            ['level' => 7, 'next_level_experience' => 7000],
            ['level' => 8, 'next_level_experience' => 8000],
            ['level' => 9, 'next_level_experience' => 9000],
            ['level' => 10, 'next_level_experience' => 10000],
            ['level' => 11, 'next_level_experience' => 12000],
            ['level' => 12, 'next_level_experience' => 14000],
            ['level' => 13, 'next_level_experience' => 16000],
            ['level' => 14, 'next_level_experience' => 18000],
            ['level' => 15, 'next_level_experience' => 20000],
            ['level' => 16, 'next_level_experience' => 25000],
            ['level' => 17, 'next_level_experience' => 50000],
            ['level' => 18, 'next_level_experience' => 75000],
            ['level' => 19, 'next_level_experience' => 100000]
        );
    }

    public function down()
    {
        Schema::dropIfExists('levels');
    }
};
