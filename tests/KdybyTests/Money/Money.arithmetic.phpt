<?php

use Kdyby\Money\Money;
use Kdyby\Money\Currency;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';


$currency = new Currency('TST', 123, 'Test Currency', 100, []);
$money = new Money(101, $currency);
$negMoney = new Money(-101, $currency);

$test = function($expected, $money) use ($currency) {
	Assert::equal(new Money($expected, $currency), $money);
};
$test(-101, $money->negated());
$test(101, $negMoney->negated());
$test(0, (new Money(0, $currency))->negated());

Assert::same(1, $money->truncated());
Assert::same(-1, $negMoney->truncated());
Assert::same(11, (new Money(1140, $currency))->truncated());
Assert::same(-11, (new Money(-1140, $currency))->truncated());

Assert::same(1, $money->fractionPart());
Assert::same(-1, $negMoney->fractionPart());
Assert::same(0, (new Money(100, $currency))->fractionPart());
Assert::same(0, (new Money(-100, $currency))->fractionPart());
