<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'pegawai';
    protected $guard = 'pegawai';

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
        "NAMA_PEGAWAI",
        "NIK",
        "NO_KK",
        "TANGGAL_LAHIR",
        "JENIS_KELAMIN",
        "AGAMA",
        "INSTANSI",
        "UNIT",
        "SUB_UNIT",
        "JABATAN",
        "JENIS_PEGAWAI",
        "PENDIDIKAN_TERAKHIR",
        "STATUS_PEGAWAI",
        "KEDUDUKAN",
        "FOTO_PEGAWAI",
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

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
