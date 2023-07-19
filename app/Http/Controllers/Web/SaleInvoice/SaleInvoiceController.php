<?php

namespace App\Http\Controllers\Web\SaleInvoice;

use App\CustomerDataBase;
use App\Http\Controllers\WebController;
use App\SaleInvoice;
use App\VehicleStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\SaleRecord;
use PDF;

class SaleInvoiceController extends WebController
{
    public function salesInvoice()
    {
        $title = 'Sales invoice';
        return view('web.dashboard.sales_invoice', [
            'title' => $title,
        ]);
    }

    public function saveSalesInvoice(Request $request, SaleInvoicePDFController $salesPdfGen)
    {
        $this->directValidation([
            'registration_number' => ['required'],
            'model' => ['required'],
            'mileage' => ['required'],
            'vin_number' => ['required'],
            'date_registration' => ['required'],
            'customer_name' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'house_number' => ['required'],
            'contact_number' => ['required'],
            'email' => ['required'],
            'price' => ['required'],
        ]);
        $vehicle_stock = VehicleStock::where('registration_number', $request->registration_number)->first();
        $additional_price = 0;
        $cost_price = 0;
        if ($vehicle_stock) {
            $additional_price = $vehicle_stock->additional_price->sum('price');
            $cost_price = $vehicle_stock->price + $additional_price;
        }
        $sale_price = $request->price + $request->admin_cost + $request->product_cost - $request->discount_cost;
        $sale_invoice = SaleInvoice::create([
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'registration_number' => $request->registration_number,
            'model' => $request->model,
            'mileage' => $request->mileage,
            'vin_number' => $request->vin_number,
            'date_registration' => $request->date_registration,
            'color' => $request->color ?? '',
            'engine_size' => $request->engine_size ?? '',
            'engine_number' => $request->engine_number ?? '',
            'customer_name' => $request->customer_name ?? '',
            'address' => $request->address ?? '',
            'postcode' => $request->postcode ?? '',
            'house_number' => $request->house_number ?? '',
            'lat' => $request->latitude ?? '',
            'lng' => $request->longitude ?? '',
            'contact_number' => $request->contact_number ?? '',
            'email' => $request->email ?? '',
            'price' => $request->price ?? '',
            'admin_fee_flag' => $request->admin_fee_flag ?? '0',
            'admin_cost' => $request->admin_cost ?? '',
            'admin_description' => $request->admin_description ?? '',
            'product_flag' => $request->product_flag ?? '0',
            'product_cost' => $request->product_cost ?? '',
            'product_description' => $request->product_description ?? '',
            'part_exchange_flag' => $request->part_exchange_flag ?? '0',
            'part_exchange_cost' => $request->part_exchange_cost ?? '',
            'part_exchange_registration_number' => $request->part_exchange_registration_number ?? '',
            'part_exchange_description' => $request->part_exchange_registration_number ?? '',
            'finance_flag' => $request->finance_flag ?? '0',
            'finance_cost' => $request->finance_cost ?? '',
            'finance_description' => $request->finance_description ?? '',
            'deposit_flag' => $request->deposit_flag ?? '0',
            'deposit_cost' => $request->deposit_cost ?? '',
            'deposit_description' => $request->deposit_description ?? '',
            'discount_flag' => $request->discount_flag ?? '0',
            'discount_cost' => $request->discount_cost ?? '',
            'discount_description' => $request->discount_description ?? '',
            'cash_price' => $request->cash_price ?? '',
            'card_price' => $request->card_price ?? '',
            'cost_price' => $cost_price,
            'sales_price' => $sale_price,
        ]);
        if ($sale_invoice) {
            $pdf_path = $salesPdfGen->generatePDF($request);
            //if deposit invoice exist change status to complete
            if ($request->type == 'sales'):
                $oldDepositInvoice = SaleRecord::where(['registration_number' => $request->registration_number, 'type' => 'deposit'])->first();
                $oldDepositInvoice->update(['status' => 'Complete']);
                $oldDepositInvoice->delete();
            endif;
            $sale_record = SaleRecord::create([
                'user_id' => Auth::user()->id,
                'date' => $request->date_registration,
                'registration_number' => $request->registration_number,
                'type' => $request->type,
                'cost_price' => $cost_price,
                'sales_price' => $sale_price,
                'total_case_payment' => (double)$request->cash_price ?? '',
                'total_card_payment' => (double)$request->card_price ?? '',
                'notes' => $request->notes,
                'payment_type' => (!empty($request->cash_price) && !empty($request->card_price)) ? 'Cash/Card' : ((empty($request->cash_price) && !empty($request->card_price)) ? 'Card' : 'Cash'),
                'invoice_url' => isset($pdf_path['data']['file']) ? $pdf_path['data']['file'] : null,
                'status' => ($request->type == 'sales') ? 'Complete' : 'Incomplete',
            ]);


            if ($vehicle_stock && $request->type == 'sales') {
                $vehicle_stock->update(['deleted_status' => 'yes']);
            }
            if ($request->save_as_customer_data == 1) {
                CustomerDataBase::create([
                    'user_id' => Auth::user()->id,
                    'name' => $request->customer_name ?? '',
                    'address' => $request->address ?? '',
                    'post_code' => $request->postcode ?? '',
                    'house_number' => $request->house_number ?? '',
                    'lat' => $request->latitude ?? '',
                    'lng' => $request->longitude ?? '',
                    'mobile' => $request->contact_number ?? '',
                    'email' => $request->email ?? '',
                    'created_at' => Carbon::today(),
                    'updated_at' => Carbon::today(),
                ]);
            }
            echo json_encode(['status' => 200, 'message' => __('Sale invoice successfully')]);
            die();
        } else {
            echo json_encode(['status' => 412, 'message' => __('Something went wrong please try again')]);
            die();
        }
    }
}
