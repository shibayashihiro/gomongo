<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubscriptionPlan extends Model
{
    protected $guarded = [];

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
