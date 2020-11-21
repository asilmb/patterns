<?php


namespace frontend\patterns\behaivior\visitor;


/**
 * Интерфейс Посетителя объявляет набор методов посещения, соответствующих
 * классам компонентов. Сигнатура метода посещения позволяет посетителю
 * определить конкретный класс компонента, с которым он имеет дело.
 */
interface VisitorInterface
{
	public function visitConcreteComponentA(VisitorComponentComponentA $element): string;

	public function visitConcreteComponentB(VisitorComponentComponentB $element): string;
}