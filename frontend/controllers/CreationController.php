<?php

namespace frontend\controllers;

use frontend\patterns\behavior\visitor\VisitorInterface;
use frontend\patterns\creation\prototype\ComponentWithBackReference;
use frontend\patterns\creation\prototype\Prototype;
use frontend\patterns\creation\singleton\Singleton;
use yii\web\Controller;

/**
 * Site controller
 */
class CreationController extends Controller
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
	public function actionSingleton()
	{
		$s1 = Singleton::getInstance();
		$s2 = Singleton::getInstance();

		return $this->render('singleton', compact('s1', 's2'));
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function actionPrototype()
	{
		$p1 = new Prototype();
		$p1->primitive = 245;
		$p1->component = new \DateTime();
		$p1->circularReference = new ComponentWithBackReference($p1);
		$p2 = clone $p1;

		return $this->render('prototype', compact('p1', 'p2'));
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
