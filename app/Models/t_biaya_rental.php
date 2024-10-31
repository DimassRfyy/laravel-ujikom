<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class t_biaya_rental extends Model
{

    protected $fillable = [
        'nama_penyewa',
        'mobil_id',
        'program_id',
        'total_biaya',
        'lama_sewa',
    ];
    public function mobil ():BelongsTo {
        return $this->belongsTo(mobil::class);
    }

    public function program(): BelongsTo {
        return $this->belongsTo(program::class);
    }
}
