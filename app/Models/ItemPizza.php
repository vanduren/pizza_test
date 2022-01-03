<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPizza extends Model
{
    use HasFactory;
    public $table = 'item_pizza';
    protected $guarded = [];

}
