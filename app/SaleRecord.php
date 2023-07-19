<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleRecord extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function vehicle_stock($val)
    {
        return VehicleStock::with(['additional_price'])->where('registration_number', $val)->first();
    }
}
