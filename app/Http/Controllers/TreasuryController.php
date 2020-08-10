<?php

namespace App\Http\Controllers;

use App\MasterParameter;
use App\TreasuryUpdate;
use Illuminate\Http\Request;

class TreasuryController extends Controller
{
    public function index(Request $req)
    {
        $parameter  = MasterParameter::latest('id')->first();
        if($parameter){
            $record['amount_bni']       = $parameter['amount_rekening'];
            $record['amount_sbi']       = $parameter['amount_sbi'];
            $record['amount_sbn']       = $parameter['amount_sbn'];
            $record['total_amount']     = ($parameter['amount_sbn'] + $parameter['amount_sbi'] + $parameter['amount_rekening']);
        }

        $record     = TreasuryUpdate::latest('id')->first();
        if($record){
            $record['amount_bni']       = $record['amount_bni'];
            $record['amount_sbi']       = $record['amount_sbi'];
            $record['amount_sbn']       = $record['amount_sbn'];
            $record['total_amount']     = $record['total_amount'];
        }

        return view('treasury.index', compact('record'));
    }

    public function store(Request $req)
    {
        $requestData = $req->all();
        $requestData['amount_sbi']      = convertNumber($requestData['amount_sbi']);
        $requestData['amount_sbn']      = convertNumber($requestData['amount_sbn']);
        $requestData['amount_bni']      = convertNumber($requestData['amount_bni']);
        $requestData['total_amount']    = convertNumber($requestData['total_amount']);
        $requestData['presentage']      = 0;

        TreasuryUpdate::create($requestData);

        return redirect(route('treasury.index'))->with(['success' => 'Data Berhasil di Perbaharui']);
    }
}
