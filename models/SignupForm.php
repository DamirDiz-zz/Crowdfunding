<?php

namespace app\models;

use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            ['firstname', 'required'],
            ['firstname', 'string'],

            ['lastname', 'required'],
            ['lastname', 'string'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->email = $this->email;
            $user->generateAuthKey();
            $user->setPassword($this->password);

            $user->created_at = time();
            $user->updated_at = time();
            
            if ($user->save()) {
                return $user;
            } 
        }

        return null;
    }
}
