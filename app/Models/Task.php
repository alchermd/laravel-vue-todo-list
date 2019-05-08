<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use UsesUuid;

    protected $fillable = [
        'title',
        'description',
        'is_finished',
    ];
}
