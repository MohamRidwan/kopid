<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pengadaan Barang - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<br><br><br><br><br>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading text-center">
					<b style="color:black">
						LOGIN</b>
					</div>
				<div class="panel-body">
                    <div class="text-center">
					<h3><b><span style="color:blue">
                    Pengadaan </span>Barang</b></h3>
                    </div><br>
					<form role="form" action="{{ route('login') }}" method="POST">
                        @csrf
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Alamat Email" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
                            <br>
                            <button class="btn btn-primary btn-block btn-lg">Login</button>
                        </fieldset><br><br>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
