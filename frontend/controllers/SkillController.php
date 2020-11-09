<?php

namespace frontend\controllers;

use frontend\components\pageMapping\PageMapperTrait;
use yii\web\Controller;

/**
 * Site controller
 */
class SkillController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionDoubleDispatch()
	{
		return $this->render('doubleDispatch');
	}

	public function actionLateDynamicBinding()
	{
		return $this->render('lateDynamicBinding');
	}

	public function actionEarlyStaticBinding()
	{
		return $this->render('earlyStaticBinding');
	}
}
