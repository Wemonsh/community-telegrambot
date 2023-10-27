<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LevelUp\Experience\Concerns\GiveExperience;

class TelegramUser extends Model
{
    use SoftDeletes;
    use GiveExperience;

    protected $fillable = [
        'name',
        'telegram_id'
    ];

    public function office_visits()
    {
        $this->hasMany(OfficeVisit::class, 'telegram_user_id', 'id');
    }
}
