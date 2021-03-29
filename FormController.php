<?php 

namespace app\controllers;

use Yii;
use app\models\Pessoas;
use app\models\CadastroModel;
use yii\web\Controller;
use yii\data\Pagination;

class FormController extends Controller
{
	public function actionFormulario()
	{
		$cadastroModel = new CadastroModel;
		$post = Yii::$app->request->post();

		if($cadastroModel->load($post) && $cadastroModel->validate()) {

			return $this->render('formulario-confirmacao', [
			'model' => $cadastroModel
			]);

		}else{

			return $this->render('formulario', [
			'model' => $cadastroModel
			]);

		}


	}

	public function actionPessoas()
	{

		$query = Pessoas::find();

		$pagination = new Pagination([
			'defaultPageSize' => 1,
			'totalCount' => $query->count()


		]);

		$pessoas = $query->orderBy('nome')
						 ->offset($pagination->offset)
						 ->limit($pagination->limit)
						 ->all();

			return $this->render('pessoas' , [
				'pessoas' => $pessoas,
				'pagination' => $pagination



			]);

		/*$pessoa = Pessoas::find()->orderBy('nome')=>all();
		echo '<pre>'; prnt_r($pessoa);
		
		$pessoa = Pessoas::findOne(1);
		echo $pessoa->nome , ' - ' , $pessoa->cidade;
		
		/*$pessoa = Pessoas::findOne(1);
		$pessoa ->nome = 'Ferdinicio Fernandes Bezerra';
		$pessoa->save();


		echo $pessoa->nome;
 		*/



	}
}
?>