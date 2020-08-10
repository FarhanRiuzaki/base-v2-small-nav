<?php

namespace App\Http\Controllers;

use App\MasterParameter;
use App\MasterParameterEmail;
use Illuminate\Http\Request;

class MasterParameterController extends Controller
{
    public function index(Request $req)
    {
        $record = MasterParameter::latest('id')->first();

        // Email Notifikasi Giro BCA
        $email1 = MasterParameterEmail::where('flag_id', 1)->get();

        // Email Notifikasi Rek BI/SBI/SBN
        $email2 = MasterParameterEmail::where('flag_id', 2)->get();

        return view('MasterParameter.index',compact('record', 'email1', 'email2'));
    }

    public function store(Request $req)
    {
        $requestData = $req->all();
        $requestData['amount_sbi']          = convertNumber($requestData['amount_sbi']);
        $requestData['amount_sbn']          = convertNumber($requestData['amount_sbn']);
        $requestData['amount_rekening']     = convertNumber($requestData['amount_rekening']);
        $requestData['percentage_bca']      = convertNumber($requestData['percentage_bca']);
        $requestData['percentage_all']      = convertNumber($requestData['percentage_all']);

        MasterParameter::create($requestData);

        return redirect(route('parameter.index'))->with(['success' => 'Data Berhasil di Perbaharui']);
    }

    public function storeEmail(Request $req)
    {
        $requestData    = $req->all();

        MasterParameterEmail::firstOrCreate([
            'email'     => $requestData['email'],
            'flag_id'   => $requestData['flag_id'],
        ]);

        $response = array(
            'status'    => 'success',
            'msg'       => "Success",
        );
        return response()->json($response);
    }

    public function deleteEmail($id,Request $req)
    {
        $requestData    = $req->all();
        MasterParameterEmail::destroy($id);

        $response = array(
            'status'    => 'success',
            'msg'       => "Success",
        );
        return response()->json($response);
    }
}
