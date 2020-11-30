<?php


namespace frontend\patterns\structural\adapter;


/**
 * Адаптируемый класс содержит некоторое полезное поведение, но его интерфейс
 * несовместим с существующим клиентским кодом. Адаптируемый класс нуждается в
 * некоторой доработке, прежде чем клиентский код сможет его использовать.
 */
class Adaptee
{
	public function specificRequest(): string
	{
		return ".eetpadA eht fo roivaheb laicepS";
	}
}
