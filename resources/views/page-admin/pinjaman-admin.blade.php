<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $fav }}">
    <!-- Datatable -->
    <link href="../assets-admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="../assets-admin/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="../assets-admin/images/logo.png" alt="">
                <img class="logo-compact" src="../assets-admin/images/logo-text.png" alt="">
                <img class="brand-title" src="../assets-admin/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <!--**********************************
            Nav header start
        ***********************************-->
            @include('partials-admin.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
            @include('partials-admin.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Pinjaman</h4>
                            <span class="ml-1">Data Peminjaman</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Peminjaman</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="add-barang">
                               <button type="" class="btn btn-primary tambahpinjaman"   style="font-weight: bold"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pinjaman</button>
                            </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Modal start
        ***********************************-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Pinjaman</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeAdmin') }}" id="tambahedit"  method="post" style="color: black">
                        @csrf
                    <input type="hidden" name="id" id="id" >
                    <div >
                        <label for="">Peminjaman</label>
                        <select name="user_id" id="user_id" class="form-select rounded-left mb-3">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div >
                        <label for="">Barang</label>
                        <select name="barang_id" id="barang_id" class="form-select rounded-left mb-3">
                            @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Jumlah Barang</label>
                        <input type="text" id="jumlah_barang" class="form-control rounded-left"  name="jumlah_barang" required >
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Tempat</label>
                        <input type="text" id="tempat_peminjaman" class="form-control rounded-left"  name="tempat_peminjaman" required >
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-paper-plane mr-1"> </i> Simpan</button>
                </div>
            </form>
              </div>
            </div>
          </div>
          @include('sweetalert::alert')
         <!--**********************************
            Modal end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        @include('partials-admin.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="../assets-admin/js/barang.js"></script> --}}
    <script src="../assets-admin/vendor/global/global.min.js"></script>
    <script src="../assets-admin/js/quixnav-init.js"></script>
    <script src="../assets-admin/js/custom.min.js"></script>
    <!---  boostrap  --->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <!-- Datatable -->
    <script src="../assets-admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets-admin/js/plugins-init/datatables.init.js"></script>
    <script src="../assets-admin/js/peminjaman.js"></script>
</body>
</html>
