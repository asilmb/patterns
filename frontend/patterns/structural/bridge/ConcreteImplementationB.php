<?php


namespace frontend\patterns\structural\bridge;

/**
 * Каждая Конкретная Реализация соответствует определённой платформе и реализует
 * интерфейс Реализации с использованием API этой платформы.
 */
class ConcreteImplementationB implements Implementation
{
	public function operationImplementation(): string
	{
		return "ConcreteImplementationB: Here's the result on the platform B.\n";
	}
}