<?php

namespace frontend\patterns\behavior\visitor;

/**
 * Каждый Конкретный Компонент должен реализовать метод accept таким образом,
 * чтобы он вызывал метод посетителя, соответствующий классу компонента.
 */
class VisitorComponentA implements VisitorComponentInterface
{
	/**
	 * Обратите внимание, мы вызываем visitConcreteComponentA, что соответствует
	 * названию текущего класса. Таким образом мы позволяем посетителю узнать, с
	 * каким классом компонента он работает.
	 */
	public function accept(VisitorInterface $visitor): string
	{
		return $visitor->visitConcreteComponentA($this);
	}

	/**
	 * Конкретные Компоненты могут иметь особые методы, не объявленные в их
	 * базовом классе или интерфейсе. Посетитель всё же может использовать эти
	 * методы, поскольку он знает о конкретном классе компонента.
	 */
	public function exclusiveMethodOfConcreteComponentA(): string
	{
		return "A";
	}
}