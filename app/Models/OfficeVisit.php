<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OfficeVisit extends Model
{
    protected $fillable = [
        'telegram_user_id'
    ];

    public function telegram_user()
    {
        return $this->belongsTo(TelegramUser::class);
    }
}
