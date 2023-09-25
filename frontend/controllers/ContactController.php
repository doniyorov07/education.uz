<?php 

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Contact;
use yii\data\ActiveDataProvider;


class ContactController extends Controller
{

	
	public function actionIndex()
	{
		$query = Contact::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index');
	}


}


?>