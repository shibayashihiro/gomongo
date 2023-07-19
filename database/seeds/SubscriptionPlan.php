<?php

use Illuminate\Database\Seeder;

class SubscriptionPlan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = collect([
            'name',
            'description',
            'price',
            'validity'
        ]);
        $values = [
            [
                'BASIC',
                '<p><i class="fas fa-check-circle mr-2"></i>Custome Charts</p><p><i class="fas fa-check-circle mr-2"></i>5 Mail Boxes, 10 GB Storage</p><p><i class="fas fa-check-circle mr-2"></i>Unlimited Free Dashboard</p><p><i class="fas fa-check-circle mr-2"></i>Access To all API</p>',
                69,
                '1 month'
            ],
            [
                'STANDARD',
                '<p><i class="fas fa-check-circle mr-2"></i>All Standard Features</p><p><i class="fas fa-check-circle mr-2"></i>15 Mail Boxes, 50 GB Storage</p><p><i class="fas fa-check-circle mr-2"></i>Interactive Screen Sharing</p><p><i class="fas fa-check-circle mr-2"></i>Full Reports History</p>',
                99,
                '1 month'
            ],
            [
                'PRO',
                '<p><i class="fas fa-check-circle mr-2"></i>All Extra Standard Features</p><p><i class="fas fa-check-circle mr-2"></i>50 Mail Boxes, 90 GB Storage</p><p><i class="fas fa-check-circle mr-2"></i>Dadicated Account Manager</p><p><i class="fas fa-check-circle mr-2"></i>24/7 Priority Support</p>',
                399,
                '1 month'
            ]
        ];


        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('subscription_plans')->insert($data->all());
        }
    }
}
