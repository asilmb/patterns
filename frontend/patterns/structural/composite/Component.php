<?php


namespace frontend\patterns\structural\composite;


/**
 * Базовый класс Компонент объявляет общие операции как для простых, так и для
 * сложных объектов структуры.
 */
abstract class Component
{
	/**
	 * @var Component
	 */
	protected $parent;

	/**
	 * При необходимости базовый Компонент может объявить интерфейс для
	 * установки и получения родителя компонента в древовидной структуре. Он
	 * также может предоставить некоторую реализацию по умолчанию для этих
	 * методов.
	 * @param Component $parent
	 */
	public function setParent(Component $parent)
	{
		$this->parent = $parent;
	}

	public function getParent(): Component
	{
		return $this->parent;
	}

	/**
	 * В некоторых случаях целесообразно определить операции управления
	 * потомками прямо в базовом классе Компонент. Таким образом, вам не нужно
	 * будет предоставлять конкретные классы компонентов клиентскому коду, даже
	 * во время сборки дерева объектов. Недостаток такого подхода в том, что эти
	 * методы будут пустыми для компонентов уровня листа.
	 * @param Component $component
	 */
	public function add(Component $component): void { }

	public function remove(Component $component): void { }

	/**
	 * Вы можете предоставить метод, который позволит клиентскому коду понять,
	 * может ли компонент иметь вложенные объекты.
	 */
	public function isComposite(): bool
	{
		return false;
	}

	/**
	 * Базовый Компонент может сам реализовать некоторое поведение по умолчанию
	 * или поручить это конкретным классам, объявив метод, содержащий поведение
	 * абстрактным.
	 */
	abstract public function operation(): string;
}