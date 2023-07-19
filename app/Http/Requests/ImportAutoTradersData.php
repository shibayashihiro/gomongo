<?php

namespace App\Http\Requests;

use App\DealerStocks;
use App\AutoTraderStock;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ImportAutoTradersData extends FormRequest
{

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function importDataFromCurl($dealer_id, $postcode)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://127.0.0.1:5000/{$dealer_id}/{$postcode}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = (array)\GuzzleHttp\json_decode(curl_exec($curl));
        curl_close($curl);
        if (!empty($response) && isset($response['success'])) {
            $this->importDataFromFile([
                "autotrader-{$dealer_id}-{$postcode}.json"
            ]);
        }
        // if (!empty($response) && isset($response['autotrader'])) {
        //     foreach ($response['autotrader'] as $key => $value) {
        //         AutoTraderStock::create([
        //             'user_id' => $this->user->id,
        //             'title' => $value->title,
        //             'year' => $value->year,
        //             'price' => $value->price,
        //             'priceCurrency' => $value->priceCurrency,
        //             'mileage' => $value->mileage,
        //             'dealer' => \GuzzleHttp\json_encode($value->dealer),
        //             'specification' => \GuzzleHttp\json_encode($value->specification),
        //             'description' => $value->description,
        //             'images' => \GuzzleHttp\json_encode($value->images),
        //             'created_at' => Carbon::today(),
        //             'updated_at' => Carbon::today(),
        //         ]);
        //     }
        // }
    }
    public function getFilesFromFtp()
    {
        //all files are present inside 'outgoing' folder
        $file = Storage::disk('sftp')->get('PhoenixWay.csv');
        
        Storage::disk('local')->put('app/public/exportcsv/PhoenixWay.csv', $file);
    }
    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
    public function importCSV($files = [])
    {
        $dir = storage_path('app/public/exportcsv');
        if (empty($files)) {
            // /scrappingresult directory
            $files = scandir($dir);
        }
        // dd($files);
        foreach ($files as $file) {
            $this->updateDataFromCSV($dir, $file);
        }        
    }

    public function importDataFromFile($files = [])
    {
        $dir = storage_path('app/public/scrappingresult');
        if (empty($files)) {
            // /scrappingresult directory
            $files = scandir($dir);
        }
        // dd($files);
        foreach ($files as $file) {
            $this->updateDataFromFile($dir, $file);
        }
    }
    public function updateDataFromCSV($dir, $file)
    {
        // filename format: autotrader-{dealer_id}-{postcode}.json
        // parse filename to get dealer_id and postcode
        $data = $this->csvToArray($file);
        $dealer_id = $data[0]['DID'];
        $postcode = "TW20 8RG"; // {postcode}.json

        // find user with dealer_id and postcode
        $user = User::where('dealer_id', $dealer_id)->whereRaw("REPLACE(postcode, ' ' ,'') = ?", [$postcode])->first();

        // dd($user);
        if ($user) {
            // delete all dealer stocks of this user
            $current_stocks = DealerStocks::where('user_id', $user->id);
            if ($current_stocks->count() > 0) {
                $current_stocks->delete();
            }
            // loop through stocks
            // dd($data);
            foreach ($data as $key => $value) {
                
                // implode images array to string
                $images = implode(',', $value->IMAGES);
                
                
                DealerStocks::create([
                    'user_id' => $user->id,
                    'stock_item_id' => $value->STOCK_ITEM_ID ?? null,
                    'category' => $value->CATEGORY ?? null,
                    'registration' => $value->REGISTRATION ?? null,
                    'reg_code' => $value->REG_CODE ?? null,
                    'make' => $value->MAKE ?? null,
                    'modal' => $value->MODEL ?? null,
                    'derivative' => $value->DERIVATIVE ?? null,
                    'attention_grabber' => $value->ATTENTION_GRABBER ?? null,
                    'engine_size' => $value->ENGINE_SIZE ?? null,
                    'engine_size_unit' => $value->ENGINE_SIZE_UNIT ?? null,
                    'fuel_type' => $value->FUEL_TYPE ?? null,
                    'manufacture' => $value->MANUFACTURED_YEAR ?? '2022',
                    'mileage' => $value->MILEAGE ?? null,
                    'mileage_unit' => $value->MILEAGE_UNIT ?? null,
                    'body_type' => $value->BODYTYPE ?? null,
                    'colour' => $value->COLOUR ?? null,
                    'transmission' => $value->TRANSMISSION ?? null,
                    'doors' => $value->DOORS ?? null,
                    'previous_owners' => $value->PREVIOUS_OWNERS ?? null,
                    'price' => $value->PRICE ?? null,
                    'price_extra' => $value->PRICE_EXTRA ?? null,
                    'wheel_base' => $value->WHEEL_BASE_TYPE ?? null,
                    'cab_type' => $value->CAB_TYPE ?? null,
                    'four_wheel' => $value->FOUR_WHEEL_DRIVE ?? null,
                    'franchise_approved' => $value->FRANCHISE_APPROVED ?? null,
                    'style' => $value->STYLE ?? null,
                    'sub_style' => $value->SUB_STYLE ?? null,
                    'hours' => $value->HOURS ?? null,
                    'number_of_berths' => $value->NUMBER_OF_BERTHS ?? null,
                    'axls' => $value->AXLE ?? null,
                    'dealer_reference' => $value->DEALER_REFERENCE ?? null,
                    'images' => $images,
                    'video_url' => $value->VIDEO_URL ?? null,
                    'date_of_registration' => $value->DATE_OF_REGISTRATION ?? null,
                    'service_history' => $value->SERVICE_HISTORY ?? null,
                    'key_information' => $value->KEY_INFORMATION ?? '',
                    'other_vehicle_text' => $value->OTHER_VEHICLE_TEXT ?? null,
                    'closer' => $value->CLOSER ?? null,
                    'feature' => $value->FEATURE ?? null,
                    'vatstatus' => $value->VATSTATUS ?? null,
                    'api_id' => $value->ID,
                    'mot_date' =>  $value->MOT_DATE ?? null,
                    'VIN' => $value->VIN ?? null,
                    'dealer' => "",
                    'specification' => '',
                    'created_at' => Carbon::today(),
                    'updated_at' => Carbon::today(),
                ]);
            }
        }
    }

    // public function updateDataFromFile($dir, $file)
    // {
    //     // filename format: autotrader-{dealer_id}-{postcode}.json
    //     // parse filename to get dealer_id and postcode
    //     $filename = explode('-', $file);
    //     if (count($filename) == 3) {
    //         $dealer_id = $filename[1];
    //         $postcode = $filename[2]; // {postcode}.json
    //         $postcode = str_replace('.json', '', $postcode);

    //         // find user with dealer_id and postcode
    //         $user = User::where('dealer_id', $dealer_id)->whereRaw("REPLACE(postcode, ' ' ,'') = ?", [$postcode])->first();

    //         // dd($user);
    //         if ($user) {
    //             // delete all dealer stocks of this user
    //             $current_stocks = DealerStocks::where('user_id', $user->id);
    //             if ($current_stocks->count() > 0) {
    //                 $current_stocks->delete();
    //             }
    //             // read file
    //             $file = file_get_contents($dir . '/' . $file);
    //             $data = \GuzzleHttp\json_decode($file); // array of stocks

    //             // loop through stocks
    //             // dd($data);
    //             foreach ($data as $key => $value) {
    //                 $dcd = $value->detailed_car_details;
    //                 $spec = $dcd->specification;
    //                 $images = array_map(function ($image) {
    //                     return $image->url;
    //                 }, $dcd->imageList->images);
    //                 // implode images array to string
    //                 $images = implode(',', $images);
    //                 $desc_info = explode('|', $value->description);
    //                 $owners = 0;
    //                 foreach ($desc_info as $val) {
    //                     if (strpos($val, 'owners')) {
    //                         $owners = trim(str_replace('owners', '', $val));
    //                     }
    //                 }
    //                 DealerStocks::create([
    //                     'user_id' => $user->id,
    //                     'stock_item_id' => $dcd->stockItemId ?? null,
    //                     'category' => $spec->vehicleCategory ?? null,
    //                     'registration' => $dcd->registration ?? null,
    //                     'reg_code' => '63',
    //                     'make' => $spec->make ?? null,
    //                     'modal' => $spec->model ?? null,
    //                     'derivative' => $spec->derivative ?? null,
    //                     'attention_grabber' => $dcd->attentionGrabber ?? null,
    //                     'engine_size' => $spec->engine->sizeCC ?? null,
    //                     'engine_size_unit' => 'CC',
    //                     'fuel_type' => $spec->fuel ?? null,
    //                     'manufacture' => $dcd->year ?? '2022',
    //                     'mileage' => $dcd->mileage->mileage ?? null,
    //                     'mileage_unit' => $dcd->mileage->unit ?? null,
    //                     'body_type' => $spec->bodyType ?? null,
    //                     'colour' => $dcd->colour ?? null,
    //                     'transmission' => $spec->transmission ?? null,
    //                     'doors' => $spec->doors ?? null,
    //                     'previous_owners' => $owners,
    //                     'price' => $dcd->price ?? null,
    //                     'price_extra' => $dcd->priceCurrency ?? null,
    //                     'wheel_base' => $spec->wheelbase ?? null,
    //                     'cab_type' => $spec->cabType ?? null,
    //                     'four_wheel' => 'N',
    //                     'franchise_approved' => $value->vehicle->franchiseApproved ?? null,
    //                     'style' => $spec->style ?? null,
    //                     'sub_style' => $spec->subStyle ?? null,
    //                     'hours' => $dcd->hoursUsed ?? null,
    //                     'number_of_berths' => null,
    //                     'axls' => null,
    //                     'dealer_reference' => null,
    //                     'images' => $images,
    //                     'video_url' => null,
    //                     'date_of_registration' => $dcd->dateOfRegistration ?? null,
    //                     'service_history' => $dcd->serviceHistory ?? null,
    //                     'key_information' => $dcd->description ?? '',
    //                     'other_vehicle_text' => null,
    //                     'closer' => null,
    //                     'feature' => (isset($spec->standardFeatures)) ? (\GuzzleHttp\json_encode($spec->standardFeatures, true) ?? null) : null,
    //                     'vatstatus' => null,
    //                     'api_id' => $value->id,
    //                     'mot_date' =>  $dcd->motExpiry ?? null,
    //                     'VIN' => '',
    //                     'dealer' => \GuzzleHttp\json_encode($value->dealer, true) ?? null,
    //                     'specification' => \GuzzleHttp\json_encode($spec, true) ?? null,
    //                     'created_at' => Carbon::today(),
    //                     'updated_at' => Carbon::today(),
    //                 ]);
    //             }
    //         }
    //     }
    // }
}
