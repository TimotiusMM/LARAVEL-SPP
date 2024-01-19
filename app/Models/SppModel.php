<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SppModel extends Model
{
    use HasFactory;
    protected $table = 'tpembayaran';
    protected $guarded = [];

    public static function getAllspp()
    {
        $result = DB::table('tpembayaran')
            ->select('id_pembayaran','id_petugas', 'nisn', 'tgl_bayar','bulan_bayar','tahun_bayar','id_spp', 'jumlah_bayar')
            ->get()->toArray();
    
        return $result;
    }
    
}
