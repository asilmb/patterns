<?php

namespace frontend\patterns\behavior\visitor;

interface VisitorComponentInterface
{
	public function accept(VisitorInterface $visitor): string;

}