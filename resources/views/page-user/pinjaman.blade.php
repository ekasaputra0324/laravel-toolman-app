@extends('partials.main');
@section('content')
<div class="card" style="width: 87%; margin-left: 7%;">
    <div class="row row g-0">
        <div class="col-md-8">
                <h5 class="card-header m-0 me-2 pb-3">Data Peminjaman</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($data as $pinjaman)    
                    <tr>
                        <td>{{ $i; }}</td>
                        <td>{{ $pinjaman->nama_barang }}</td>
                        <td>{{ $pinjaman->jumlah_pinjaman }}</td>
                        @if ($title = 'Pengembalian | TOOLMAN-APP')
                        @if ($pinjaman->tanggal_pengembalian == null)
                            <td class="text-danger">Belum Di Kembalikan</td>
                        @else
                        <td>{{ date_format(date_create_from_format('Y-m-d', $pinjaman->tanggal_pengembalian), 'd-m-Y'); }}</td>    
                        @endif
                        @else
                        <td>{{ date_format(date_create_from_format('Y-m-d', $pinjaman->tanggal_peminjaman), 'd-m-Y'); }}</td>
                        @endif
                        @if ($pinjaman->status_peminjaman == 1)
                        <td class="text-success">Verify</td>
                        @else
                        <td class="text-danger">Pending</td>        
                        @endif
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
