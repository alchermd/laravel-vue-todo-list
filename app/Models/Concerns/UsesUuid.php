<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Provides an Eloquent model the functionality of using a
 * UUID as its primary key.
 *
 * @package App\Models\Concerns
 */
trait UsesUuid
{
    protected static function bootUsesUuid()
    {
        static::creating(function (Model $model) : void {
            if ( ! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
