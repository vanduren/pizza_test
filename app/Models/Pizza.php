<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items()
    {
        // voorwaarde: er is een items_pizza tabel (in die alfabetische volgorde)
        // met de velden item_id en pizza_id
        return $this->belongsToMany(Item::class);
    }
}
