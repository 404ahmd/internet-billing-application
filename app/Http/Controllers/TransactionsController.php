<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(){
        return view('customer.transactions_customer');
    }

   
}
