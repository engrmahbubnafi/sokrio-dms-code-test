<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $productId)
 */
class Stock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
