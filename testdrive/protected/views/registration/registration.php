<h2> My Registration Page </h2>
 
<p> Hi there, please enter your E-Mail address and drop a note about you </p>
 
<?php $this->breadcrumbs = array(Yum::t('Registration')); ?>
 
<div class="form">
<?php $activeform = $this->beginWidget('CActiveForm', array(
            'id'=>'registration-form',
            'enableAjaxValidation'=>false,
            'focus'=>array($profile,'email'),
            ));
?>
 
<?php echo Yum::requiredFieldNote(); ?>
<?php echo CHtml::errorSummary($profile); ?>
 
<div class="row"> <?php
echo $activeform->labelEx($profile,'email');
echo $activeform->textField($profile,'email');
?> </div>  
 
 
<div class="row"> <?php
echo $activeform->labelEx($profile,'about');
echo $activeform->textArea($profile,'about');
?> </div>  
 
<div class="row submit">
    <?php echo CHtml::submitButton(Yum::t('Registration')); ?>
</div>
 
<?php $this->endWidget(); ?>