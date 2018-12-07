<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{
    protected $table = 'crawlers';

    protected $fillable = [
        'reference', 'name', 'process', 'output', 'results', 'last_crawl'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
