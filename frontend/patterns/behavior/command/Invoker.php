<?php


namespace frontend\patterns\behavior\command;

/**
 * Отправитель связан с одной или несколькими командами. Он отправляет запрос
 * команде.
 */
class Invoker
{
	/**
	 * @var Command
	 */
	private $onStart;

	/**
	 * @var Command
	 */
	private $onFinish;

	/**
	 * Инициализация команд.
	 */
	public function setOnStart(Command $command): void
	{
		$this->onStart = $command;
	}

	public function setOnFinish(Command $command): void
	{
		$this->onFinish = $command;
	}

	/**
	 * Отправитель не зависит от классов конкретных команд и получателей.
	 * Отправитель передаёт запрос получателю косвенно, выполняя команду.
	 */
	public function doSomethingImportant(): void
	{
		echo "Invoker: Does anybody want something done before I begin?\n";
		if ($this->onStart instanceof Command) {
			$this->onStart->execute();
		}

		echo "Invoker: ...doing something really important...\n";

		echo "Invoker: Does anybody want something done after I finish?\n";
		if ($this->onFinish instanceof Command) {
			$this->onFinish->execute();
		}
	}
}