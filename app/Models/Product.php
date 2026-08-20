<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUlids;
    protected $fillable = [
        'name',
        'description',
        'category',
        'sku',
        'price',
        'stock',
    ];

     protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Product $product) {
            if (empty($product->sku)) {
                do {
                    $sku = 'PRD-' . strtoupper(Str::random(6));
                } while (self::where('sku', $sku)->exists());

                $product->sku = $sku;
            }
        });
    }
    
}