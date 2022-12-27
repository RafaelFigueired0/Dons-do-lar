<?php session_start(); ?>
<?php require './parts/utils.php';?>

<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Dons do Lar</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<link rel="shortcut icon" type="image/png" href="/img/logo_edited_twice.png">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->

<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
	
<body>
<!-- header -->
<?php require './parts/cookies-modal.php'; ?>
<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				
			</div>
			<div class="agile-login">
				<ul><?php
                        if(is_login()) {
                        ?>
                        <li class="nav-item">
                            <a href="/profile.php"><?php echo  $_SESSION['name']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"href="/logout.php">Logout</a>
                        </li><?php
                        } else {
                        ?>
                        <li class="nav-item">
                            <a href="/login.php">Login</a>
                        </li>
						<li> 
						<a href="/regist.php">Criar conta</a>
						</li>
						<?php
						}?>
						<?php if (is_admin()){
						?>
						 <li class="nav-item">
                            <a class="nav-link" href="backoffice_index.php">administração</a>
                        </li>
						<?php
						}?>
                        <li class="nav-item">
                            <a class="nav-link" href="help.php">Ajuda</a>
                        </li>
						</ul>
			</div>
			<div class="product_list_header">  
					<form href="cart.php" method="post" class="last"> 
						<a href='cart.php'  class="w3view-cart" ><i class="fa fa-shopping-cart" aria-hidden="true"></a></i></button>
					</form>  
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				
			</div>
			<div 
	
				class="w3ls_logo_products_left">
				<a href="index.php"><img align="middle" width= "450px" height="175px" src="https://cdn.discordapp.com/attachments/446636167899774986/679381526894477314/logo_edited_twice.png"></a></h1>
				
			</div>
			<div class="w3l_search">
					</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Início</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-houver" data-toggle="dropdown">Lãs<b class="caret"></b></a>
							
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="/category.php?id=0">Lãs bebé</a></li>
											<li><a href="/category.php?id=1">Lãs de algodão</a></li>
											<li><a href="/category.php?id=2">Lãs diversas</a></li>
											<li><a href="/category.php?id=4" >Lãs Arraiolos</a></li>		
										</ul>
									</div>	
									
								</div>
							</ul>
						</li>
						<li class="dropdown">
							<a href="/category.php?id=3">Bordados</a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											
										
										</ul>
									</div>
									
								</div>
							</ul>
						</li>
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Agulhas<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											
											<li><a href="/category.php?id=5">Agulhas de crochet e tricô</a></li>
											<li><a href="/category.php?id=6">Agulhas de coser</a></li>
									
										</ul>
									</div>
									
								
								</div>
							</ul>
						</li>
						<li class="dropdown">
							<a href="/category.php?id=7"> Carteiras</a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
										
										</ul>
									</div>
				
								</div>
							</ul>
						</li>
						<li class="dropdown">
							<a href="/category.php?id=8">Panos</a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											
										
										</ul>
									</div>
				
								</div>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="/category.php?id=9" >Enxoval de bebé </a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
										
										</ul>
									</div>
				
								</div>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Costura<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
									
											<li><a href="/category.php?id=10">Tecidos</a></li>
											<li><a href="/category.php?id=11">Moldes</a></li>
											<li><a href="/category.php?id=12">Linhas</a></li>
										
										</ul>
					</div>
						
					
					</div>
							</ul>
						</li>
						<li class="dropdown">
							<a href="outros.php" >Outros </a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
										
										</ul>
									</div>
				
								</div>
							</ul>
						</li>
					</ul>
				</div>

				</nav>
			</div>
		</div>
		
										