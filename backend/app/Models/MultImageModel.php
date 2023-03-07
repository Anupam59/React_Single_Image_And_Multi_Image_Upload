<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultImageModel extends Model
{
    use HasFactory;
    public $table='mult_image';
    public $primaryKey='mult_id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
