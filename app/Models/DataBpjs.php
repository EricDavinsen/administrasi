<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataBpjs extends Model
{
    public function pegawai():BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function datapribadi():BelongsTo
    {
        return $this->belongsTo(DataPribadi::class);
    }
    
    use HasFactory, Notifiable;

    protected $table = 'data_bpjs';
    protected $primaryKey = 'id';
    protected $guard = 'data_bpjs';

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
        "pegawai_id",
        "NOMOR_JKN",
        "NIK",
        "NIP",
        "NAMA_LENGKAP",
        "JENIS_KELAMIN",
        "STATUS_KAWIN",
        "HUBUNGAN_KELUARGA",
        "TANGGAL_LAHIR",
        "TANGGAL_MULAI_TMT",
        "TANGGAL_SELESAI_TMT",
        "GAJI_POKOK",
        "NAMA_FASKES",
        "NO_TELEPON",
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
}
