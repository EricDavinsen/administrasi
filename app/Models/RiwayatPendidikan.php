<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatPendidikan extends Model
{

    public function pegawai():BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
    
    use HasFactory, Notifiable;

    protected $table = 'riwayat_pendidikan';
    protected $primaryKey = 'id';
    protected $guard = 'riwayat_pendidikan';

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
        "NAMA_SEKOLAH",
        "JURUSAN",
        "TAHUN_LULUS",
        "STTB",
        "IJAZAH_SEKOLAH",
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
