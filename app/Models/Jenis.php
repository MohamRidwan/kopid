<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class Jenis extends Model
{
    use HasFactory;
    // memberikan akses data apa saja yang bisa dilihat
    protected $visible = ['nama_anggota', 'id_card' , 'no_telepon', 'alamat','pengurus_id'];
    //memberikan akses data apa saja yang bisa di isi
    protected $fillable = ['nama_anggota', 'id_card', 'no_telepon', 'alamat','pengurus_id'];
    //mencatat waktu pembuatan dan update data otomatis
    public $timestamps = true;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'pengurus_id');
    }

    public static function id_card()
    {
        $id_card = DB::table('jenis')->max('id_card');
        $addNol = '';
        $id_card = str_replace("0101-2022-0000-1", "", $id_card);
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

        $kodeBaru = "0101-2022-0000-1".$addNol.$incrementKode;
        return $kodeBaru;
    } 

    
}
