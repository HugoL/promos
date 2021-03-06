<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'create_at'); ?>
        <?php //echo $form->textField($model,'create_at'); ?>
        <?php /*$this->widget('zii.widgets.jui.CJuiDatePicker',array(
						    'attribute'=>'create_at',
							'model'=>$model,
							/*'value'=>'create_at',
		  					'name' => $model->create_at,*/
						    // additional javascript options for the date picker plugin
						//));?>
         <?php echo $form->datepickerRow($model, 'create_at',
            array('prepend'=>'<i class="icon-calendar"></i>')); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'lastvisit_at'); ?>
        <?php //echo $form->textField($model,'lastvisit_at'); ?>
        <?php /*$this->widget('zii.widgets.jui.CJuiDatepicker', 
				array(
					'model'=>$model, 
					'attribute'=>'lastvisit_at', 
					//'htmlOptions' => array('id' => 'create_at_search'), 
					));*/?>
        <?php echo $form->datepickerRow($model, 'lastvisit_at',
            array('prepend'=>'<i class="icon-calendar"></i>')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'superuser'); ?>
        <?php echo $form->dropDownList($model,'superuser',$model->itemAlias('AdminStatus')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(UserModule::t('Search')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->