<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "health_qustionnaire".
 *
 * @property integer $id
 * @property string $realname
 * @property string $birthday
 * @property integer $sex
 * @property integer $height
 * @property integer $weight
 * @property integer $BMI
 * @property integer $waistline
 * @property integer $hipline
 * @property integer $WHR
 * @property integer $taste
 * @property integer $staple_food
 * @property integer $vegetarian_diet
 * @property integer $meat_diet
 * @property integer $omnivorous
 * @property integer $fruit
 * @property integer $water
 * @property integer $dining_env
 * @property integer $sleep_hour
 * @property integer $sleep_time
 * @property integer $sleep_quality
 * @property integer $work_hour
 * @property integer $work_env
 * @property integer $work_category
 * @property integer $work_pressure
 * @property integer $bad_habit
 * @property integer $fitness
 * @property integer $physical_exam
 * @property integer $family_illness
 * @property integer $medicine
 * @property integer $nutrition
 * @property integer $special_meal
 * @property integer $health_cons
 */
class HealthQustionnaire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'health_qustionnaire';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['realname', 'birthday', 'sex', 'height', 'weight', 'BMI', 'waistline', 'hipline', 'WHR', 'taste', 'staple_food', 'vegetarian_diet', 'meat_diet', 'omnivorous', 'fruit', 'water', 'dining_env', 'sleep_hour', 'sleep_time', 'sleep_quality', 'work_hour', 'work_env', 'work_category', 'work_pressure', 'bad_habit', 'fitness', 'physical_exam', 'family_illness', 'medicine', 'nutrition', 'special_meal', 'health_cons'], 'required'],
            [['birthday'], 'safe'],
            [['sex', 'height', 'weight', 'BMI', 'waistline', 'hipline', 'WHR', 'taste', 'staple_food', 'vegetarian_diet', 'meat_diet', 'omnivorous', 'fruit', 'water', 'dining_env', 'sleep_hour', 'sleep_time', 'sleep_quality', 'work_hour', 'work_env', 'work_category', 'work_pressure', 'bad_habit', 'fitness', 'physical_exam', 'family_illness', 'medicine', 'nutrition', 'special_meal', 'health_cons'], 'integer'],
            [['realname'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'realname' => 'Realname',
            'birthday' => 'Birthday',
            'sex' => 'Sex',
            'height' => 'Height',
            'weight' => 'Weight',
            'BMI' => 'Bmi',
            'waistline' => 'Waistline',
            'hipline' => 'Hipline',
            'WHR' => 'Whr',
            'taste' => 'Taste',
            'staple_food' => 'Staple Food',
            'vegetarian_diet' => 'Vegetarian Diet',
            'meat_diet' => 'Meat Diet',
            'omnivorous' => 'Omnivorous',
            'fruit' => 'Fruit',
            'water' => 'Water',
            'dining_env' => 'Dining Env',
            'sleep_hour' => 'Sleep Hour',
            'sleep_time' => 'Sleep Time',
            'sleep_quality' => 'Sleep Quality',
            'work_hour' => 'Work Hour',
            'work_env' => 'Work Env',
            'work_category' => 'Work Category',
            'work_pressure' => 'Work Pressure',
            'bad_habit' => 'Bad Habit',
            'fitness' => 'Fitness',
            'physical_exam' => 'Physical Exam',
            'family_illness' => 'Family Illness',
            'medicine' => 'Medicine',
            'nutrition' => 'Nutrition',
            'special_meal' => 'Special Meal',
            'health_cons' => 'Health Cons',
        ];
    }
}
