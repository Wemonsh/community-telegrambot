<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TelegramUser extends Model
{
    use HasUuids, SoftDeletes;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'name',
        'telegram_id'
    ];

    public function office_visits()
    {
        $this->hasMany(OfficeVisit::class, 'telegram_user_uuid', 'uuid');
    }
}
