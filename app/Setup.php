<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Setup extends Model
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'title', 'description',
    ];
}
