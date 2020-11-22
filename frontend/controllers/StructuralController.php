<?php


namespace frontend\controllers;

use frontend\patterns\structural\composite\Component;
use frontend\patterns\structural\composite\Composite;
use frontend\patterns\structural\composite\Leaf;
use yii\web\Controller;

class StructuralController extends Controller
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
	public function actionComposite()
	{
		/**
		 * Таким образом, клиентский код может поддерживать простые компоненты-листья...
		 */
		$simple = new Leaf();
		$simpleResult = $this->clientCode($simple);

		/**
		 * ...а также сложные контейнеры.
		 */
		$tree = new Composite();
		$branch1 = new Composite();
		$branch1->add(new Leaf());
		$branch1->add(new Leaf());
		$branch2 = new Composite();
		$branch2->add(new Leaf());
		$tree->add($branch1);
		$tree->add($branch2);
		$tree->add($branch2);
		$complexResult1 = $this->clientCode($tree);


		$complexResult2 = $this->clientCode2($tree, $simple);
		return $this->render('composite', compact('simpleResult', 'complexResult1', 'complexResult2'));

	}

	/**
	 * Клиентский код работает со всеми компонентами через базовый интерфейс.
	 * @param Component $component
	 * @return string
	 */
	private function clientCode(Component $component)
	{
		return "RESULT: " . $component->operation();
	}

	/**
	 * Благодаря тому, что операции управления потомками объявлены в базовом классе
	 * Компонента, клиентский код может работать как с простыми, так и со сложными
	 * компонентами, вне зависимости от их конкретных классов.
	 * @param Component $component1
	 * @param Component $component2
	 * @return string
	 */
	private function clientCode2(Component $component1, Component $component2)
	{

		if ($component1->isComposite()) {
			$component1->add($component2);
		}
		return "RESULT: " . $component1->operation();
	}


}