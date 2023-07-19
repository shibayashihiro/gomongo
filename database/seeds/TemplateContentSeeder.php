<?php

use Illuminate\Database\Seeder;

class TemplateContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = collect([
            'template_slug',
            'page_slug',
            'section_slug',
            'key',
            'value',
            'input_type',
            'is_required',
        ]);
        $values = [
            [
                't1',
                'home',
                'slider',
                'title',
                'Welcome to AtoZ Cars',
                'text',
                1,
            ],
            [
                't1',
                'home',
                'slider',
                'sub_title',
                'A wide range of vehicles and services to suit you, take a look around & find you ideal car',
                'textarea',
                1,
            ],
            [
                't1',
                'home',
                'slider',
                'image',
                'assets\web\template\t1\images\home-banner-bg.jpg',
                'file',
                1,
            ],
            [
                't1',
                'home',
                'about_us',
                'sub_title',
                'We take quality and our customer service serious!',
                'textarea',
                1,
            ],
            [
                't1',
                'home',
                'about_us',
                'title',
                'About Us',
                'text',
                1,
            ],
            [
                't1',
                'home',
                'about_us',
                'description',
                "If you are looking for a reliable car for you or your family in the “Hounslow” area look no further. At “AtoZ cars Ltd” we take quality and our customer service serious! With many years of experience and a driven sales team we aim to provide you with the car and the service you deserve! Great savings, quality stock and a reliable and responsive after sales service makes buying from “AtoZ cars ltd” a dream come true.<br/>We offer a wide range of services to make sure your car buying experience is as smooth as it gets! Have a look at our stocklist to see the variety of stock currently available or give us a call today to book a viewing or test drive!",
                'textarea',
                1,
            ],
            [
                't1',
                'home',
                'about_us',
                'image',
                'assets\web\template\t1\images\about-img.png',
                'file',
                1,
            ],
            [
                't1',
                'home',
                'our_services',
                'title',
                'Our Services',
                'text',
                1,
            ],
            [
                't1',
                'home',
                'our_services',
                'sub_title',
                'Our aim is to make sure your car buying experience is as smooth as it can be! Have a look below at the services we are able to provide or give us a call today and ask a member on offers on our products and services!',
                'textarea',
                1,
            ],
            [
                't1',
                'home',
                'testimonials',
                'title',
                'Testimonials',
                'text',
                1,
            ],
            [
                't1',
                'home',
                'testimonials',
                'sub_title',
                'We take after sales and services serious! Have a look below at some of the reviews we have received from our customers!',
                'textarea',
                1,
            ],
            [
                't1',
                'home',
                'our_recent_stock',
                'title',
                'Our Recent Stock',
                'text',
                1,
            ],
            [
                't1',
                'home',
                'our_recent_stock',
                'sub_title',
                'Browse through our most recently sold stock to have an idea on the vehicle we sell or to help you narrow down your car search!',
                'textarea',
                1,
            ],
            [
                't1',
                'home',
                'offer',
                'title',
                'We offer competitive finance plans to suit your budget and needs!',
                'text',
                1,
            ],
            [
                't1',
                'home',
                'offer',
                'sub_title',
                'With payment options ranging from 1 to 5 years we are able to help you buy your dream car today at a price plan that is suitable for you! Click the link below to read more on our finance options or if you wish to submit an application and see whether or not you are eligible for finance.',
                'textarea',
                1,
            ],
            [
                't1',
                'home',
                'offer',
                'image',
                'assets\web\template\t1\images\offer_img.jpg',
                'file',
                1,
            ],
        ];
        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('template_contents')->insert($data->all());
        }
    }
}
