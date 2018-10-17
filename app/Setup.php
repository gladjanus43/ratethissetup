<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Setup extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'title', 'description'
    ];
}
