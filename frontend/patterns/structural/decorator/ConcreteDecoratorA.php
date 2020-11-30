<?php


namespace frontend\patterns\structural\decorator;


/**
 * Конкретные Декораторы вызывают обёрнутый объект и изменяют его результат
 * некоторым образом.
 */
class ConcreteDecoratorA extends Decorator
{
	/**
	 * Декораторы могут вызывать родительскую реализацию операции, вместо того,
	 * чтобы вызвать о_бёрнутый объект напрямую. Такой подход упрощает расширение
	 * классов декораторов.
	 */
	public function operation(): string
	{
		return "ConcreteDecoratorA(" . parent::operation() . ")";
	}
}