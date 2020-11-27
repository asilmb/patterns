<?php


namespace frontend\controllers;

use frontend\patterns\structural\composite\Component;
use frontend\patterns\structural\composite\Composite;
use frontend\patterns\structural\composite\Leaf;
use frontend\patterns\structural\flyweight\FlyweightFactory;
use frontend\patterns\structural\observer\ConcreteObserverA;
use frontend\patterns\structural\observer\ConcreteObserverB;
use frontend\patterns\structural\observer\Subject;
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

	/**
	 * @return string
	 */
	public function actionFlyweight()
	{
		/**
		 * Клиентский код обычно создает кучу предварительно заполненных легковесов на
		 * этапе инициализации приложения.
		 */
		$factory = new FlyweightFactory([
			["Chevrolet", "Camaro2018", "pink"],
			["Mercedes Benz", "C300", "black"],
			["Mercedes Benz", "C500", "red"],
			["BMW", "M5", "red"],
			["BMW", "X6", "white"],
		]);
		$listFlyweights = $factory->listFlyweights();


		$this->addCarToPoliceDatabase($factory,
			"CL234IR",
			"James Doe",
			"BMW",
			"M5",
			"red",
		);

		$this->addCarToPoliceDatabase($factory,
			"CL234IR",
			"James Doe",
			"BMW",
			"X1",
			"red",
		);
		return $this->render('flyweight', compact('listFlyweights'));
	}

	private function addCarToPoliceDatabase(
		FlyweightFactory $ff, $plates, $owner,
		$brand, $model, $color
	) {
		//"\nClient: Adding a car to database.\n";
		$flyweight = $ff->getFlyweight([$brand, $model, $color]);

		// Клиентский код либо сохраняет, либо вычисляет внешнее состояние и
		// передает его методам легковеса.
		$flyweight->operation([$plates, $owner]);
	}




}