<?php


namespace frontend\patterns\behaivior\visitor;


/**
 * Конкретные Посетители реализуют несколько версий одного и того же алгоритма,
 * которые могут работать со всеми классами конкретных компонентов.
 *
 * Максимальную выгоду от паттерна Посетитель вы почувствуете, используя его со
 * сложной структурой объектов, такой как дерево Компоновщика. В этом случае
 * было бы полезно хранить некоторое промежуточное состояние алгоритма при
 * выполнении методов посетителя над различными объектами структуры.
 */
class Visitor2 implements VisitorInterface
{
	public function visitConcreteComponentA(VisitorComponentComponentA $element): string
	{
		return $element->exclusiveMethodOfConcreteComponentA() . " + Visitor2\n";
	}

	public function visitConcreteComponentB(VisitorComponentComponentB $element): string
	{
		return $element->specialMethodOfConcreteComponentB() . " + Visitor2\n";
	}
}