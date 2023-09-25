<?php  

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Nevs;
use yii\data\ActiveDataProvider;



class NevsController extends Controller
{

	public function actionDetail($id){

		$nevs = Nevs::findOne($id);
		
		if ($nevs) {
			$nevs->updateCounters(['views_count' => 1]);

		return $this->render('detail',[
			'nevs' => $nevs
		]);
		}
		else{
			echo '<h2 style="color:   rgb(51, 204, 255); text-align:center; font-size: 50px; margin-top: 250px">403</h2>
            <h1 style="color: red; text-align:center; font-size: 50px; padding: px">Forbidden</h1>';
		}
		
	}

	
	public function actionIndex()
	{
		$query = Nevs::find();

		$nevs->updateCounters(['views_count' => 1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index');
	}

		public function actionVideo($id)
	{
		$nevs = Nevs::findOne($id);

		if ($nevs) {
			$nevs->updateCounters(['views_count' => 1]);

		return $this->render('video',[
			'nevs' => $nevs
		]);
		}
		else{
			echo '<h2 style="color:   rgb(51, 204, 255); text-align:center; font-size: 50px; margin-top: 250px">403</h2>
            <h1 style="color: red; text-align:center; font-size: 50px; padding: px">Forbidden</h1>';
		}
	}

}


?>