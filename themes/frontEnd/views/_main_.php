<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="nl"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="nl"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="nl"><![endif]-->
<!--[if IE]><html class="no-js ie" lang="nl"><![endif]-->
<!--[if !IE]><!--><html class="no-js" lang="nl"><!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/favicon.ico">
		<meta name="description" content="Promociones Zaragoza">
		<meta name="author" content="BigBase - D. Tiems">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=McLaren">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/css/style.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/css/nivo-slider.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/nivo-themes/bar/bar.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/nivo-themes/light/light.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/bootstrap/css/bootstrap-responsive.min.css">
		<!-- Personalizacion CierzoDevs -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/css/cdestilos.css">
		<!-- --------------- -->
		<script src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/js/config.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/js/modernizr-2.6.2.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/js/jquery-1.8.1.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/js/jquery.nivo.slider.pack.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/js/respond.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/js/script.js"></script>

	</head>

	<body>

		<!-- Facebook div for like button -->
		<div id="fb-root"></div>

		<!-- Div for shade line -->
		<div class="header-shadow"></div>

		<!-- Use class "container-fluid" on the following div for making complete website fluid -->
		<div class="container">

			<div class="row-fluid print-show">
				<div class="span12">
					Proemoción - Tu web de promociones
				</div>
			</div>

			<div class="row-fluid print-hide">
				<div class="span4">
					<div class="header-action">

					</div>
				</div>
				<div class="span8">
					<div class="navbar pull-right header-nav" id="superior">
						<ul class="nav">
							<li class="dropdown">
								<?php echo cHtml::link('Login',Yii::app()->getModule('user')->loginUrl);?>								
								<ul class="dropdown-menu">
									<li>
										<div class="dropdown-content">
											<br>
											<form>
												<input type="text" class="input-medium" placeholder="Username"><br>
												<input type="password" class="input-medium" placeholder="Password"><br>
												<button class="btn">reset</button>
												<button class="btn btn-primary">login</button>
											</form> 
											<br>
										</div>
									</li>
								</ul>
							</li>
							<li>
								<?php echo cHtml::link('Nueva Empresa',Yii::app()->getModule('user')->registrationCompanyUrl);?>	
							</li>
							<li>
								<?php echo cHtml::link('Nuevo Comprador',Yii::app()->getModule('user')->registrationUrl);?>	
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row-fluid print-hide">
				<div class="span6 logo">
					<img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/logo.png" alt="Logo">
				</div>
					
				<br>
				<div class="span6">
					<img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/banner_top.jpg" alt="No shipping">
				</div>
			</div>

			<div class="row-fluid print-hide">
				<div class="span12">
					<div class="navbar main-nav">
						<div class="navbar-inner">
							<div class="container">
								<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">menu</a>
								<div class="nav-collapse">
									<ul class="nav">
										<li class="active"><a href="index.html"><i class="icon-home"></i></a></li>
										<li class="divider-vertical"></li>
										<li><a href="category.html">Categorías</a></li>
										<li><a href="products.html">Empresas</a></li>										
									</ul>										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
			<div class="row-fluid">
				<div class="span12">
					<div class="slider-wrapper theme-bar">
						<div class="ribbon"></div>
						<div id="slider1" class="nivoslider">
							<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/header_01.jpg" alt="ProEmocion"></a>
							<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/header_02.jpg" alt="" title="Aprovéchate de las últimas ofertas"></a>
							<img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/header_03.jpg" alt="" title="">
						</div>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<div class="row-fluid">
						<div class="span9">
							<h2>Destacados</h2>
						</div>
						<div class="span3">
							<div class="social-icons pull-right">
								<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/icon-facebook.png" alt="facebook"></a>
								<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/icon-twitter.png" alt="twitter"></a>
								<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/icon-linkedin.png" alt="linkedin"></a>
								<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/icon-rss.png" alt="rss"></a>
							</div>
						</div>
					</div>	
				</div>
			</div>				

			<div class="row-fluid">
				<div class="span12">
					<ul class="thumbnails product-list-inline-small">
						<li class="span4">
							<div class="thumbnail">
								<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_01.jpg" alt=""></a>
								<div class="caption">
									<a href="#">Product A</a>
										<p>Lorem ipsum dolor sit amet <span class="label label-info price pull-right">&euro; 123,-</span></p>
								</div>
							</div>
						</li>
						<li class="span4">
							<div class="thumbnail">
								<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_02.jpg" alt=""></a>
								<div class="caption">
									<a href="#">Product B</a>
									<p>Lorem ipsum dolor sit amet <span class="label label-info price pull-right">&euro; 123,-</span></p>
								</div>
							</div>
						</li>
						<li class="span4">
							<div class="thumbnail">
								<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_03.jpg" alt=""></a>
								<div class="caption">
									<a href="#">Product C</a>
									<p>Lorem ipsum dolor sit amet <span class="label label-important price pull-right">&euro; 123,-</span></p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<hr />

			<div class="row-fluid">
				<div class="span12">
					<ul class="thumbnails product-list-inline-large">
						<li class="span3">
							<div class="thumbnail light">
								<a href="#">
									<span class="label label-info price">&euro; 2,<sup>99</sup></span>
									<span class="label label-important price price-over">&euro; 1,<sup>99</sup></span>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_04b.jpg" src="img/product_04.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product A</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail dark">
								<a href="#">
									<div class="label label-info price">&euro; 93,<sup>99</sup></div>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_05b.jpg" src="img/product_05.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product B</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail light">
								<a href="#">
									<div class="label label-info price">&euro; 1023,<sup>99</sup></div>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_06b.jpg" src="img/product_06.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product C</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail dark">
								<a href="#">
									<div class="label label-info price">&euro; 123,<sup>99</sup></div>
									<span class="label label-important price price-over">&euro; 122,<sup>99</sup></span>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_07b.jpg" src="img/product_07.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product D</a>
								</div>
								<a href="#" class="btn btn-block">Todos los productos de la categoría</a>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<ul class="thumbnails product-list-inline-large">
						<li class="span3">
							<div class="thumbnail dark">
								<a href="#">
									<span class="label label-info price">&euro; 2,<sup>99</sup></span>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_08b.jpg" src="img/product_08.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product A</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail light">
								<a href="#">
									<div class="label label-info price">&euro; 93,<sup>99</sup></div>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_09b.jpg" src="img/product_09.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product B</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail dark">
								<a href="#">
									<div class="label label-info price">&euro; 1023,<sup>99</sup></div>
									<span class="label label-important price price-over">&euro; 999,<sup>99</sup></span>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_10b.jpg" src="img/product_10.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product C</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail light">
								<a href="#">
									<div class="label label-info price">&euro; 123,<sup>99</sup></div>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_11b.jpg" src="img/product_11.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product D</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<ul class="thumbnails product-list-inline-large">
						<li class="span3">
							<div class="thumbnail light">
								<a href="#">
									<span class="label label-info price">&euro; 2,<sup>99</sup></span>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_12b.jpg" src="img/product_12.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product A</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail dark">
								<a href="#">
									<div class="label label-info price">&euro; 93,<sup>99</sup></div>
									<span class="label label-important price price-over">&euro; 89,<sup>99</sup></span>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_13b.jpg" src="img/product_13.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product B</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail light">
								<a href="#">
									<div class="label label-info price">&euro; 1023,<sup>99</sup></div>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_14b.jpg" src="img/product_14.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product C</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail dark">
								<a href="#">
									<div class="label label-info price">&euro; 123,<sup>99</sup></div>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.'/themes/frontEnd'; ?>/img/product_15b.jpg" src="img/product_15.jpg" alt="">
								</a>
								<div class="caption">
									<a href="#">Product D</a>
								</div>
								<a href="#" class="btn btn-block">all products in category</a>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12 well well-small">
						&copy; <script>document.write(new Date().getFullYear());</script> - All taxes are excluded - shipping costs depends on location - <a href="#">more info <i class="icon-chevron-right"></i></a>
				</div>
			</div>

		</div>
		<div class="footer">
				<p align="center"> ProEmoción - Tu web de promociones  ss |    contacto: 976 XXX XXX </p>
		</div>
	</body>

</html>
