<?php

namespace backend\controllers;

use yii\base\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class FilterRoleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'error','report', 'index', 'create','update','view', 'delete', 'signup', 'update-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

}