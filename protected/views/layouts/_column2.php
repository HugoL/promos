<?php /* @var $this Controller */ ?>
<?php if(YII_RUTAS == true) echo __FILE__; ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<p>Layout column2, carpeta views de PROTECTED</p>
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->widget('UserNavMenu');
		/*$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
		$this->endWidget();*/
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>