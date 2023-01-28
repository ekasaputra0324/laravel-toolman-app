<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Parser\Inline\BangParser;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){

        return view('page-admin.index',[
            "title" => "Dashboard | TOOLMAN-APP",
            "data" => DB::table('pinjamen')
            ->join('users', 'users.id', '=', 'pinjamen.user_id')
            ->join('barangs', 'barangs.id', '=', 'pinjamen.barang_id')
            ->select('pinjamen.*', 'users.name', 'barangs.nama_barang')->where('pinjamen.status_peminjaman', 0)
            ->get()
        ]);
    }
    public function pinjaman(){
        return view('page-admin.pinjaman-admin',[
            "title" => "Peminjaman | TOOLMAN-APP",
            "fav" => "../assets/img/icons/brands/smk.png",
            "data" => DB::table('pinjamen')
            ->join('users', 'users.id', '=', 'pinjamen.user_id')
            ->join('barangs', 'barangs.id', '=', 'pinjamen.barang_id')
            ->select('pinjamen.*', 'users.name', 'barangs.nama_barang' , )->where('pinjamen.status_peminjaman', 1)
            ->get(),
            "users" => User::all(),
            "barangs" => Barang::all()
        ]);

    }
    

    public function barang(){
        $pinjaman_count = Pinjaman::where('status_pengembalian', 0)->count();
        $pinjamans = Pinjaman::where('status_pengembalian',  0)->get();

        $loop = 1;
            if ($pinjaman_count < 1){
            $pinjaman_array = null;
            goto skip;
            }
            foreach($pinjamans as $pinjaman){
                
                $id_p = $pinjaman->barang_id; 
                $pinjaman_array[$id_p][$loop] = $pinjaman->jumlah_pinjaman;
                $loop++;
            }
        skip:
       return view('page-admin.barang',[
            "title" => "Barang  | TOOLMAN-APP",
            "fav" => "../assets/img/icons/brands/smk.png",
            "barangs" => Barang::all(),
            "pinjaman_array" => $pinjaman_array
        ]);
    }

    public function user(){
        return view('page-admin.users',[
            "title" => "Users | TOOLMAN-APP",
            "fav" => "../assets/img/icons/brands/smk.png",
            "users" => User::all(),
            "roles" => Role::all()
        ]);
    }
}
