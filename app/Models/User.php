<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Models\visualisasi\MahasiswaBaru;
use App\Models\visualisasi\CalonMahasiswa;
use App\Models\visualisasi\MahasiswaAktif;
use App\Models\visualisasi\MahasiswaLulusan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'programStudi'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function calonMahasiswas()
    {
        return $this->hasMany(CalonMahasiswa::class);
    }

    public function mahasiswaAktifs()
    {
        return $this->hasMany(MahasiswaAktif::class);
    }

    public function mahasiswaLulusans()
    {
        return $this->hasMany(MahasiswaLulusan::class);
    }

    public function mahasiswaBarus()
    {
        return $this->hasMany(MahasiswaBaru::class);
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }
}
