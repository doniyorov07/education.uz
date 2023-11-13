<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
class FilterRoleController extends Controller
{
    public function actionError()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        return $this->render('error');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['error', 'login'], // 'login' actionni except ro'yxatiga qo'shing
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['login'], // 'login' actionni allow ro'yxatiga qo'shing
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'report', 'change', 'change-user', 'index', 'create', 'update', 'view', 'delete', 'signup', 'update-password'],
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


    public function actionAdminActions()
    {
        if (Yii::$app->user->identity->role === 'admin') {
            return $this->render('admin-actions');
        }
    }
}