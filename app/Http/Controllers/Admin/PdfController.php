<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use PDF;

class PdfController extends Controller
{
    public function GetUserOrder($order_number)
    {
        $data = Orders::where('order_number', $order_number)->get();
        $data = $data->toArray();
        view()->share('employee', $data);
        $pdf = PDF::loadView('home.pdf.MyOrder', $data);
        return $pdf->stream('pdf_file.pdf');
    }
}
