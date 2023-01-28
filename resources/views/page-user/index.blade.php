@extends('partials.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Form Peminjaman</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('peminjaman') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-name">Nama Guru</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}"  name="user_name"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-company">Nama Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="barang_id">
                                        <option selected>--- Barang ---</option>
                                        @foreach ($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-name">Jumlah Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jumlah_barang"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-name">Tempat Pinjaman</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat_peminjaman"/>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Pinjam</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                <div
                                    class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5>Clock <span
                                                class="badge bg-label-warning rounded-pill">NOW</span>
                                        </h5>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <h3 class="mb-0" id="clock"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                <div
                                    class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2"> <a href="/pinjaman/{{ Auth::user()->id }}" style="color:#566a7f">Dipinjam</a></h5>
                                        <span class="badge bg-label-warning rounded-pill"> YEAR
                                            <script>
                                                document.write(new Date().getFullYear());
                                            </script>
                                        </span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <h3 class="mb-0">{{ 30 }} </h3>
                                    </div>
                                </div>
                                <div id="profileReportChart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                <div
                                    class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2"> <a href="/pengembalian/{{ Auth::user()->id }}" style="color:#566a7f">Dikembalikan</a></h5>
                                        <span class="badge bg-label-warning rounded-pill"> YEAR
                                            <script>
                                                document.write(new Date().getFullYear());
                                            </script>
                                        </span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <h3 class="mb-0">{{ 10 }}</h3>
                                    </div>
                                </div>
                                <div id="profileReportChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
