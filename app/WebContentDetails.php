<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebContentDetails extends Model
{
    protected $guarded = [];

    public static function getRestoreDefaultImageByTemplate($input)
    {
        $data[$input['template_slug']]['common']['header']['logo'] = asset('assets/web/template/' . $input['template_slug'] . '/images/logo.png');
        $data[$input['template_slug']]['home']['about_us']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/about-img.png');
        $data[$input['template_slug']]['home']['offer']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/offer_img.jpg');
        $data[$input['template_slug']]['common']['footer']['footer_logo'] = asset('assets/web/template/' . $input['template_slug'] . '/images/logo.png');
        $data[$input['template_slug']]['home']['slider']['slider_image_1'] = asset('assets/web/template/' . $input['template_slug'] . '/images/home-banner-car1.png');
        $data[$input['template_slug']]['home']['slider']['slider_image_2'] = asset('assets/web/template/' . $input['template_slug'] . '/images/home-banner-car2.png');
        $data[$input['template_slug']]['home']['slider']['slider_image_3'] = asset('assets/web/template/' . $input['template_slug'] . '/images/home-banner-car3.png');
        $data[$input['template_slug']]['home']['car_category1']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/car1.png');
        $data[$input['template_slug']]['home']['car_category2']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/car2.png');
        $data[$input['template_slug']]['home']['car_category3']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/car3.png');
        $data[$input['template_slug']]['home']['car_category4']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/car4.png');
        $data[$input['template_slug']]['home']['car_category5']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/car5.png');
        $data[$input['template_slug']]['home']['car_category6']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/car6.png');
        $data[$input['template_slug']]['home']['about_us']['category_image_1'] = asset('assets/web/template/' . $input['template_slug'] . '/images/about-img1.png');
        $data[$input['template_slug']]['home']['about_us']['category_image_2'] = asset('assets/web/template/' . $input['template_slug'] . '/images/about-img2.png');
        $data[$input['template_slug']]['home']['about_us']['category_image_3'] = asset('assets/web/template/' . $input['template_slug'] . '/images/about-img3.png');
        $data[$input['template_slug']]['home']['about_us']['category_image_4'] = asset('assets/web/template/' . $input['template_slug'] . '/images/about-img4.png');
        $data[$input['template_slug']]['home']['about_us']['category_image_5'] = asset('assets/web/template/' . $input['template_slug'] . '/images/about-img5.png');
        $data[$input['template_slug']]['home']['about_us']['category_image_6'] = asset('assets/web/template/' . $input['template_slug'] . '/images/about-img6.png');
        $data[$input['template_slug']]['home']['our_services']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/our-services.png');
        $data[$input['template_slug']]['home']['welcome']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/home/welcomecar.png');

        if ($input['template_slug'] == 't12') {
            $data[$input['template_slug']]['home']['slider']['image'] = 'https://assets.codepen.io/6093409/river.mp4';
        } else {
            $data[$input['template_slug']]['home']['slider']['image'] = asset('assets/web/template/' . $input['template_slug'] . '/images/home-banner-bg.jpg');
        }

        /*$data['t2']['common']['header']['logo'] = asset('assets/web/template/t2/images/logo.png');
        $data['t2']['home']['slider']['image'] = asset('assets/web/template/t2/images/home-banner-bg.jpg');
        $data['t2']['home']['about_us']['image'] = asset('assets/web/template/t2/images/about-img.png');

        $data['t3']['common']['header']['logo'] = asset('assets/web/template/t3/images/logo.png');
        $data['t3']['home']['slider']['image'] = asset('assets/web/template/t3/images/home-banner-bg.jpg');
        $data['t3']['home']['about_us']['image'] = asset('assets/web/template/t3/images/about-img.png');

        $data['t4']['common']['header']['logo'] = asset('assets/web/template/t4/images/logo.png');
        $data['t4']['home']['slider']['image'] = asset('assets/web/template/t4/images/home-banner-bg.jpg');
        $data['t4']['home']['about_us']['image'] = asset('assets/web/template/t4/images/about-img.png');

        $data['t5']['common']['header']['logo'] = asset('assets/web/template/t5/images/logo.png');
        $data['t5']['home']['slider']['image'] = asset('assets/web/template/t5/images/home-banner-bg.jpg');
        $data['t5']['home']['about_us']['image'] = asset('assets/web/template/t5/images/about-img.png');

        $data['t6']['common']['header']['logo'] = asset('assets/web/template/t6/images/logo.png');
        $data['t6']['home']['slider']['image'] = asset('assets/web/template/t6/images/home-banner-bg.jpg');
        $data['t6']['home']['about_us']['image'] = asset('assets/web/template/t6/images/about-img.png');

        $data['t7']['common']['header']['logo'] = asset('assets/web/template/t7/images/logo.png');
        $data['t7']['home']['slider']['image'] = asset('assets/web/template/t7/images/home-banner-bg.jpg');
        $data['t7']['home']['about_us']['image'] = asset('assets/web/template/t7/images/about-img.png');

        $data['t8']['common']['header']['logo'] = asset('assets/web/template/t8/images/logo.png');
        $data['t8']['home']['slider']['image'] = asset('assets/web/template/t8/images/home-banner-bg.jpg');
        $data['t8']['home']['about_us']['image'] = asset('assets/web/template/t8/images/about-img.png');

        $data['t9']['common']['header']['logo'] = asset('assets/web/template/t9/images/logo.png');
        $data['t9']['home']['slider']['image'] = asset('assets/web/template/t9/images/home-banner-bg.jpg');
        $data['t9']['home']['about_us']['image'] = asset('assets/web/template/t9/images/about-img.png');

        $data['t10']['common']['header']['logo'] = asset('assets/web/template/t10/images/logo.png');
        $data['t10']['home']['slider']['image'] = asset('assets/web/template/t10/images/home-banner-bg.jpg');
        $data['t10']['home']['about_us']['image'] = asset('assets/web/template/t10/images/about-img.png');

        $data['t11']['common']['header']['logo'] = asset('assets/web/template/t11/images/logo.png');
        $data['t11']['home']['slider']['image'] = asset('assets/web/template/t11/images/home-banner-bg.jpg');
        $data['t11']['home']['about_us']['image'] = asset('assets/web/template/t11/images/about-img.png');*/


        return $data[$input['template_slug']][$input['page_slug']][$input['section_slug']][$input['key']];
    }

    public static function getRestoreDefaultImageByService($input)
    {
        $data[$input['template_slug']] = asset('assets/web/template/' . $input['template_slug'] . '/images/our-services4.png');

        return $data[$input['template_slug']];
    }

    public static function getRestoreDefaultImageByTestimonial($input)
    {
        $data[$input['template_slug']] = asset('assets/web/template/' . $input['template_slug'] . '/images/client3.png');

        return $data[$input['template_slug']];
    }

    public static function getRestoreDefaultImageByStock($input)
    {
        $data[$input['template_slug']] = asset('assets/web/template/' . $input['template_slug'] . '/images/work-img1.png');

        return $data[$input['template_slug']];
    }
}
