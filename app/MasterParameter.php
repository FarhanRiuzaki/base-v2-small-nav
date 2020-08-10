<?php

namespace App;

use App\Traits\RecordSignature;
use Illuminate\Database\Eloquent\Model;

class MasterParameter extends Model
{
    use RecordSignature;

    protected $fillable = [
        'code_megacash','code_mmoney','code_bca','amount_rekening','amount_sbi','amount_sbn','percentage_bca','percentage_all'
    ];
}
