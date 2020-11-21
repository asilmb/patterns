<?php


namespace frontend\patterns\behavior\state;

/**
 * Конкретные Состояния реализуют различные модели поведения, связанные с
 * состоянием Контекста.
 */
class ConcreteStateB extends State
{
	public function handle1(): string
	{
		return "ConcreteStateB handles request1.\n";
	}

	public function handle2(): string
	{

		$this->context->changeState(new ConcreteStateA());
		return "ConcreteStateB handles request2.\n" .
			"ConcreteStateB wants to change the state of the context.\n";
	}
}