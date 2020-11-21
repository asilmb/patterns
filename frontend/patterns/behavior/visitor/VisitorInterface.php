<?php


namespace frontend\patterns\behavior\visitor;


/**
 * Интерфейс Посетителя объявляет набор методов посещения, соответствующих
 * классам компонентов. Сигнатура метода посещения позволяет посетителю
 * определить конкретный класс компонента, с которым он имеет дело.
 */
interface VisitorInterface
{
	public function visitConcreteComponentA(VisitorComponentA $element): string;

	public function visitConcreteComponentB(VisitorComponentB $element): string;
}