<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 * @property string $name
 * @property string $details
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
