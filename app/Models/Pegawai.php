<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama_pegawai',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'tanggal_lahir',
    ];

    protected function casts(): array {

        return[
            'tanggal_lahir' => 'date',
        ];
    }

    protected function usia(): Attribute {

        return Attribute::get(fn(): int => $this->tanggal_lahir->age,);
    }
}
