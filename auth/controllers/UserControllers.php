<?php

namespace controllers;

use yii\rest\ActiveController;

class UserControllers extends ActiveController
{
    public $modelClass = 'common\models\user';
}