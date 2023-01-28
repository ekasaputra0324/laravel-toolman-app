<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers\GetRole;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // views
    public function index(){
        return view('page-user.index', [
           "title" => "Home | TOOLMAN-APP",
           "barangs" => Barang::all()
        ]);
    }
    public function pinjaman($id){
        return view('page-user.pinjaman',[
            "title" => "Pinjaman | TOOLMAN-APP",
            "data" =>  DB::table('pinjamen')
            ->join('users', 'users.id', '=', 'pinjamen.user_id')
            ->join('barangs', 'barangs.id', '=', 'pinjamen.barang_id')
            ->select('pinjamen.*', 'users.name', 'barangs.nama_barang')->where('pinjamen.user_id', $id)
            ->get()

        ]);
    }
    public function pengembalian($id){
        $data = DB::table('pinjamen')
        ->join('users', 'users.id', '=', 'pinjamen.user_id')
        ->join('barangs', 'barangs.id', '=', 'pinjamen.barang_id')
        ->select('pinjamen.*', 'users.name', 'barangs.nama_barang')->where('pinjamen.user_id', $id)
        ->get();    
        return view('page-user.pinjaman',[
            "title" => "Pengembalian | TOOLMAN-APP",
            "data" => $data  
        ]);
    }
    }
