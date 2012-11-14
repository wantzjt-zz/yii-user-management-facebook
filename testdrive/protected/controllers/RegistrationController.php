<?php

Yii::import('application.modules.registration.controllers.YumRegistrationController');

class RegistrationController extends YumRegistrationController {

    public function actionRegistration() {
        Yii::import('application.modules.profile.models.*');
        $profile = new YumProfile;

        if (isset($_POST['Profile'])) {
            $profile->attributes = $_POST['YumProfile'];

            if ($profile->save())
                $user = new YumUser;
            $password = YumUser::generatePassword();
// we generate a dummy username here, since yum requires one
            $user->register(md5($profile->email), $password, $profile);

            $this->sendRegistrationEmail($user, $password);
            Yum::setFlash('Thank you for your registration. Please check your email.');
            $this->redirect(Yum::module()->loginUrl);
        }
        
        $this->render('/registration/registration', array(
            'profile' => $profile,
                )
        );
    }

    public function sendRegistrationEmail($user, $password) {
        if (!isset($user->profile->email)) {
            throw new CException(Yum::t('Email is not set when trying to send Registration Email'));
        }
        $activation_url = $user->getActivationUrl();

        if (is_object($content)) {
            $body = strtr('Hi, {email}, your new password is {password}. Please activate your account by clicking this link: {activation_url}', array(
                '{email}' => $user->profile->email,
                '{password}' => $password,
                '{activation_url}' => $activation_url));

            $mail = array(
                'from' => Yum::module('registration')->registrationEmail,
                'to' => $user->profile->email,
                'subject' => 'Your registration on my example Website',
                'body' => $body,
            );
            $sent = YumMailer::send($mail);
        }

        return $sent;
    }
}
?>
