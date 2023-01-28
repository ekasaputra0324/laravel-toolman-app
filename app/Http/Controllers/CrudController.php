<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Http\Controllers\Controller;
use App\Http\Helpers\GetRole;
use App\Models\Barang;
use App\Models\Pinjaman;
use App\Models\User;
use Exception;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use RealRashid\SweetAlert\Facades\Alert as Alert;
use Spatie\Permission\Models\Permission;


class CrudController extends Controller
{
    // CRUD BARANG
    public function storeBarang(Request $request){
        $request->validate([
            'nama_barang' => ['required'],
            'jumlah_barang' => ['required']
        ]);

        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => intval($request->jumlah_barang)
        ]);
        if ($barang ) {
            Alert::toast('Barang berhasil di tambahkan','success');
            return redirect()->route('barang');
        }
        Alert::toast('Barang gagal di tambhkan','error');
        return redirect()->route('barang');
    }
    public function deletedBarang($id){
        $barang = Barang::where('id', $id);
        $delete = $barang->delete();
        if ($delete > 0) {
            Alert::toast('Barang berhasil di hapus','success');
            return redirect()->route('barang');
        }
        Alert::toast('Barang gagal di hapus','error');
        return redirect()->route('barang');
    }
    public function updateBarang(Request $request){
        $request->validate([
            'nama_barang' => ['required'],
            'jumlah_barang' => ['required']
        ]);
        $barang = Barang::where('id', $request->id);
        $hasil = $barang->update([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => intval($request->jumlah_barang)
        ]);

       if ($hasil) {
        Alert::toast('Barang berhasil di update','success');
        return redirect()->route('barang');
       }else{
        Alert::toast('Barang gagal di update','error');
        return redirect()->route('barang');
       }


    }
    // CRUD USERS
    public function storeUser(Request $request){
        $request->validate([
            'role' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'card_number' => ['required']
        ]);
        $card_number = $request->card_number;
        $check = User::where('card_number', $card_number)->count();
        if ($check > 0) {
            Alert::toast('data duplicate','error');
            return redirect()->route('users');
        }
        $users = new User();
        $users->card_number = $request->card_number;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->card_number);
        $users->save();
       $user_id  =   $users->id;
       $role =   DB::table('model_has_roles')->insert(
        [
            'role_id' => $request->role,
            'model_type' => 'App\Models\User',
            'model_id' => $user_id
        ]
        );
        if ($role == true) {
            Alert::toast('Users berhasil di tambahkan sebagai admin','success');
            return redirect()->route('admin');
        }else{
            Alert::toast('Users gagal di tambahkan');
            return redirect()->route('admin');
        }
    }
    public function deleteUsers($id){
        $qeury = User::where('id', $id);
        $deleted = $qeury->delete();
        if ($deleted) {
            Alert::toast('User berhasil di hapus','success');
            return redirect()->route('users');
        }
    }
    public function updateUsers(Request $request){
        $request->validate([
            'name' => ['required'],
            'card_number' => ['required'],
            'email' => ['required']
        ]);
        $id = $request->id;
        $user = User::where('id', $id);
        $query = $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->card_number),
            'card_number' => $request->card_number,
            'email' => $request->email
        ]);

        if($query){
            Alert::toast('User berhasil update ','success');
            return redirect()->route('users');
        }
        Alert::toast('User gagal di update','error');
        return redirect()->route('users');

    }
    // GET DATA
    public function getDataBarang($id){
        $barang = Barang::where('id', $id)->get();
        echo json_encode($barang);

    }
    public function getDataPinjaman($id){
        $pinjaman = Pinjaman::where('id', $id)->get();

    }
    public function getDataUsers($id){
        $user = User::where('id', $id)->get();
        echo json_encode($user);
    }

    // get role id  
    public function getUsersRole($id){
        $role = new GetRole();
        $role_user = $role->getRoleid($id);
        echo json_encode($role_user);
    }
    // export excel
    public function exportBarang(){
        return Excel::download(new BarangExport, 'barang.xlsx');
    }

}
