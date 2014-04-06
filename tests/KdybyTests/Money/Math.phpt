<?php

use Kdyby\Money\Math;
use Kdyby\Money\InvalidArgumentException;

require_once __DIR__ . '/../bootstrap.php';


Assert::exception(function() {
	Math::parseInt(100.1);
}, InvalidArgumentException::class, 'Provided value cannot be converted to integer');

Assert::exception(function() {
	Math::parseInt(-100.1);
}, InvalidArgumentException::class, 'Provided value cannot be converted to integer');

Assert::exception(function() {
	Math::parseInt('100.1');
}, InvalidArgumentException::class, 'Provided value cannot be converted to integer');

Assert::exception(function() {
	Math::parseInt('-100.1');
}, InvalidArgumentException::class, 'Provided value cannot be converted to integer');

Assert::exception(function() {
	Math::parseInt(INF);
}, InvalidArgumentException::class, 'Provided value cannot be converted to integer');

Assert::exception(function() {
	Math::parseInt(-INF);
}, InvalidArgumentException::class, 'Provided value cannot be converted to integer');

Assert::same(100, Math::parseInt((float) 100));
Assert::same(-100, Math::parseInt((float) -100));
Assert::same(100, Math::parseInt('100'));
Assert::same(-100, Math::parseInt('-100'));

Assert::same(2, Math::quo(5, 2));
Assert::same(-2, Math::quo(-5, 2));
Assert::same(-2, Math::quo(5, -2));
Assert::same(2, Math::quo(-5, -2));
Assert::same(0, Math::quo(5, 10));
Assert::same(0, Math::quo(-5, 10));

Assert::same(2, Math::truncDiv(5, 2));
Assert::same(-3, Math::truncDiv(-5, 2));
Assert::same(-3, Math::truncDiv(5, -2));
Assert::same(2, Math::truncDiv(-5, -2));
Assert::same(0, Math::truncDiv(5, 10));
Assert::same(-1, Math::truncDiv(-5, 10));
