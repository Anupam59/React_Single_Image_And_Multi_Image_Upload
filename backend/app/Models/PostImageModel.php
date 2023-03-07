<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImageModel extends Model
{
    use HasFactory;
    public $table='post_image';
    public $primaryKey='post_id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
