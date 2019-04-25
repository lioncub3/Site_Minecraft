<?php

namespace app\services;

use app\models\SignupForm;
use app\models\User;
use Yii;

class SignupService
{
    public function signup(SignupForm $form)
    {
        if (!$form->validate()) {
            return null;
        }

        $user = new \app\models\User();
        $user->username = $form->username;
        $user->email = $form->email;
        $user->password = md5($form->password);
        $user->email_confirm_token = Yii::$app->security->generateRandomString();
        $user->status = $user::STATUS_WAIT;

        if(!$user->save()){
            throw new \RuntimeException('Saving error.');
        }

        return $user;
    }

    public function sentEmailConfirm(User $user)
    {
        $email = $user->email;

        $sent = Yii::$app->mailer
            ->compose(
                ['html' => 'user-signup-comfirm-html', 'text' => 'user-signup-comfirm-text'],
                ['user' => $user])
            ->setTo($email)
            ->setFrom("leonid2000.11.11@gmail.com")
            ->setSubject('Confirmation of registration')
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

    public function confirmation($token)
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }

        $user = User::findOne(['email_confirm_token' => $token]);
        if (!$user) {
            throw new \DomainException('User is not found.');
        }

        $user->email_confirm_token = null;
        $user->status = User::STATUS_ACTIVE;
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

        if (!Yii::$app->getUser()->login($user)){
            throw new \RuntimeException('Error authentication.');
        }
    }
}