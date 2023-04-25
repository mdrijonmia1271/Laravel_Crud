<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function home(){
        return view('customer.home', [
            'orders' => Order::with('Order_detail')->where('user_id', Auth::user()->id)->get(),
        ]);
    }
    public function customerInvoiceDowload($order_id){
        $order_info = Order::find($order_id);
        $pdf = Pdf::loadView('pdf.invoice', compact('order_info'));
        return $pdf->download('invoice(ID'.$order_id.').pdf');
        // return $pdf->stream();
    }
}
