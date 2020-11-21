<?php

namespace frontend\controllers;

use frontend\patterns\behaivior\visitor\Visitor1;
use frontend\patterns\behaivior\visitor\Visitor2;
use frontend\patterns\behaivior\visitor\VisitorComponentComponentA;
use frontend\patterns\behaivior\visitor\VisitorComponentComponentB;
use frontend\patterns\behaivior\visitor\VisitorInterface;
use yii\web\Controller;

/**
 * Site controller
 */
class BehaviorPatternsController extends Controller
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

	/**
	 * @return string
	 */
	public function actionVisitor()
	{
		$components = [
			new VisitorComponentComponentA(),
			new VisitorComponentComponentB(),
		];

		$visitor1 = new Visitor1();
		$visitor1Answers = $this->visitorClientCode($components, $visitor1);


		$visitor2 = new Visitor2();
		$visitor2Answers = $this->visitorClientCode($components, $visitor2);

		return $this->render('visitor', compact('visitor1Answers', 'visitor2Answers'));
	}

	/**
	 * Клиентский код может выполнять операции посетителя над любым набором
	 * элементов, не выясняя их конкретных классов. Операция принятия направляет
	 * вызов к соответствующей операции в объекте посетителя.
	 * @param array $components
	 * @param VisitorInterface $visitor
	 * @return mixed
	 */
	private function visitorClientCode(array $components, VisitorInterface $visitor)
	{
		$answers = [];
		foreach ($components as $component) {
			$answers[] = $component->accept($visitor);
		}
		return $answers;
	}

}
