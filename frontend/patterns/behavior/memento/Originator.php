<?php


namespace frontend\patterns\behavior\memento;

/**
 * Создатель содержит некоторое важное состояние, которое может со временем
 * меняться. Он также объявляет метод сохранения состояния внутри снимка и метод
 * восстановления состояния из него.
 */
class Originator
{
	/**
	 * @var string Для удобства состояние создателя хранится внутри одной
	 * переменной.
	 */
	private $state;

	public function __construct(string $state)
	{
		$this->state = $state;
		echo "Originator: My initial state is: {$this->state}\n";
	}

	/**
	 * Бизнес-логика Создателя может повлиять на его внутреннее состояние.
	 * Поэтому клиент должен выполнить резервное копирование состояния с помощью
	 * метода save перед запуском методов бизнес-логики.
	 */
	public function doSomething(): void
	{
		echo "Originator: I'm doing something important.\n";
		$this->state = $this->generateRandomString(30);
		echo "Originator: and my state has changed to: {$this->state}\n";
	}

	private function generateRandomString(int $length = 10): string
	{
		return substr(
			str_shuffle(
				str_repeat(
					$x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
					ceil($length / strlen($x))
				)
			),
			1,
			$length,
		);
	}

	/**
	 * Сохраняет текущее состояние внутри снимка.
	 */
	public function save(): Memento
	{
		return new ConcreteMemento($this->state);
	}

	/**
	 * Восстанавливает состояние Создателя из объекта снимка.
	 */
	public function restore(Memento $memento): void
	{
		$this->state = $memento->getState();
		echo "Originator: My state has changed to: {$this->state}\n";
	}
}