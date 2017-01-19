<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "sms_admin".
 *
 * @property integer $id
 * @property string $nickname
 * @property string $password
 * @property integer $phone_num
 * @property string $custom_from
 * @property string $health_cons
 * @property string $account_v_level
 */
class SmsAdmin extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_num'],'integer'],
            [['username', 'custom_from','health_cons','account_v_level'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'username',
            'password' => 'Password',
            'phone_num' => 'Phone Num',
            'custom_from' => 'Custom From',
            'health_cons' => 'Health Cons',
            'account_v_level' => 'Account V Level',
        ];
    }

    public static function findByUsername($phone_num) {
        $user = SmsAdmin::find()->where(['phone_num' => $phone_num])->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public function validatePassword($password){
        if(($password) === $this -> password){
            return true;
        }
        return false;
    }

    public static function findIdentity($id) {
        $user = self::findById($id);
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        $user = SmsAdmin::find()->where(array('accessToken' => $token))->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public static function findById($id) {
        $user = SmsAdmin::find()->where(array('id' => $id))->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->authKey;
    }


    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public function getGenderName(){
        $gender = Yii::$app->params['gender'];
        $name = array_key_exists($this->gender,$gender)?$gender[$this->gender]:'';
        return $name;
    }

    public function getPersonList()
    {
        $list = self::findBySql('select DISTINCT name from sms_admin')->all();
        $person_list = [];
        foreach ($list as $k => $v) {
            $key = $v['name'];
            $person_list[$key] = $v['name'] ;
        }
        return $person_list;
    }

}
