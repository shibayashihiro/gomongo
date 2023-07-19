<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebContent extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getLogoAttribute($val)
    {
        return checkFileExist($val);
    }

    public function getFaviconAttribute($val)
    {
        return checkFileExist($val);
    }

    public function getHeaderLogoAttribute($val)
    {
        return checkFileExist($val);
    }

    public function getFooterLogoAttribute($val)
    {
        return checkFileExist($val);
    }

    public function working_hours()
    {
        return $this->hasMany(WebWorkingHours::class, 'website_id')->orderBy('start_time', 'ASC');
    }

    public function details()
    {
        return $this->hasMany(WebContentDetails::class, 'website_id');
    }

    public function services()
    {
        return $this->hasMany(WebService::class, 'website_id');
    }

    public function testimonial()
    {
        return $this->hasMany(WebTestimonial::class, 'website_id');
    }

    public function stock()
    {
        return $this->hasMany(WebRecentStock::class, 'website_id');
    }
}
