
<h1><?php echo  UserModule::t('Update User')." ".$model->username; ?></h1>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'action'=>'admin/update','profile'=>$profile,'empresa'=>$empresa,'categorias'=>$categorias,'esEmpresa'=>$esEmpresa,'cuentas'=>$cuentas,'contacto'=>$contacto,'myValue'=>$myValue));
?>

