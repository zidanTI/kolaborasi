<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pasien extends Model
{
    use HasFactory;
    protected $guarded = [];
    //digunakan melakukan penyimpanan data pada banyak kolom secara bersamaan
    //dengan array
    /**
     * Get all of the daftar for the pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function daftar(): HasMany
    {
        return $this->hasMany(daftar::class);
    }
}
