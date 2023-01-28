@extends('main-admin.main')
@section('page-admin')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back {{ Auth::user()->name }}!</h4>
                <p class="mb-0">System manage barang tollman</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Confirm Peminjaman</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20" style="color: black;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Tempat</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Acc Peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;  ?>
                                @foreach ($data as $pinjaman)
                                <tr>
                                    <td>{{ $i; }}</td>
                                    <td>{{ $pinjaman->name }}</td>
                                    <td>{{ $pinjaman->nama_barang }}</td>
                                    <td>{{ $pinjaman->tanggal_peminjaman }}</td>
                                    <td><button class="btn btn-outline-primary btn-acc"><i class="fa-solid fa-check-double" onclick="ConfirmPeminjaman({{ $pinjaman->id }})"></i></button>  <button class="btn btn-outline-danger btn-acc"><i class="fa-solid fa-ban"></i></button> </td>
                                </tr>
                                <?php $i++;  ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
