<?php
$this->breadcrumbs = array(
    Yum::t('Users') => array('index'),
    Yum::t('Create'));
?>
<h1><?php echo Yum::t('Create User'); ?></h1>
<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'passwordform' => $passwordform,
    'profile' => isset($profile) ? $profile : null));
?>
