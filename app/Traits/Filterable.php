<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Filterable
{
    public function scopeFilter($query, $param)
    {
        foreach ($param as $field => $value) {
            $method = 'filter' . Str::studly($field);

            if ($value != '') {
                if (method_exists($this, $method)) {
                    $this->{$method}($query, $value);
                }
            }
        }
        return $query;
    }
}
