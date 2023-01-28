<!doctype html>
<html lang="en">
<head>
	<title>{{ $title }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../assets/img/icons/brands/smk.png" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../login/css/style.css">
</head>
<body>
    @include('sweetalert::alert')
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="col-md-4 col-sm-8 col-10">
            <img src="../login/image/tap-card.png" alt=""
                class="w-50 d-block mx-auto mb-5">
            <h3 class="text-center text-custom" style="font-size: 20px;">Silahkan Scan Kartu Anda Untuk Melakukan Pinjaman Barang</h3>
        </div>
    </div>

    <form action="{{ route('auth') }}" method="post" style="position: fixed;!important;opacity: 0;">
        @csrf
     <input type="text" name="card_number" autofocus>
    </form>
	<script src="../login/js/jquery.min.js"></script>
	<script src="../login/js/popper.js"></script>
	<script src="../login/js/bootstrap.min.js"></script>
	<script src="../login/js/main.js"></script>
</body>
</html>
