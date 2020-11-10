<?php

namespace frontend\controllers;

use frontend\components\pageMapping\PageMapperTrait;
use yii\web\Controller;

/**
 * Site controller
 */
class SkillController extends Controller
{
	use PageMapperTrait;

	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return array_merge($this->getMappedPages(), [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		]);
	}

	public function actionIndex()
	{
		return $this->render('index', ['pageList' => $this->getMappedPages()]);
	}


}
