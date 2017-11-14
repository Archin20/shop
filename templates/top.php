<?php require_once('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $description ?>">
    <meta name="author" content="">
	

    <title>Shop Homepage - Start Bootstrap Template
	
	<?=(isset($title))?$title:''?>
	</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto mouseout">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" data-color="green" data-body="Тут больше о нашей компании ТЕКСТ
			  ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ" href="static.php?url=About">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" data-body='Тут больше о нашей компании ТЕКСТ
			  ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ' href="static.php?url=services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" data-body='Тут больше о нашей компании ТЕКСТ
			  ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ ТЕКСТ' href="static.php?url=contacts">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<div id="title">welcome to hell </div>

    <!-- Page Content -->
    <div class="container">
	<?php 
	if(isset($_SESION['user_id'])){
		?>
		<a href="cabinet.php">Кабинет</a>
		<a href="logout.php">Выход</a>
		<?php
	}else {
		?>
		<a href="login.php">Вход</a>
		<a href="register.php">Регистрация</a>
		<?php
	}
	?>
      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
		  <? 
		  $query="SELECT*FROM catalogs WHERE type='main'";
		  $adr=mysqli_query($db_con,$query);
		  if(!$adr){
			  exit($query);
		  }
		  while($tbl_catalogs=mysqli_fetch_array($adr)){
			  ?>
			  <a href="catalog.php?id=<?=$tbl_catalogs['id']?>" class="list-group-item">
			  <?=$tbl_catalogs['name']?>
			  </a>
			  <?
		  }
		  ?>
            
            
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">