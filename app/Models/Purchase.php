<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 * @method static get()
 * @method static join(string $string, string $string1, string $string2)
 */
class Purchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
