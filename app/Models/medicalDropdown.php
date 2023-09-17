<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicalDropdown extends Model
{
    use HasFactory;

    protected $table='medical_dropdowns';

    protected $guarded = [];
}
