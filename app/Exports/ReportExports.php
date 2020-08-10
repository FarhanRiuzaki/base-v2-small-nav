<?php
namespace App\Exports;

use App\TreasuryUpdate;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExports implements FromView
{
    public function view(): View
    {
        return view('report.exports.excel', [
            'treasury' => TreasuryUpdate::all()
        ]);
    }
}
