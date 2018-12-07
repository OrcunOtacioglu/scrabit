<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'crawler_id', 'reference', 'name', 'xpath', 'css_path', 'action'
    ];

    public function crawler()
    {
        return $this->belongsTo(Item::class);
    }
}
