<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manger extends Model
{
    use HasFactory;
    protected $table = "manger";
    protected $fillable = [
        "id","name","active",'created_at','updated_at'
        
    ];
}
