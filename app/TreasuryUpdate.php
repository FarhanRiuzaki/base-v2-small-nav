<?php

namespace App;

use App\Traits\RecordSignature;
use Illuminate\Database\Eloquent\Model;

class TreasuryUpdate extends Model
{
    use RecordSignature;

    protected $fillable = [
        'amount_sbi',
        'amount_sbn',
        'amount_bni',
        'total_amount',
        'presentage'
    ];
}
