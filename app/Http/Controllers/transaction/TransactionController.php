<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use DB;
use App\Product;
use App\Vendor;
use App\Customer;

class TransactionController extends Controller
{
    public function index(){

    	$transactions = Transaction::all();
    	return view('transactions.transactions',compact('transactions'));
    }
}
