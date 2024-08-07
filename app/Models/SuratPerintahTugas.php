<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratPerintahTugas extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'surat_perintah_tugas';
    protected $guard = 'surat_perintah_tugas';

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
        "NO_SPT",
        "TANGGAL_SPT",
        "TANGGAL_MULAI",
        "TANGGAL_SELESAI",
        "LAMA_TUGAS",
        "KEPERLUAN",
        "FILE_SURAT",
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

    public function pegawai():BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
    
    public function pegawais(){
        return $this->belongsToMany(Pegawai::class, 'spt_pegawai');
    }
    
}