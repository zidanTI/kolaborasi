<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daftar extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Get the pasien that owns the Daftar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(pasien::class)->withDefault();
    }
    public function poli(): BelongsTo
    {
        return $this->belongsTo(poli::class)->withDefault();
    }
}
