<?php


namespace frontend\patterns\structural\facade;


/**
 * Подсистема может принимать запросы либо от фасада, либо от клиента напрямую.
 * В любом случае, для Подсистемы Фасад – это еще один клиент, и он не является
 * частью Подсистемы.
 */
class Subsystem1
{
	public function operation1(): string
	{
		return "Subsystem1: Ready!\n";
	}

	// ...

	public function operationN(): string
	{
		return "Subsystem1: Go!\n";
	}
}
