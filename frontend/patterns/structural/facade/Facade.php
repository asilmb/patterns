<?php

namespace frontend\patterns\structural\facade;

/**
 * Класс Фасада предоставляет простой интерфейс для сложной логики одной или
 * нескольких подсистем. Фасад делегирует запросы клиентов соответствующим
 * объектам внутри подсистемы. Фасад также отвечает за управление их жизненным
 * циклом. Все это защищает клиента от нежелательной сложности подсистемы.
 */
class Facade
{
	protected $subsystem1;

	protected $subsystem2;

	/**
	 * В зависимости от потребностей вашего приложения вы можете предоставить
	 * Фасаду существующие объекты подсистемы или заставить Фасад создать их
	 * самостоятельно.
	 * @param Subsystem1|null $subsystem1
	 * @param Subsystem2|null $subsystem2
	 */
	public function __construct(
		Subsystem1 $subsystem1 = null,
		Subsystem2 $subsystem2 = null
	) {
		$this->subsystem1 = $subsystem1 ?: new Subsystem1();
		$this->subsystem2 = $subsystem2 ?: new Subsystem2();
	}

	/**
	 * Методы Фасада удобны для быстрого доступа к сложной функциональности
	 * подсистем. Однако клиенты получают только часть возможностей подсистемы.
	 */
	public function operation(): void
	{
		echo "Facade initializes subsystems:\n";
		echo $this->subsystem1->operation1();
		echo $this->subsystem2->operation1();
		echo "Facade orders subsystems to perform the action:\n";
		echo $this->subsystem1->operationN();
		echo $this->subsystem2->operationZ();

	}
}