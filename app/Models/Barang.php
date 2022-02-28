<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;


class Barang extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'kode_barang',
        'nama_barang',
        'stok',
        'jenis_id',
        'satuan_id',
    ];
  
    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'barang_id');
    }
    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'barang_id');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'nama_barang');
    }


   
    // public static function boot() {
    // parent::boot();
    //     self::deleting(function($barang) {
    //         //mengecek apakah barang masih punya barang
    //         if ($barang->barangmasuk->count() > 0) {
    //             //menyiapkan pesan error
    //             $html = 'barang tidak bisa di hapus karena memiliki kode_barang: ';
    //             $html .= '<ul>';
    //                 foreach ($barang->barangmasuk as $data) {
    //                     $html .= "<li>$data->kode_barang_masuk</li>";
    //                 }
    //                 $html .= '</ul>';
    //             Session::flash("flash_notification", [
    //                 "level" => "danger",
    //                 "message" => $html
    //             ]);
    //             //membatalkan proses penghapusan
    //             return false;
    //         }
    //     });

    // }
}
