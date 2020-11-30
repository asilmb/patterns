<?php


namespace frontend\patterns\structural\adapter;


/**
 * Фабрика Легковесов создает объекты-Легковесы и управляет ими. Она
 * обеспечивает правильное разделение легковесов. Когда клиент запрашивает
 * легковес, фабрика либо возвращает существующий экземпляр, либо создает новый,
 * если он ещё не существует.
 */
class FlyweightFactory
{
	/**
	 * @var Flyweight[]
	 */
	private $flyweights = [];

	public function __construct(array $initialFlyweights)
	{
		foreach ($initialFlyweights as $state) {
			$this->flyweights[$this->getKey($state)] = new Flyweight($state);
		}
	}

	/**
	 * Возвращает хеш строки Легковеса для данного состояния.
	 */
	private function getKey(array $state): string
	{
		ksort($state);

		return implode(" ", $state);
	}

	/**
	 * Возвращает существующий Легковес с заданным состоянием или создает новый.
	 */
	public function getFlyweight(array $sharedState): Flyweight
	{
		$key = $this->getKey($sharedState);

		if (!isset($this->flyweights[$key])) {
			/** "FlyweightFactory: Can't find a flyweight, creating new one.\n";*/
			$this->flyweights[$key] = new Flyweight($sharedState);
		} else {
			/** "FlyweightFactory: Reusing existing flyweight.\n";*/
		}

		return $this->flyweights[$key];
	}

	public function listFlyweights(): string
	{
		$count = count($this->flyweights);
		$result = "\nFlyweightFactory: I have $count flyweights:\n";
		foreach ($this->flyweights as $key => $flyweight) {
			$result .= $key . "\n";
		}
		return $result;
	}
}