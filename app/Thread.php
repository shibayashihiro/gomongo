<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(Messages::class, 'threads_id');
    }

    public function guestToken()
    {
        return $this->hasOne(DeviceToken::class, 'id', 'guest_id');
    }
}
