<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function unit()
    {
        return $this->BelongsTo(Unit::class);
    }

    public function pizzas()
    {
        // voorwaarde: er is een items_pizza tabel (in die alfabetische volgorde)
        // met de velden item_id en pizza_id
        return $this->belongsToMany(Pizza::class);
    }
}
