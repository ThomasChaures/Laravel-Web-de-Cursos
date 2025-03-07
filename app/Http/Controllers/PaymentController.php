<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CarritoController;

class PaymentController extends Controller
{
    public function success(Request $request)
{

    $carritoInstance = new CarritoController();
   
    $paymentId = $request->payment_id ?? false;
    $status = $request->status;
    $merchantOrderId = $request->merchant_order_id;
    
    if($paymentId){
        $carritoInstance->pagarCarrito();
    }

    return view('carrito.payment.success', compact('paymentId'));
}

public function failure(Request $request)
{
    return view('carrito.payment.failure');
}

public function pending(Request $request)
{
    return view('carrito.payment.pending');
}
}
