<?php echo __FILE__; ?>
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");?>

<h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	//'type'=>'horizontal',
	'action'=>'profile/edit',
	'htmlOptions' => array('enctype'=>'multipart/form-data')
));
?>

<fieldset>
	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php if (Yii::app()->authManager->checkAccess('admin', Yii::app()->user->id) ):?>

	<?php echo $form->errorSummary(array($model)); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'superuser'); ?>
			<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
			<?php echo $form->error($model,'superuser'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
	<?php endif; ?>
	
	<?php if (Yii::app()->authManager->checkAccess('empresa', Yii::app()->user->id) ):?>
		
		<div class="fields">
		
			<?php $this->widget('bootstrap.widgets.TbLabel', array(
			    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
			    'label'=>'Profile',
			)); ?>
			<!-- Inicio profile -->
			<div class="row">
				<?php echo $form->labelEx($profile,'username'); ?>
				<?php echo $form->textField($profile,'username',array('size'=>60,'maxlength'=>128)); ?>
				<?php echo $form->error($profile,'username'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($profile,'lastname'); ?>
				<?php echo $form->textField($profile,'lastname',array('size'=>60,'maxlength'=>128)); ?>
				<?php echo $form->error($profile,'lastname'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($profile,'paypal_id'); ?>
				<?php echo $form->textField($profile,'paypal_id',array('size'=>60,'maxlength'=>128)); ?>
				<?php echo $form->error($profile,'paypal_id'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($profile,'tipocuenta'); ?>
				<?php echo $form->textField($profile,'tipocuenta'); ?>
				<?php echo $form->error($profile,'tipocuenta'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($profile,'fecha_activacion'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'attribute'=>'fecha_activacion',
					'model'=>$profile,
					'value'=>$profile->fecha_activacion,
				    // additional javascript options for the date picker plugin
				    'options'=>array(
						'dateFormat'=>'yy-mm-dd',
				        'showAnim'=>'fold',
						'changeMonth'=>'true', 
    					'changeYear'=>'true',
				    	'debug'=>true,
				    ),
				));?>
				<?php echo $form->error($profile,'fecha_activacion'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($profile,'fecha_fin'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'attribute'=>'fecha_fin',
					'model'=>$profile,
					'value'=>$profile->fecha_fin,
				    // additional javascript options for the date picker plugin
				    'options'=>array(
						'dateFormat'=>'yy-mm-dd',
				        'showAnim'=>'fold',
						'changeMonth'=>'true', 
    					'changeYear'=>'true',
					    'debug'=>true,
				    ),
				));?>
				<?php echo $form->error($profile,'fecha_fin'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($profile,'fecha_pago'); ?>
				<?php //echo $form->textField($model->profile,'fecha_pago'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'attribute'=>'fecha_pago',
					'model'=>$profile,
					'value'=>$profile->fecha_pago,
				    // additional javascript options for the date picker plugin
				    'options'=>array(
						'dateFormat'=>'yy-mm-dd',
				        'showAnim'=>'fold',
						'changeMonth'=>'true', 
    					'changeYear'=>'true',
				    ),
				));?>
				<?php echo $form->error($profile,'fecha_pago'); ?>
			</div>
		</div> 
	<?php endif;?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>
 
</fieldset>

<?php $this->endWidget(); ?>	