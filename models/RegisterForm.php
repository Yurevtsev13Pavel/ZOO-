<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $surname;
    public $password;
    public $email;
    public $password_repeat;
    public $rememberMe = true;




    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'surname', 'email'], 'required'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password_repeat', 'compare', 'compareAttribute'=>'password'],
        ];
    }

    public function register()
    {
        if (! $this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);

        return $user->save() ? $user:null;
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'email' => Yii::t('app', 'Почта'),
            'password' => Yii::t('app', 'Пароль'),
            'password_repeat' => Yii::t('app', 'Повтор пароля'),
        ];
    }

}
