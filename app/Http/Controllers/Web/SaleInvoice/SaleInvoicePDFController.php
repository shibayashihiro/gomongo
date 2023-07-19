<?php

namespace App\Http\Controllers\Web\SaleInvoice;

use App\DealerInfo;
use App\Http\Controllers\WebController;
use App\VehicleStock;
use App\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

class SaleInvoicePDFController extends WebController
{
    public function generatePDF(Request $request)
    {
        $data = $request->all();
        $pdf_view = 'web.dashboard.pdf.sales_invoice_pdf1';
        if ($request->pdf_id == 'pdf2') {
            $pdf_view = 'web.dashboard.pdf.sales_invoice_pdf2';
            if (is_subscription_permission_exist(Auth::user()->plan_id, 'Advance Sales invoice templates') == 0) {
                response()->json(['status' => 412, 'message' => 'You are not able to use this template'], 412)->header('Content-Type', 'application/json')->send();
                die();
            }
        } elseif ($request->pdf_id == 'pdf3') {
            $pdf_view = 'web.dashboard.pdf.sales_invoice_pdf3';
            if (is_subscription_permission_exist(Auth::user()->plan_id, 'Advance Sales invoice templates') == 0) {
                response()->json(['status' => 412, 'message' => 'You are not able to use this template'], 412)->header('Content-Type', 'application/json')->send();
                die();
            }
        }
        $vehicle_stock = VehicleStock::where('registration_number', $request->registration_number)->first();
        $additional_price = 0;
        $cost_price = 0;
        if ($vehicle_stock) {
            $additional_price = $vehicle_stock->additional_price->sum('price');
            $cost_price = $vehicle_stock->price + $additional_price;
        }
        $sale_price = $request->price + $request->admin_cost + $request->product_cost - $request->part_exchange_cost
            - $request->deposit_cost - $request->discount_cost;
        //$cost_price = $request->price + $additional_price;
        $dealerInfo = DealerInfo::where('user_id', Auth::id())->first();
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        $logo = Auth::user()->profile_image;
        if (!is_null($web_content)) {
            $logo = $web_content->logo;
        }
        $data = [
            'logo' => $logo,
            'vendor_address' => $dealerInfo->address . ', ' . $dealerInfo->city . ', ' . $dealerInfo->postcode,
            'vendor_email' => $dealerInfo->email,
            'vendor_mobile' => $dealerInfo->telephone,
            'vendor_website' => $dealerInfo->website,
            'vendor_trading_name' => $dealerInfo->trading_name,
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
            'contact_number' => $request->contact_number ?? '',
            'email' => $request->email ?? '',
            'price' => place_currency($request->price) ?? '',
            'admin_cost' => place_currency($request->admin_cost) ?? '',
            'product_cost' => place_currency($request->product_cost) ?? '',
            'part_exchange_cost' => place_currency($request->part_exchange_cost) ?? '',
            'finance_cost' => place_currency($request->finance_cost) ?? '',
            'deposit_cost' => place_currency($request->deposit_cost) ?? '',
            'discount_cost' => place_currency($request->discount_cost) ?? '',
            'cash_price' => place_currency($request->cash_price) ?? '',
            'card_price' => place_currency($request->card_price) ?? '',
            'cost_price' => place_currency($cost_price),
            'sale_price' => place_currency($sale_price),
            'notes' => $request->notes ?? '',
            'admin_description' => $request->admin_description ?? '',
            'product_description' => $request->product_description ?? '',
            'part_exchange_registration_number' => $request->part_exchange_registration_number ?? '',
            'finance_description' => $request->finance_description ?? '',
            'deposit_description' => $request->deposit_description ?? '',
            'discount_description' => $request->discount_description ?? '',
        ];
        $pdf = PDF::loadView($pdf_view, $data)->setPaper('a4', 'portrait');
        $file_name = 'uploads/invoice/' . time() . '.pdf';
        save_file($file_name, $pdf->output());
        return ['status' => 200, 'message' => 'Success', 'data' => ['file' => checkFileExist($file_name)]];
    }

    public function generatePDFPreview(Request $request)
    {
        $data = $request->all();
        $pdf_view = 'web.dashboard.pdf.sales_invoice_pdf1';
        if ($request->pdf_id == 'pdf2') {
            $pdf_view = 'web.dashboard.pdf.sales_invoice_pdf2';
            if (is_subscription_permission_exist(Auth::user()->plan_id, 'Advance Sales invoice templates') == 0) {
                response()->json(['status' => 412, 'message' => 'You are not able to use this template'], 412)->header('Content-Type', 'application/json')->send();
                die();
            }
        } elseif ($request->pdf_id == 'pdf3') {
            $pdf_view = 'web.dashboard.pdf.sales_invoice_pdf3';
            if (is_subscription_permission_exist(Auth::user()->plan_id, 'Advance Sales invoice templates') == 0) {
                response()->json(['status' => 412, 'message' => 'You are not able to use this template'], 412)->header('Content-Type', 'application/json')->send();
                die();
            }
        }
        $vehicle_stock = VehicleStock::where('registration_number', $request->registration_number)->first();
        $additional_price = 0;
        $cost_price = 0;
        if ($vehicle_stock) {
            $additional_price = $vehicle_stock->additional_price->sum('price');
            $cost_price = $vehicle_stock->price + $additional_price;
        }
        $sale_price = $request->price + $request->admin_cost + $request->product_cost - $request->part_exchange_cost
            - $request->deposit_cost - $request->discount_cost;
        //$cost_price = $request->price + $additional_price;
        $dealerInfo = DealerInfo::where('user_id', Auth::id())->first();
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        $logo = Auth::user()->profile_image;
        if (!is_null($web_content)) {
            $logo = $web_content->logo;
        }
        $data = [
            'logo' => $logo,
            'vendor_address' => '122 Mulberry Avenue, Griffehville. AR. 72060',
            'vendor_email' => 'info@abccars.com',
            'vendor_mobile' => '(123) 123-4567',
            'vendor_website' => 'www.abccars.com',
            'vendor_trading_name' => $dealerInfo->trading_name,
            'type' => 'Sales',
            'registration_number' => 'XY78KL757',
            'model' => '2017',
            'mileage' => '75kmph',
            'vin_number' => 'VIN78688',
            'date_registration' => '18-01-2021',
            'color' => 'Black',
            'engine_size' => '1400cc',
            'engine_number' => '52WVI9789',
            'customer_name' => 'Kelvin',
            'address' => 'New York',
            'house_number' => 'A-709',
            'postcode' => 'YH767',
            'contact_number' => '(222)-875-7898',
            'email' => 'kelvin@mail.com',
            'price' => place_currency(200) ?? '',
            'admin_cost' => place_currency(10) ?? '',
            'product_cost' => place_currency(0) ?? '',
            'part_exchange_cost' => place_currency(0) ?? '',
            'finance_cost' => place_currency(0) ?? '',
            'deposit_cost' => place_currency(0) ?? '',
            'discount_cost' => place_currency(0) ?? '',
            'cash_price' => place_currency(210) ?? '',
            'card_price' => place_currency(0) ?? '',
            'cost_price' => place_currency(210),
            'sale_price' => place_currency(210),
            'notes' => '',
            'admin_description' => 'lorem ipsum',
            'product_description' => 'lorem ipsum',
            'part_exchange_registration_number' => 'lorem ipsum',
            'finance_description' => 'lorem ipsum',
            'deposit_description' => 'lorem ipsum',
            'discount_description' => 'lorem ipsum',
        ];
        $pdf = PDF::loadView($pdf_view, $data)->setPaper('a4', 'portrait');
        $file_name = 'uploads/invoice/' . time() . '.pdf';
        save_file($file_name, $pdf->output());
        response()->json(['status' => 200, 'message' => 'Success', 'data' => ['file' => checkFileExist($file_name)]], 200)->header('Content-Type', 'application/json')->send();
        die();
    }
}
