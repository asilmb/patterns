<?php


namespace frontend\patterns\structural\adapter;

/**
 * Целевой класс объявляет интерфейс, с которым может работать клиентский код.
 */
class Target
{
	public function request(): string
	{
		return "Target: The default target's behavior.";
	}
}