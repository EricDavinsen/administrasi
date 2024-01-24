<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disposisi extends Model
{

    public function surat(): BelongsTo
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id' , 'id');
    }

    use HasFactory, Notifiable;

    protected $table = 'disposisi';
    protected $primaryKey = 'id';
    protected $guard = 'disposisi';

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
        "surat_masuk_id",
        "NAMA",
        "HASIL_LAPORAN",
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
