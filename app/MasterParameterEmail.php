<?php

namespace App;

use App\Traits\RecordSignature;
use Illuminate\Database\Eloquent\Model;

class MasterParameterEmail extends Model
{
    use RecordSignature;

    protected $fillable = [
      'master_parameter_id', 'email', 'flag_id'
    ];
}
