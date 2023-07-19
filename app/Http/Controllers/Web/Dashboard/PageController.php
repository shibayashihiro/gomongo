<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\WebController;
use App\Http\Requests\Admin\General\PasswordUpdateRequest;

class PageController extends WebController
{
    public function update_password(PasswordUpdateRequest $request)
    {
        $request->update_pass();
        return redirect()->back();
    }

    public function email()
    {
        $title = 'Email';
        return view('web.dashboard.email', [
            'title' => $title,
        ]);
    }

    public function salesRecord()
    {
        $title = 'Sales record';
        return view('web.dashboard.sales_record', [
            'title' => $title,
        ]);
    }

    public function stockList()
    {
        $title = 'Stock list';
        return view('web.dashboard.stock_list', [
            'title' => $title,
        ]);
    }


}
