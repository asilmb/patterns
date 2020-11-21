<?php


namespace frontend\patterns\behavior\visitor;

/**
 * Конкретные Посетители реализуют несколько версий одного и того же алгоритма,
 * которые могут работать со всеми классами конкретных компонентов.
 *
 * Максимальную выгоду от паттерна Посетитель вы почувствуете, используя его со
 * сложной структурой объектов, такой как дерево Компоновщика. В этом случае
 * было бы полезно хранить некоторое промежуточное состояние алгоритма при
 * выполнении методов посетителя над различными объектами структуры.
 */
class Visitor1 implements VisitorInterface
{
	public function visitConcreteComponentA(VisitorComponentA $element): string
	{
		return $element->exclusiveMethodOfConcreteComponentA() . " + Visitor1\n";
	}

	public function visitConcreteComponentB(VisitorComponentB $element): string
	{
		return $element->specialMethodOfConcreteComponentB() . " + Visitor1\n";
	}
}