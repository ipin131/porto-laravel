<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $fillable = ['judul','tipe','tgl_mulai','tgl_akhir','info1','info2','info3','isi'];
   
}
