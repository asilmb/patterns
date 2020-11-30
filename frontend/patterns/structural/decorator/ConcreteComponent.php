<?php


namespace frontend\patterns\structural\decorator;

/**
 * Конкретные Компоненты предоставляют реализации поведения по умолчанию. Может
 * быть несколько вариаций этих классов.
 */
class ConcreteComponent implements Component
{
	public function operation(): string
	{
		return "ConcreteComponent";
	}
}