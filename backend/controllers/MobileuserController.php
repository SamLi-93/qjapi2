<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 2017/1/14
 * Time: 下午9:14
 */

namespace backend\controllers;

use app\models\SmsAdmin;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use frontend\models\SignupForm;

class MobileuserController extends Controller
{

    public function actionRegister()
    {
        $request = Yii::$app->request;
        $phone_num = $request->get('phone_num');
        $password = $request->get('password');
        $username = $request->get('username');
        $custom_from = $request->get('custom_from');
        $health_cons = $request->get('health_cons');
        $account_v_level = $request->get('account_v_level');

        $model = new SmsAdmin();
        $model->setAttributes([
            'phone_num' => $phone_num,
            'password' => md5($password),
            'username' => $username,
            'custom_from' => $custom_from,
            'health_cons' => $health_cons,
            'account_v_level' => $account_v_level,
        ]);

        if ($model->save()) {
            $itemArray = array(
                'phone_num' => $phone_num,
                'username' => $username,
                'health_cons' => $health_cons,
                'account_v_level' => $account_v_level,
            );
            $return_info = json_encode(['success' => '1', 'userinfo' => $itemArray]);
            $callback = $request->get('callback');
            echo $callback . "(" . $return_info . ")";
            exit;
        } else {
            echo 'error';
            exit;
        }

    }

    public function actionLogin()
    {
        $request = Yii::$app->request;
        $data['LoginForm']['phone_num'] = $request->get('phone_num');
        $data['LoginForm']['password'] = $request->get('password');
        $model = new LoginForm();
//        var_dump($model->login());exit;
        $model = new LoginForm();
        if ($model->load($data) && $model->login()) {
            $logined = 1;
            $errormessage = '成功登陆';
            $userinfo = array(
                'id'=>Yii::$app->user->identity->id,
//                'phone_num'=>Yii::$app->user->identity->phone_num,
//                'nickname'=>Yii::$app->user->identity->nickname,
                'loginTime'=>time(),
                "LoginStatus"=>1
            );
            $itemArray = array(
                'message' => $errormessage,
                'logined' => $logined,
                'userinfo' => $userinfo
            );
            $return_info = json_encode(array('responseData'=>$itemArray));
            $callback = $request->get('callback');
            echo $callback."(".$return_info.")";
            exit;
        } else {
            $errormessage = '对不起，登陆失败。';
            $itemArray = array(
                'message' => $errormessage,
                'logined' => 0,
                'userinfo' => []
            );
            $return_info = json_encode(array('responseData'=>$itemArray));
            $callback = $request->get('callback');
            echo $callback."(".$return_info.")";
            exit;
        }
        die;
    }
}