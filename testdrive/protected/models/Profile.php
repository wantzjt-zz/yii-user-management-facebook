<?php

Yii::import('application.modules.profile.models.YumProfile');

class Profile extends YumProfile {

    function rules() {
        $rules = parent::rules();
        $rules[] = array('about', 'required');
        return $rules;
    }

}

?>
