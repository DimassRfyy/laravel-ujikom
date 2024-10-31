<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class program extends Model
{
    public function t_biaya_rental():HasMany {
        return $this->hasMany(T_biaya_rental::class);
    }
}
