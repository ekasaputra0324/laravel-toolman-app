<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <table id="example" class="display" style="min-width: 845px">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama Peminjam</th>
              <th>Nama Barang</th>
              <th>Jumlah Barang</th>
              <th>Tempat</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Pengembalian</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          <?php $i=1; ?>
          @foreach ($data as $pinjaman)
           <tr style="color: rgb(80, 80, 80);">
              <td>{{ $i }}</td>
              <td>{{ $pinjaman->name }}</td>
              <td>{{ $pinjaman->nama_barang }}</td>
              <td>{{ $pinjaman->jumlah_pinjaman }}</td>
              <td>{{ $pinjaman->tempat }}</td>
              <td class="text-danger">{{ date_format(date_create_from_format('Y-m-d', $pinjaman->tanggal_peminjaman), 'd-m-Y'); }}</td>
              @if ($pinjaman->tanggal_pengembalian == null)
              <td class="text-danger">Belum Di Kembalikan</td>
              @else
              <td class="text-success">{{ date_format(date_create_from_format('Y-m-d', $pinjaman->tanggal_pengembalian), 'd-m-Y'); }}</td>
              @endif
              <td> <button type="button" class="btn btn-outline-warning" onclick="Pengembalian({{ $pinjaman->id }})"><i class="fa-solid fa-check" ></i></button> <button type="button" class="btn btn-outline-primary updatepinjaman" data-id="{{ $pinjaman->id }}"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i>
              </button>  <button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash" onclick="deletedPinjaman({{ $pinjaman->id }})"></i></button> </td>
          </tr>
          <?php $i++; ?>
          @endforeach
      </tfoot>
  </table>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>