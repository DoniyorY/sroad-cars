<?php

namespace common\models;

use common\models\User;
use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $fullname;
    public $role_id;
    public $phone;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'fullname', 'role_id', 'phone', 'password'], 'required'],
            ['phone', 'string', 'max' => 12],
            ['username', 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful
     */
    public function signup()
    {
        $check = User::findByUsername($this->username);
        if ($check) {
            Yii::$app->session->setFlash('warning', 'Такой пользователь уже существует');
            return null;
        }

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->username . '@email.com';
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->role_id = $this->role_id;
        $user->fullname = $this->fullname;
        $user->phone = $this->phone;
        $user->status = 10;

        return $user->save();
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'Эл.почта',
            'status' => 'Статус',
            'phone' => 'Номер телефона',
            'fullname' => 'Ф.И.О',
            'created_at' => 'Дата создания',
            'role_id' => 'Должность',
        ];
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
