<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SECURDE MP">
    <meta name="author" content="ABC">

    <title>Russelio's Shoe Shop</title>

    <!-- Bootstrap Core CSS-->
    <link href="<?php echo e(asset('css/superhero_bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/master.css')); ?>" rel="stylesheet">
    <!--
    <link href="  https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  -->
    <!-- Custom CSS -->
    <?php echo $__env->yieldContent('customCSS'); ?>
    <?php echo $__env->yieldContent('customScripts'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Russelio's Shoe Shop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php echo $__env->yieldContent('navbarContents'); ?>

                    <li class="nav-item logout">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <?php echo $__env->yieldContent('pagecontent'); ?>
    <!-- /.container -->

    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>SECURDE MP T3 AY 2015-2016</p>
                    <p>Copyright &copy; Russelio's Shoe Shop 2016 - ABC</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery
    <script src="js/jquery.js"></script>
    -->

    <script src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript  js/bootstrap.min.js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>
