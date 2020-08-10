<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\ReportExports;

class ReportController extends Controller
{
    public function index(Request $req)
    {
        return view('report.index');
    }

    public function show()
    {
        # code...
    }
    public function laporanExcel()
    {
        return Excel::download(new ReportExports, 'invoices.xlsx');
    }
}
