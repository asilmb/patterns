<?php


namespace frontend\patterns\behavior\command;

/**
 * Интерфейс Команды объявляет метод для выполнения команд.
 */
interface Command
{
	public function execute(): void;
}