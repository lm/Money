<?php

use Kdyby\Money\Money;
use Kdyby\Money\Currency;
use Kdyby\Money\Math;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';


$currency = new Currency('TST', 123, 'Test Currency', 100, []);

$test = function($a, $b) use ($currency) {
	foreach ([-1 => 1, 1 => 1, 1 => -1] as $negA => $negB) {
		$tmpA = $a * $negA;
		$tmpB = $b * $negB;
		$moneyA = new Money($tmpA, $currency);
		$moneyB = new Money($tmpB, $currency);
		Assert::same($tmpA === $tmpB, $moneyA->equals($moneyB));
		Assert::same($tmpA === $tmpB, $moneyB->equals($moneyA));

		Assert::same($tmpA < $tmpB, $moneyA->lessThan($moneyB));
		Assert::same($tmpB < $tmpA, $moneyB->lessThan($moneyA));

		Assert::same($tmpA > $tmpB, $moneyA->largerThan($moneyB));
		Assert::same($tmpB > $tmpA, $moneyB->largerThan($moneyA));

		Assert::same($tmpA <= $tmpB, $moneyA->lessOrEquals($moneyB));
		Assert::same($tmpB <= $tmpA, $moneyB->lessOrEquals($moneyA));

		Assert::same($tmpA >= $tmpB, $moneyA->largerOrEquals($moneyB));
		Assert::same($tmpB >= $tmpA, $moneyB->largerOrEquals($moneyA));
	}
};
$test(0, 0);
$test(101, 0);
$test(101, 50);

Assert::true((new Money(0, $currency))->isZero());
Assert::false((new Money(100, $currency))->isZero());
Assert::false((new Money(-100, $currency))->isZero());
