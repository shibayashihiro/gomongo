<?php

namespace App\Jobs;

use App\AutoTraderStock;
use App\DealerStocks;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class DealerData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $auto;

    public function __construct($auto)
    {
        $this->auto = $auto;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->auto as $key => $value) {
            $specification = \GuzzleHttp\json_decode($value->specification);
            $images = \GuzzleHttp\json_decode($value->images);
            DealerStocks::create([
                'user_id' => $value->user_id,
                'stock_item_id' => '8a4288f5802804610180370538e10421',
                'category' => $specification->vehicleCategory ?? null,
                'registration' => 'SG63EKM',
                'reg_code' => '63',
                'make' => $specification->make ?? null,
                'modal' => $specification->model ?? null,
                'derivative' => '1.6 Zetec Powershift 5dr',
                'attention_grabber' => 'SALE! NOW £7999 WAS £8899',
                'engine_size' => '1596',
                'engine_size_unit' => 'CC',
                'fuel_type' => $specification->fule ?? null,
                'manufacture' => $value->year ?? '2022',
                'mileage' => $value->mileage ?? null,
                'mileage_unit' => 'M',
                'body_type' => $specification->bodyType ?? null,
                'colour' => null,
                'transmission' => $specification->transmission ?? null,
                'doors' => $specification->doors ?? null,
                'previous_owners' => 2,
                'price' => $value->price ?? null,
                'price_extra' => $value->priceCurrency ?? null,
                'wheel_base' => $specification->wheelbase ?? null,
                'cab_type' => $specification->cabType ?? null,
                'four_wheel' => 'N',
                'franchise_approved' => 'N',
                'style' => null,
                'sub_style' => null,
                'hours' => null,
                'number_of_berths' => null,
                'axls' => null,
                'dealer_reference' => null,
                'images' => $this->imagesArrayToString($images),
                'video_url' => null,
                'date_of_registration' => '01-11-2013',
                'service_history' => 'Full service history',
                'key_information' => '*******APPOINTMENTS ONLY-OFFICES CURRENTLY UNDERGOING REFURBISHMENT********The Ford Focus is an ideal car for both city as well as long drives, a reliable and durable engine with great fuel consumption and an sleek design and many safety features makes it ideal for both long and short journeys! , With a full MOT history carried out year-on-year and features such as electric windows and a beautiful on-board display screen, the Focus is an easy pick!, You will receive worth over £500 of extra service such as a FREE FRESH SERVICE UPON PURCHASE, UP-TO-DATE HPI CERTIFICATE, FULL MOT HISTORY! The vehicle has been fully inspected and is ready to go, over 80 vehicles in stock, all vehicles are HPI checked (clear) and mileage verified, overseas buyers welcome, major cards accepted, 5 days drive away insurance available. we also offer flexible and affordable finance options with £0 deposit and extended comprehensive warranties ranging from 3-36 months! For more information call: 020 3643 8642, Unit 22, Eversley way, Egham, TW20 8RG',
                'other_vehicle_text' => null,
                'closer' => null,
                'feature' => (isset($specification->standardFeatures)) ? (\GuzzleHttp\json_encode($specification->standardFeatures, true) ?? null) : null,
                'vatstatus' => null,
                'api_id' => '202204174741495',
                'mot_date' => '19/01/2023 00:00',
                'VIN' => 'WF0LXXGCBLDG41259',
                'dealer' => \GuzzleHttp\json_encode($value->dealer, true) ?? null,
                'specification' => \GuzzleHttp\json_encode($specification, true) ?? null,
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today(),
            ]);
            $value->delete();
        }
        return "Data Imported";
    }

    public function chunkSize(): int
    {
        return 5;
    }

    function imagesArrayToString($images = [])
    {
        $sImages = [];//single array images
        foreach ($images as $key => $value) {
            if (isset($value->url) && !empty($value->url))
                $sImages[] = $value->url;
        }

        return (!empty($sImages)) ? implode(',', $sImages) : null;
    }
}
