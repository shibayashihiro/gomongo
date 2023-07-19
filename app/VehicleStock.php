<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleStock extends Model
{
    protected $guarded = [];

    public function additional_price()
    {
        return $this->hasMany(VehicleStockAdditionalPrice::class, 'vehicle_stock_id');
    }

    public static function get_additional_total_price_by_user($user_id = 0)
    {
        $ids_string = VehicleStock::where(['user_id' => $user_id, 'deleted_status' => 'no'])->select(DB::raw('group_concat(id) as vehicle_stock_ids'))->first();
        $ids = !empty($ids_string['vehicle_stock_ids']) ? explode(',', $ids_string['vehicle_stock_ids']) : [];
        return VehicleStockAdditionalPrice::whereIn('vehicle_stock_id', $ids)->sum('price');
    }
}
