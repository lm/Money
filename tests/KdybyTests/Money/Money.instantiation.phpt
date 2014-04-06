<?php

use Kdyby\Money\Money;
use Kdyby\Money\Currency;
use Kdyby\Money\Math;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';


$currency = new Currency('TST', 123, 'Test Currency', 100, []);


$test = function($value) use ($currency) {
	new Money($value, $currency);
	new Money((float) $value, $currency);
	new Money((string) $value, $currency);
};
$test(0);
$test(101);
$test(-101);


$testError = function($value) use ($currency) {
	Assert::exception(function() use ($value, $currency) {
		new Money($value, $currency);
	}, InvalidArgumentException::class);
};
$testError('');
$testError('a');
$testError(INF);
$testError(0.1);
$testError(M_PI);
$testError([]);
$testError((object) []);
$testError(STDIN);


$test = function($expected, $value) use ($currency) {
	Assert::same($expected, Money::fromNumber($value, $currency)->toInt());
	Assert::same($expected, Money::fromNumber((string) $value, $currency)->toInt());
};
$test(0, 0);
$test(100, 1.00);
$test(100, 1.004);
$test(101, 1.01);
$test(101, 1.005);
$test(101, 1.006);
