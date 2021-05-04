<?php


namespace frontend\patterns\behavior\command;

/**
 * Но есть и команды, которые делегируют более сложные операции другим объектам,
 * называемым «получателями».
 */
class ComplexCommand implements Command
{
	/**
	 * @var Receiver
	 */
	private $receiver;

	/**
	 * Данные о контексте, необходимые для запуска методов получателя.
	 */
	private $a;

	private $b;

	/**
	 * Сложные команды могут принимать один или несколько объектов-получателей
	 * вместе с любыми данными о контексте через конструктор.
	 */
	public function __construct(Receiver $receiver, string $a, string $b)
	{
		$this->receiver = $receiver;
		$this->a = $a;
		$this->b = $b;
	}

	/**
	 * Команды могут делегировать выполнение любым методам получателя.
	 */
	public function execute(): void
	{
		echo "ComplexCommand: Complex stuff should be done by a receiver object.\n";
		$this->receiver->doSomething($this->a);
		$this->receiver->doSomethingElse($this->b);
	}
}