<?php


namespace frontend\patterns\structural\decorator;

/**
 * Базовый интерфейс Компонента определяет поведение, которое изменяется
 * декораторами.
 */
interface Component
{
	public function operation(): string;
}