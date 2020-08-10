<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apps;
use App\MasterParameter;
use App\TreasuryUpdate;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $record     = [];
        $parameter  = MasterParameter::latest('id')->first();
        if($parameter){
            $record['amount_bni']       = $parameter['amount_rekening'];
            $record['amount_sbi']       = $parameter['amount_sbi'];
            $record['amount_sbn']       = $parameter['amount_sbn'];
            $record['total_amount']     = ($parameter['amount_sbn'] + $parameter['amount_sbi'] + $parameter['amount_rekening']);
        }

        $treasury   = TreasuryUpdate::latest('id')->first();
        if($treasury){
            $record['amount_bni']       = $treasury['amount_bni'];
            $record['amount_sbi']       = $treasury['amount_sbi'];
            $record['amount_sbn']       = $treasury['amount_sbn'];
            $record['total_amount']     = $treasury['total_amount'];
        }
        // dd($treasury);
        return view('home', compact('parameter','treasury', 'record'));
    }
}
