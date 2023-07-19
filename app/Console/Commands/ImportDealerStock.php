<?php

namespace App\Console\Commands;

use App\DealerStocks;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;

class ImportDealerStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import dealer stock';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dealers = User::whereNotNull('dealer_id')->get();
        // dd(Storage::disk('local')->exists('exportcsv/PhoenixWay-10003406.csv'));
        foreach ($dealers as $key => $value) {
            $filename = public_path() . '\exportcsv\PhoenixWay.csv';
            // $filename = "PhoenixWay-" . $value->dealer_id . '.csv';
            // dd($filename);
            /*if (!file_exists($filename) || !is_readable($filename))
                continue;*/
            if(!Storage::disk('local')->exists('exportcsv/PhoenixWay.csv'))
                continue;

            $header = null;
            $data = array();
            $delimiter = ',';
            if (($handle = fopen($filename, 'r')) !== false) {
                DealerStocks::where(['user_id' => $value->id])->delete();
                $first_row = true;
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {

                    if ($first_row == true) {
                        $first_row = false;
                        continue;
                    }
                    if(isset($row[0]) && ($value->dealer_id == $row[0])){
                        DealerStocks::create([
                            'user_id' => $value->id,
                            'stock_item_id' => isset($row[1]) ? $row[1] : null,
                            'category' => isset($row[3]) ? $row[3] : null,
                            'registration' => isset($row[4]) ? $row[4] : null,
                            'reg_code' => isset($row[5]) ? $row[5] : null,
                            'make' => isset($row[6]) ? $row[6] : null,
                            'modal' => isset($row[7]) ? $row[7] : null,
                            'derivative' => isset($row[8]) ? $row[8] : null,
                            'attention_grabber' => isset($row[9]) ? $row[9] : null,
                            'engine_size' => isset($row[10]) ? $row[10] : null,
                            'engine_size_unit' => isset($row[11]) ? $row[11] : null,
                            'fuel_type' => isset($row[12]) ? $row[12] : null,
                            'manufacture' => isset($row[13]) ? $row[13] : null,
                            'mileage' => isset($row[14]) ? $row[14] : null,
                            'mileage_unit' => isset($row[15]) ? $row[15] : null,
                            'body_type' => isset($row[16]) ? $row[16] : null,
                            'colour' => isset($row[17]) ? $row[17] : null,
                            'transmission' => isset($row[19]) ? $row[19] : null,
                            'doors' => isset($row[20]) ? $row[20] : null,
                            'previous_owners' => isset($row[21]) ? (int)$row[21] : 0,
                            'price' => isset($row[22]) ? (double)$row[22] : 0,
                            'price_extra' => isset($row[23]) ? (double)$row[23] : 0,
                            'wheel_base' => isset($row[24]) ? $row[24] : null,
                            'cab_type' => isset($row[25]) ? $row[25] : null,
                            'four_wheel' => isset($row[26]) ? $row[26] : null,
                            'franchise_approved' => isset($row[27]) ? $row[27] : null,
                            'style' => isset($row[28]) ? $row[28] : null,
                            'sub_style' => isset($row[29]) ? $row[29] : null,
                            'hours' => isset($row[30]) ? $row[30] : null,
                            'number_of_berths' => isset($row[31]) ? $row[31] : null,
                            'axls' => isset($row[32]) ? $row[32] : null,
                            'dealer_reference' => isset($row[33]) ? $row[33] : null,
                            'images' => isset($row[34]) ? $row[34] : null,
                            'video_url' => isset($row[35]) ? $row[35] : null,
                            'date_of_registration' => isset($row[36]) ? $row[36] : null,
                            'service_history' => isset($row[37]) ? $row[37] : null,
                            'key_information' => isset($row[38]) ? $row[38] : null,
                            'other_vehicle_text' => isset($row[39]) ? $row[39] : null,
                            'closer' => isset($row[40]) ? $row[40] : null,
                            'feature' => isset($row[41]) ? $row[41] : null,
                            'vatstatus' => isset($row[42]) ? $row[42] : null,
                            'api_id' => isset($row[43]) ? $row[43] : null,
                            'mot_date' => isset($row[44]) ? $row[44] : null,
                            'VIN' => isset($row[45]) ? $row[45] : null,
                            'created_at' => Carbon::today(),
                            'updated_at' => Carbon::today(),
                        ]);
                    }
                }
                fclose($handle);
                //unlink($filename);
                // if(Storage::disk('s3')->exists("D-" . $value->dealer_id . ".csv")) {
                //     //dd(1111);
                //     Storage::disk('s3')->delete("D-" . $value->dealer_id . ".csv");
                // }
                //dd(2222);
                //Storage::disk('s3')->delete("D-" . $value->dealer_id . ".csv");
            }
        }
        return "Data Imported";
    }
}
