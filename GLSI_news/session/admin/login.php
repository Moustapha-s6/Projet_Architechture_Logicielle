<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

    <!-- v4.0.0-alpha.6 -->
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <h3 class="login-box-msg">Sign In</h3>
            <form action="connection.php" method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <input type="email" name="login" class="form-control sty1" placeholder="Email">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control sty1" placeholder="Password">
                </div>
                <div>
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox">
                                Remember Me </label>
                            <a href="reset.php" class="pull-right"><i class="fa fa-lock"></i> mot de passe oublié ?</a>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4 m-t-1">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Se Connecter</button>
                    </div>
                    <div class="col-xs-4 m-t-1">
                        <button class="btn btn-danger btn-block btn-flat"><a href="../../login.php" style="text-decoration: none;color: white;">Retour</a></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
            <div class="m-t-2">je n'ai pas de compte ? <a href="register.php" class="text-center">S'incrire</a></div>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="dist/js/jquery.min.js"></script>

    <!-- v4.0.0-alpha.6 -->
    <script src="dist/bootstrap/js/bootstrap.min.js"></script>

    <!-- template -->
    <script src="dist/js/niche.js"></script>
</body>

</html>