<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintManagement extends Model
{
    public function notes()
    {
        return $this->hasMany(ComplaintNote::class, 'complaint_id');
    }
}
