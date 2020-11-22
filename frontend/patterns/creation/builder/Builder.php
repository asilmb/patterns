<?php


namespace frontend\patterns\creation\builder;

/**
 * Интерфейс Строителя объявляет создающие методы для различных частей объектов
 * Продуктов.
 */
interface Builder
{
	public function producePartA(): void;

	public function producePartB(): void;

	public function producePartC(): void;
}