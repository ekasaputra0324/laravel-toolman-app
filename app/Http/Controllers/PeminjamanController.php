<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pinjaman;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DateTime;
use Exception;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class PeminjamanController extends Controller
{
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'user_name' => ['required'],
            'barang_id' =>  ['required'],
            'jumlah_barang' => ['required'],
            'tempat_peminjaman' => ['required']
        ]);
        $count_barang = Pinjaman::where('barang_id', $request->barang_id )->sum('jumlah_pinjaman');
        $total_barang = Barang::where('id', $request->barang_id)->get();
        $users = User::where('name',$request->user_name )->get();
        foreach ($users as $user) {
            $id = $user->id;
        }
        foreach ($total_barang as $total) {
            $end_total = $total->jumlah_barang ;
        }
        if ($count_barang >= $end_total ) {
            Alert::error('stok barang telah habis');
            return redirect()->route('dashboard');
        }
        $jumlah_barang = intval($request->jumlah_barang);
        $todayDate = date("Y-m-d");
        $pinjaman = new Pinjaman();
        $pinjaman->user_id = $id;
        $pinjaman->barang_id = $request->barang_id;
        $pinjaman->tanggal_peminjaman = $todayDate;
        $pinjaman->jumlah_pinjaman = $jumlah_barang;
        $pinjaman->tanggal_pengembalian;
        $pinjaman->status_peminjaman = 0;
        $pinjaman->tempat = $request->tempat_peminjaman;
        $pinjaman->save();

        
        if ($pinjaman->save()) {
            Alert::info('Barhasil', 'Mohon konfirmasi kepada admin untuk mengambil  barang');
            return redirect()->route('dashboard');
        } else {
            Alert::info('Gagal', 'Data Barang Tidak valid barang');
            return redirect()->route('dashboard');
        }

    }
    public function storeAdmin(Request $request){
        $request->validate([
            'user_id' => ['required'],
            'barang_id' =>  ['required'],
            'jumlah_barang' => ['required'],
            'tempat_peminjaman' => ['required']
        ]);
        $count_barang = Pinjaman::where('barang_id', $request->barang_id )->sum('jumlah_pinjaman');
        $total_barang = Barang::where('id', $request->barang_id)->get();
        foreach ($total_barang as $total) {
            $end_total = $total->jumlah_barang ;
        }
        if ($count_barang >= $end_total ) {
            Alert::toast('stok barang telah habis','warning');
            return redirect()->route('peminjaman-admin');
        }
        $jumlah_barang = intval($request->jumlah_barang);
        $todayDate = date("Y-m-d");
        $pinjaman = new Pinjaman();
        $pinjaman->user_id = $request->user_id;
        $pinjaman->barang_id = $request->barang_id;
        $pinjaman->tanggal_peminjaman = $todayDate;
        $pinjaman->jumlah_pinjaman = $jumlah_barang;
        $pinjaman->tanggal_pengembalian;
        $pinjaman->status_peminjaman = 1;
        $pinjaman->tempat = $request->tempat_peminjaman;
        if ($pinjaman->save()) {
            Alert::toast('pinjaman berhasil di tambahkan' , 'success');
            return redirect('/peminjaman');
        } else {
            Alert::info('Barhasil', 'Mohon konfirmasi barang admin untuk mengambil  barang');
            return redirect('/peminjaman');
        }
    }
   
    public function accPeminjaman($id){
        $pinjaman = Pinjaman::find($id);
        $update =  $pinjaman->update(['status_peminjaman' => 1]);
        return redirect()->route('admin');
       }
    public function Pengembalian($id){
        $peminjaman = Pinjaman::where('id' , $id);
        $pengembalian = $peminjaman->update([
            'tanggal_pengembalian' => date("Y-m-d"),
            'status_pengembalian' => 1
        ]);
        if ($pengembalian) {
            Alert::toast('pengembalian berhasil ', 'success');
            return redirect()->route('peminjaman-admin');
        }else{
            Alert::toast('pengembalian gagal',  'error');
            return redirect()->route('peminjaman-admin');
        }
    }
    public function update(Request $request , $id){
        $pinjaman = Pinjaman::where('id', $id);
        $update = $pinjaman->update([
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id,
            'tempat' => $request->tempat_peminjaman,
            'tanggal_peminjaman' => date('Y-m-d'),
            'jumlah_pinjaman' => $request->jumlah_barang,
        ]);
        if ($update) {
            Alert::toast('data berhasil di update', 'success');
            return redirect()->route('peminjaman-admin');    
        }else{
            Alert::toast('data gagal di update', 'error');
            return redirect()->route('peminjaman-admin');
        }

    }

    public function getData($id){
        $data = Pinjaman::find($id);
        echo json_encode($data);
    }
    public function deleteBarang($id) { 
        $pinjaman = Pinjaman::where( 'id',$id);
        if ($pinjaman->delete()) {
            Alert::toast('data berhasil di hapus', 'success');
            return redirect()->route('peminjaman-admin');
        }
        dd('gagal');
    }
    
    public function Exportpdf(){
        $data =  DB::table('pinjamen')
        ->join('users', 'users.id', '=', 'pinjamen.user_id')
        ->join('barangs', 'barangs.id', '=', 'pinjamen.barang_id')
        ->select('pinjamen.*', 'users.name', 'barangs.nama_barang' , )->where('pinjamen.status_peminjaman', 1)
        ->get();
        $pdf = PDF::loadView('page-admin.pdf.pdf-pinjaman', ['data' => $data]);
        return $pdf->download('DataPinjaman.pdf');
    }
}