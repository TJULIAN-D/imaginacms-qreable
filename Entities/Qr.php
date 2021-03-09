<?php

namespace Modules\Qreable\Entities;

use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{

    protected $table = 'qreable__qrs';
    protected $fillable = ['code'];
}
