<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 2017/1/15
 * Time: 上午1:15
 */

namespace backend\controllers;

use app\models\HealthQustionnaire;
Use Yii;
use yii\web\Controller;

class MobilequstionaireController extends Controller
{
    public function actionQustions()
    {
        $request = Yii::$app->request;
        $realname = $request->get('realname');
        $birthday = $request->get('birthday');
        $sex = $request->get('sex');
        $height = $request->get('height');
        $weight = $request->get('weight');
        $BMI = $request->get('BMI');
        $waistline = $request->get('waistline');
        $hipline = $request->get('hipline');
        $taste = $request->get('taste');
        $staple_food = $request->get('staple_food');
        $vegetarian_diet = $request->get('vegetarian_diet');
        $meat_diet = $request->get('meat_diet');
        $omnivorous = $request->get('omnivorous');
        $fruit = $request->get('fruit');
        $water = $request->get('water');
        $dining_env = $request->get('dining_env');
        $sleep_hour = $request->get('sleep_hour');
        $sleep_time = $request->get('sleep_time');
        $sleep_quality = $request->get('sleep_quality');
        $work_hour = $request->get('work_hour');
        $work_env = $request->get('work_env');
        $work_category = $request->get('work_category');
        $work_pressure = $request->get('work_pressure');
        $bad_habit = $request->get('bad_habit');
        $fitness = $request->get('fitness');
        $physical_exam = $request->get('physical_exam');
        $family_illness = $request->get('family_illness');
        $medicine = $request->get('medicine');
        $nutrition = $request->get('nutrition');
        $special_meal = $request->get('special_meal');
        $health_cons = $request->get('health_cons');

        $model = new HealthQustionnaire();
        $model->setAttributes([
            'realname' => $realname,
            'birthday' => $birthday,
            'sex' => $sex,
            'height' => $height,
            'weight' => $weight,
            'BMI' => $BMI,
            'waistline' => $waistline,
            'hipline' => $hipline,
            'taste' => $taste,
            'staple_food' => $staple_food,
            'vegetarian_diet' => $vegetarian_diet,
            'meat_diet' => $meat_diet,
            'omnivorous' => $omnivorous,
            'fruit' => $fruit,
            'water' => $water,
            'dining_env' => $dining_env,
            'sleep_hour' => $sleep_hour,
            'sleep_time' => $sleep_time,
            'sleep_quality' => $sleep_quality,
            'work_hour' => $work_hour,
            'work_env' => $work_env,
            'work_category' => $work_category,
            'work_pressure' => $work_pressure,
            'bad_habit' => $bad_habit,
            'fitness' => $fitness,
            'physical_exam' => $physical_exam,
            'family_illness' => $family_illness,
            'medicine' => $medicine,
            'nutrition' => $nutrition,
            'special_meal' => $special_meal,
            'health_cons' => $health_cons,
        ]);

        if ($model->save()) {
            $itemArray = array(
            'realname' => $realname,
            'birthday' => $birthday,
            'sex' => $sex,
            'height' => $height,
            'weight' => $weight,
            'BMI' => $BMI,
            'waistline' => $waistline,
            'hipline' => $hipline,
            'taste' => $taste,
            'staple_food' => $staple_food,
            'vegetarian_diet' => $vegetarian_diet,
            'meat_diet' => $meat_diet,
            'omnivorous' => $omnivorous,
            'fruit' => $fruit,
            'water' => $water,
            'dining_env' => $dining_env,
            'sleep_hour' => $sleep_hour,
            'sleep_time' => $sleep_time,
            'sleep_quality' => $sleep_quality,
            'work_hour' => $work_hour,
            'work_env' => $work_env,
            'work_category' => $work_category,
            'work_pressure' => $work_pressure,
            'bad_habit' => $bad_habit,
            'fitness' => $fitness,
            'physical_exam' => $physical_exam,
            'family_illness' => $family_illness,
            'medicine' => $medicine,
            'nutrition' => $nutrition,
            'special_meal' => $special_meal,
            'health_cons' => $health_cons,
            );
            $return_info = json_encode(['success'=>'1', 'userinfo'=>$itemArray]);
            $callback = $request->get('callback');
            echo $callback."(".$return_info.")";
            exit;
        } else {
            echo 'error';exit;
        }

    }

}