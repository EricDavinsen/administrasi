<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'surat_masuks';


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ["remember_token"];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];
    protected $fillable = [
        "KODE_SURAT",
        "NOMOR_SURAT",
        "TANGGAL_SURAT",
        "TANGGAL_MASUK",
        "JENIS_SURAT",
        "ASAL_SURAT",
        "SIFAT_SURAT",
        "PERIHAL_SURAT",
        "FILE_SURAT"
    ];

    public function getCreatedAtAttribute()
    {
        if (!is_null($this->attributes["created_at"])) {
            return Carbon::parse($this->attributes["created_at"])->format(
                "Y-m-d H:i:s"
            );
        }
    }

    public function getUpdatedAtAttribute()
    {
        if (!is_null($this->attributes["updated_at"])) {
            return Carbon::parse($this->attributes["updated_at"])->format(
                "Y-m-d H:i:s"
            );
        }
    }

    public function dispo()
    {
        return $this->hasOne(Disposisi::class, 'id' , 'surat_masuk_id');
    }
    
}
