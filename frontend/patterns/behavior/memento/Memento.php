<?php


namespace frontend\patterns\behavior\memento;


/**
 * Интерфейс Снимка предоставляет способ извлечения метаданных снимка, таких как
 * дата создания или название. Однако он не раскрывает состояние Создателя.
 */
interface Memento
{
	public function getName(): string;

	public function getDate(): string;
}