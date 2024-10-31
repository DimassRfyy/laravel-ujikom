<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class mobil extends Model
{
    public function t_biaya_rental():HasMany {
        return $this->hasMany(t_biaya_rental::class);
    }
}
