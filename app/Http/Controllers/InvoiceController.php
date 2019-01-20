<?php

namespace App\Http\Controllers;

use App\CalculatePriceMeneger;
use App\Invoice;
use App\Mail\AdminMailClass;
use App\TagList;
use Validator;
use App\Mail\MailClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function createInvoice()
    {
        return view('invoice');
    }

    public function getInvoice(Request $request)
    {

        $names = $request->input("name");
        $price = $request->input("price");

        $calculateManager = new CalculatePriceMeneger();

        $calculateManager->calculateTotalPrice($price);

        $invoice = new Invoice($names,$price, $calculateManager);
        $invoice->getTotalSumm();

        Mail::to('rkazuka7@gmail.com')->send(new MailClass($invoice));

        return response()->json($request->all());
    }

    public function pay( $price)
    {
       return view('pay')->with(['price'=>$price]);
    }

    public function payCurrentInvoice() {

        Mail::to('rkazuka7@gmail.com')->send(new AdminMailClass());
        return view('payd');
    }
}
