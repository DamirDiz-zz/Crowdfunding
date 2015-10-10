<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\base\Model;


use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $firstname;
    public $lastname;
    public $organisationName;
    public $email;
    public $password;
    public $avatarImage;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            ['firstname', 'required'],
            ['firstname', 'string'],
            
            ['avatarImage', 'string',],

            ['lastname', 'required'],
            ['lastname', 'string'],

            ['organisationName', 'string'],

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
            $user->organisationName = $this->organisationName;
            $user->email = $this->email;
            $user->generateAuthKey();
            $user->setPassword($this->password);

            $user->avatarImageFile = UploadedFile::getInstance($this,'avatarImage');
         
            if($user->avatarImageFile) {
                $name = $user->avatarImageFile->baseName . '.' . $user->avatarImageFile->extension;
                $user->avatarImageFile->saveAs('uploads/' . $name);  
                $user->avatarImage = $name;
            } 
            
            $user->created_at = time();
            $user->updated_at = time();
            
            if ($user->save()) {
                return $user;
            } 
        }

        return null;
    }
}
