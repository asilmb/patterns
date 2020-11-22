<?php

namespace frontend\controllers;

use frontend\patterns\behavior\state\ConcreteStateA;
use frontend\patterns\behavior\state\Context;
use frontend\patterns\behavior\visitor\Visitor1;
use frontend\patterns\behavior\visitor\Visitor2;
use frontend\patterns\behavior\visitor\VisitorComponentA;
use frontend\patterns\behavior\visitor\VisitorComponentB;
use frontend\patterns\behavior\visitor\VisitorInterface;
use yii\web\Controller;

/**
 * Site controller
 */
class BehaviorController extends Controller
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
			new VisitorComponentA(),
			new VisitorComponentB(),
		];

		$visitor1 = new Visitor1();
		$visitor1Answers = $this->visitorClientCode($components, $visitor1);


		$visitor2 = new Visitor2();
		$visitor2Answers = $this->visitorClientCode($components, $visitor2);

		return $this->render('visitor', compact('visitor1Answers', 'visitor2Answers'));
	}

	/**
	 * @return string
	 */
	public function actionState()
	{
		/**
		 * Клиентский код.
		 */
		$context = new Context(new ConcreteStateA());
		$requestOfContext1 = $context->request1();
		$requestOfContext2 = $context->request2();
		return $this->render('state', compact('requestOfContext1', 'requestOfContext2'));
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
