<div class="row-fluid print-show">
	<div class="span12">
		Alternate header for print version
	</div>
</div>

<!--<div class="row-fluid print-hide">
<div class="span3">
<img src="img/logo.png" alt="Logo">
</div>
<div class="span5">
<img src="img/banner_top.jpg" alt="No shipping">
</div>
</div>-->

<div class="row-fluid print-hide">
<div class="span12">
</div>
</div>

<div class="row-fluid">
<div class="span12">

<? //$this->debug($model->attributes);?>
<div class="row-fluid">
	<div class="span9">
		<h2><?=$model->titulo ?></h2>
	</div>
	<div class="span3">
		<div class="social-icons pull-right">		
			<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:30px;" allowTransparency="true"></iframe>
			<p><a href="http://twitter.com/home?status=<?php echo urlencode("¡No te pierdas esta promoción! http://www.proemocion.com/promocion/$model->titulo_slug");?>" target="_blank" class="twitter-share-button"><img src="<?php echo Yii::app()->theme->baseUrl?>/img/tweet-button.png" /></a><p/>
			<!-- Replace with something like:
			<div class="fb-like fb_edge_widget_with_comment fb_iframe_widget" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false" data-font="arial">
				<span style="height: 20px; width: 107px; ">
					<iframe id="f36680bf28" name="f1bd6447bc" scrolling="no" style="border: none; overflow: hidden; height: 20px; width: 107px; " title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php"></iframe>
				</span>
			</div>
			-->
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12 rating">
		Valoración: 
		<?php
		$this->widget('CStarRating',array(
			'name'=>$model->id,
			'value'=>'3',
			'minRating'=>1,
			'maxRating'=>5,
			'starCount'=>5,
			'cssFile'=>'cdestilos.css',
			'readOnly'=>true,
		));
		?>

	</div>
</div>

<div class="row-fluid product-detail">

	<div class="span4">
		<?php if (isset($model->item)): ?>
			<?php $path=$model->item->path ?>
		<?php else:?>
			<?php $path=Yii::app()->params['no_image'] ?>
		<?php endif; ?>
		<a class="product-detail-lightbox colorbox hidden-phone" rel="colorbox1" href="<?php echo Yii::app()->request->baseUrl.$path ?>" title="<?=$model->titulo?>">
				<img class="product-image" alt="Product A" src="<?php echo Yii::app()->request->baseUrl.$path ?>">
		</a>
	</div>

	<!--<div class="span1">
		<ul class="thumbnails main-product">
			<li class="span12 visible-phone">
				<a rel="colorbox1" href="img/product_01.jpg" class="colorbox thumbnail">
					<img alt="Product A 2" src="img/product_01.jpg" />
				</a>
			</li>
			<li class="span12">
				<a rel="colorbox1" href="img/product_01b.jpg" class="colorbox thumbnail">
					<img alt="Product A 2" src="img/product_01b.jpg" />
				</a>
			</li>
			<li class="span12">
				<a rel="colorbox1" href="img/product_02.jpg" class="colorbox thumbnail">
					<img alt="Product B 1" src="img/product_02.jpg" />
				</a>
			</li>
			<li class="span12">
				<a rel="colorbox1" href="img/product_02b.jpg" class="colorbox thumbnail">
					<img alt="Product B 2" src="img/product_02b.jpg" />
				</a>
			</li>
		</ul>
	</div>-->

	<div class="span7 well">

		<div class="row-fluid">

			<div class="span7">
				<h3><?=$model->titulo ?></h3>
			</div>

			<div class="span5">
				<span class="label label-important price">&euro; <?=$model->precio ?></span>
			</div>

		</div>

		<div class="row-fluid">
			<div class="span12">
				<br>
				<h4>Descripción</h4>
				<p><?=$model->descripcion ?></p>
				<hr>
			</div>
		</div>

		<div class="row-fluid">

			<div class="span3">
				<!--<button class="btn"><i class="icon-chevron-left"></i> <a href="/page2">Continue</a></button>-->
				<?php $this->widget('bootstrap.widgets.TbButton', array(
				    'label'=>'Volver',
				    'htmlOptions'   => array('class'=>'btn'),
				    'icon'=>'chevron-left',
				    'type'=>null, // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				    'size'=>'large', // null, 'large', 'small' or 'mini'
				    'url'=>Yii::app()->user->returnUrl,
				)); ?>
			</div>

			<div class="span9" align="right">
				<?php
				//Comprobar que es usuario registrado. Sino, no se muestra el botón de comprar
				if(UserModule::isBuyer()):
				 ?>
					<form name="_xclick" action="https://www.paypal.com/es/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="<?php echo $datos->paypal_id; ?>">
						<input type="hidden" name="currency_code" value="EUR">
						<input type="hidden" name="item_name" value="<?=$model->titulo ?>">
						<input type="hidden" name="amount" value="<?=$model->precio ?>">
						<input type="hidden" name="custom" value="<?=Yii::app()->user->id ?>_<?=$model->id; ?>" />
						<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="Realice pagos con PayPal: es rápido, gratis y seguro">
					</form>	
				<?php else: ?>
						<div class="alert alert-info"><h4>Para poder comprar una promoción debes estar registrado como usuario.</h4></div>
						<div>
						<p><?php echo CHtml::link('Regístrate', Yii::app()->getModule('user')->registrationUrl); ?> si todavía no eres usuario o <?php echo CHtml::link('accede', Yii::app()->getModule('user')->profileUrl); ?> si ya eres usuario registrado</p></div>
				<?php endif; ?>			
				</div>
			</div>
		</div>
	</div>

</div>

<div class="row-fluid">
	<div class="span12">

		<div class="tabbable">

			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">Otras promociones</a></li>
			</ul>

			<div class="tab-content">

				<div class="tab-pane active" id="tab1">
					<ul class="thumbnails product-list-inline-small">
						<?php foreach ($promos as $key => $promo):

							if (isset($promo->item)): 
								$path=$promo->item->path; 
						 	else:
								$path=Yii::app()->params['no_image'];
							endif;
						?>
						<li class="span2">
							<div class="thumbnail light">
							<a href="<?=$promo->titulo_slug ?>">
								<span class="label label-info price">&euro; <? echo $promo->precio ?></span>
								<!--<span class="label label-important price price-over">&euro; 1,<sup>99</sup></span>-->
								<?php if (isset($promo->item)): ?>
									<img data-hover="<?php echo Yii::app()->request->baseUrl.$promo->item->path ?>" src="$promo->item->path" alt="<?php echo $promo->titulo ?>"  src="<?php echo Yii::app()->request->baseUrl.$path ?>">
								<?php else: ?>
									<img data-hover="<?php echo Yii::app()->params['no_image']; ?>"  alt="<?php echo $promo->titulo ?>" src="<?php echo Yii::app()->request->baseUrl.$path ?>">
								<?php endif; ?>
								</a>
								<div class="caption">
									<a href="<? echo $promo->titulo_slug ?>"><?php echo $promo->titulo ?><a href="<?=$promo->titulo_slug ?>" class="btn btn-block">Más información</a>
								</div>
							</div>
						</li>							
				<?php endforeach; ?>
				</ul>
				</div>

			</div>
		</div>
	</div>
</div>



</div>
</div>
<!--<div class="footer">

<div class="row-fluid print-hide">

<div class="span2">
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 1</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
	</ul>
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 2</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
		<li><a href="#">Product D</a></li>
		<li><a href="#">Short E</a></li>
	</ul>
</div>

<div class="span2">
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 3</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
		<li><a href="#">Product D</a></li>
	</ul>
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 4</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
	</ul>
</div>

<div class="span2">
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 5</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
	</ul>
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 6</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
		<li><a href="#">Product D</a></li>
	</ul>
</div>

<div class="span2">
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 7</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
		<li><a href="#">Product D</a></li>
		<li><a href="#">Short E</a></li>
	</ul>
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 8</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
		<li><a href="#">Product D</a></li>
		<li><a href="#">Short E</a></li>
	</ul>
</div>

<div class="span2">
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 9</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
		<li><a href="#">Product D</a></li>
		<li><a href="#">Short E</a></li>
	</ul>
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 10</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
		<li><a href="#">Product D</a></li>
	</ul>
</div>

<div class="span2">
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 11</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
	</ul>
	<ul class="unstyled">
		<li class="footer-title"><a href="#">Category 12</a></li>
		<li><a href="#">Product item A</a></li>
		<li><a href="#">Product B</a></li>
		<li><a href="#">Large product C</a></li>
	</ul>
</div>

</div>

<div class="row-fluid print-show">
<div class="span12">
	Alternate footer for print version
</div>
</div>

</div>-->