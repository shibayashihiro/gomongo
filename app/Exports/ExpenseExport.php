<?php

namespace App\Exports;

use App\Expense;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpenseExport implements FromQuery, WithHeadings, WithMapping
{
    public $from_date = '';
    public $to_date = '';
    public $number = 0;


    public function __construct($data = [])
    {
        $this->from_date = empty($data['from_date']) ? null : $data['from_date'];
        $this->to_date = empty($data['to_date']) ? null : $data['to_date'];
    }

    public function query($data = [])
    {
        $query = Expense::query();
        if (!empty($this->from_date) && !empty($this->to_date))
            $query->whereDate('created_at', '>=', $this->from_date)->whereDate('created_at', '<=', $this->to_date);
        return $query;
    }

    public function map($expense): array
    {
        $this->number += 1;
        return [
            $this->number,
            get_date_format($expense->created_at, 'd/m/Y'),
            $expense->amount,
            $expense->description,
            $expense->payment_type,
            $expense->total_vat,
        ];
    }


    public function headings(): array
    {
        return [
            'No',
            'Date',
            'Amount',
            'Description',
            'Payment Method',
            'Total VAT',
        ];
    }
}
