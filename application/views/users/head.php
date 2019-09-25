<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Chamara">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?= $this->session->userdata('fname'); ?> <?= $this->session->userdata('lname'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>public/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>public/backend/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url()?>public/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <!--right slidebar-->
      <link href="<?= base_url()?>public/backend/css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url()?>public/backend/css/style.css" rel="stylesheet">
     <link href="<?= base_url()?>public/backend/css/select2.css" rel="stylesheet">
    <link href="<?= base_url()?>public/backend/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
 
    <link href="<?= base_url()?>public/backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
     <link href="<?= base_url()?>public/backend/assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
     

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="<?= base_url()?>public/backend/js/html5shiv.js"></script>
      <script src="<?= base_url()?>public/backend/js/respond.min.js"></script>
    <![endif]-->
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56624605-1', 'auto');
  ga('send', 'pageview');

</script>
  </head>

  <body>
  <div class="preloader animated fadeOut">
    <img src="<?= base_url() ?>public/img/loader.gif" alt="Preloader image">
  </div>
  <section id="container" class="">
