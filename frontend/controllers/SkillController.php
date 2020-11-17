<?php

namespace frontend\controllers;

use frontend\models\Page;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * SkillController implements the CRUD actions for Skill model.
 */
class SkillController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Skill models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		return $this->render('index', [
			'dataProvider' => Yii::$app->page->all($this),
		]);
	}

	/**
	 * Displays a single Skill model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => Yii::$app->page->one($this, ['id' => $id]),
		]);
	}

	/**
	 * Creates a new Skill model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Page();
		$model->context_id = $this->id;
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Skill model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = Yii::$app->page->one($this, ['id' => $id]);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Skill model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		Yii::$app->page->one($this, ['id' => $id])->delete();

		return $this->redirect(['index']);
	}
}
