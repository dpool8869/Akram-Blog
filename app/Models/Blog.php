<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $fillable = ["name", "email", "address"];
}
