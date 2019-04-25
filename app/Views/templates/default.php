<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="canonical" href="https://startbootstrap.com/previews/clean-blog/">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">


    <link type="application/atom+xml" rel="alternate" href="https://startbootstrap.com/feed.xml" title="startbootstrap" />
    <script type="be8a942a569fc6ff6c56a9f5-text/javascript">
  // Google Analytics Tracking Script
  (function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-38417733-17', 'startbootstrap.com');
  ga('send', 'pageview');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.css" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="<?php if (!isset($_SESSION['auth'])) {
                    ?>index.php?p=users.login" class=" navbar-brand">Administration</a><?php }
                    else { ?>index.php?p=admin.articles.index" class=" navbar-brand">Administration<a
                            href="?p=users.disconnect">
                        <button class="btn-danger btn-sm">Deconnection</button>
                    </a><?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/banner.jpg'); background-attachment: fixed">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Billet simple pour l'Alaska</h1>
                    <span class="subheading">Laissez moi vous raconter...</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-10 mx-auto">
            <?= $content ?>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container" style="filter:alpha(opacity=50); opacity:0.5;>
        <div class=" row
    ">
    <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
            <li class="list-inline-item">
                <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
                </a>
            </li>
        </ul>
        <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
    </div>

</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=t8wsrw0o08y3nbn52u7y9sj2h0ec3r664cralpe9txjj4yhc"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<script src="js/clean-blog.js"></script>
</body>

</html>
