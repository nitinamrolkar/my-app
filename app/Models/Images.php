<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function imageble()
    {
        return $this->morphTo();
    }
}
