<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
class Supplier extends Model
{
    use HasFactory;

    // memberikan akses data apa saja yang bisa dilihat
    protected $visible = ['nama_supplier', 'id_card' , 'no_telepon', 'alamat'];
    //memberikan akses data apa saja yang bisa di isi
    protected $fillable = ['nama_supplier', 'id_card', 'no_telepon', 'alamat'];
    //mencatat waktu pembuatan dan update data otomatis
    public $timestamps = true;


    
    public static function id_card()
    {
        $id_card = DB::table('suppliers')->max('id_card');
        $addNol = '';
        $id_card = str_replace("0101-2022-0000-0", "", $id_card);
        $id_card = (int) $id_card + 1;
        $incrementKode = $id_card;

        if (strlen($id_card) == 1)
        {
            $addNol = "000";
        }
        else if (strlen($id_card) == 2)
        {
            $addNol = "00";
        }
        else if (strlen($id_card) == 3)
        {
            $addNol = "0";
        }

        $kodeBaru = "0101-2022-0000-0".$addNol.$incrementKode;
        return $kodeBaru;
    } 
    public static function boot() {
        parent::boot();
            self::deleting(function($supplier) {
                //mengecek apakah barang masih punya barang
                if ($supplier->barangmasuk->count() > 0) {
                    //menyiapkan pesan error
                    $html = 'barang tidak bisa di hapus karena memiliki kode_barang: ';
                    $html .= '<ul>';
                        foreach ($supplier->barangmasuk as $data) {
                            $html .= "<li>$data->kode_barang_masuk</li>";
                        }
                        $html .= '</ul>';
                    Session::flash("flash_notification", [
                        "level" => "danger",
                        "message" => $html
                    ]);
                    //membatalkan proses penghapusan
                    return false;
                }
            });
    
        }

}
