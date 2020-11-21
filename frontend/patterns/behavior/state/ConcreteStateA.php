<?php


namespace frontend\patterns\behavior\state;

/**
 * Конкретные Состояния реализуют различные модели поведения, связанные с
 * состоянием Контекста.
 */
class ConcreteStateA extends State
{
	public function handle1(): string
	{
		$this->context->changeState(new ConcreteStateB());
		return "ConcreteStateA handles request1.\n".
		"ConcreteStateA wants to change the state of the context.\n";
	}

	public function handle2(): string
	{
		return "ConcreteStateA handles request2.\n";
	}
}