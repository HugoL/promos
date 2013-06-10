<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<link media="screen" rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->theme->baseUrl; ?>/css/main.css"  />
    <link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css"> -->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
	
</head>

<body>

<div class="container" id="page">
	
	<?php echo __FILE__; ?>
	<!-- Para debugear como en cake -->
	<?php if(!empty(Yii::app()->params['debugContent'])):?>
                <?php echo Yii::app()->params['debugContent'];?>
	<?php endif;?>
	<?php if(Yii::app()->user->hasFlash('success')):?>
		<div class="flash-notice">
			<?php $this->widget('bootstrap.widgets.TbAlert', array(
		        /*'block'=>true, // display a larger alert block?
		        'fade'=>true, // use transitions?
		        'closeText'=>true,*/ // close link text - if set to false, no close link is displayed
		        'alerts'=>array( // configurations per alert type
		            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>true), // success, info, warning, error or danger
		            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>true), // success, info, warning, error or danger
		        ),
		    )); ?>
		</div>
	<?php endif?>
	<?php /*if(Yii::app()->user->hasFlash('error')):?>
		<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('error')?>
	</div>
	<?php endif */?>
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
