<!doctype html>
<html lang="en">
<head>
	<title>{{ $title }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../assets/img/icons/brands/smk.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../login/css/style.css">
</head>
<body>
	@include('sweetalert::alert')
	<section class="ftco-section" style="margin-left: 10%; margin-top: 6%;" id="b">
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-5">
				<div class="login-wrap p-4 p-md-5" style="width: 450px;">
					<h3 class="">Login</h3>
					<p class="mb-4"> Please input username and password </p>
					<form action="{{ route('authadmin') }}" method="post" class="login-form">
                        @csrf
						<div class="form-group">
							<input type="text" class="form-control rounded-left"  name="username"
                       @if (Cookie::has('card_number'))
                            value="{{Cookie::get('card_number')}}"
                       @endif required autocomplete="off" placeholder="Username">
						</div>
                        <div class="form-group mt-3">
							<input type="password" class="form-control rounded-left"  name="password"
                       @if (Cookie::has('card_number'))
                            value="{{Cookie::get('card_number')}}"
                       @endif required placeholder="Password">
						</div>
					    <div class="form-group">
							<button type="submit"
								class="form-control btn btn-primary rounded submit px-3">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../login/js/jquery.min.js"></script>
	<script src="../login/js/popper.js"></script>
	<script src="../login/js/bootstrap.min.js"></script>
	<script src="../login/js/main.js"></script>
</body>
</html>
