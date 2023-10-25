<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OfficeVisit extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'telegram_user_uuid'
    ];

    public function telegram_user()
    {
        return $this->belongsTo(TelegramUser::class);
    }
}
