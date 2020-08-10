<?php

namespace App;

use App\Traits\RecordSignature;
use Illuminate\Database\Eloquent\Model;

class MasterFlag extends Model
{
    use RecordSignature;

    protected $fillable = [
        'parent', 'level', 'description'
    ];
}
