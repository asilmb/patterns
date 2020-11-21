<?php

namespace frontend\patterns\behaivior\visitor;

interface VisitorComponentInterface
{
	public function accept(VisitorInterface $visitor): string;

}