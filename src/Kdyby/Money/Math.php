<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\Money;


final class Math
{

	public function __construct()
	{
		throw new ClassNotInstantiableException();
	}



	public function __unserialize()
	{
		throw new ClassNotInstantiableException();
	}


	/**
	 * @param string|float|int
	 * @return int
	 */
	public static function parseInt($s)
	{
		if (!is_numeric($s) || round($s) !== (float) $s || is_infinite($s)) {
			throw new InvalidArgumentException('Provided value cannot be converted to integer');
		}
		return (int) $s;
	}


	/**
	 * Quotient defined by division with truncation toward zero.
	 * @param int
	 * @param int
	 * @return int
	 */
	public static function quo($int, $divisor)
	{
		if ($divisor === 0) {
			throw new InvalidArgumentException('Division by zero');
		}
		return (int) ($int / $divisor);
	}


	/**
	 * Quotient defined by division with truncation toward negative infinity.
	 * @param int
	 * @param int
	 * @return int
	 */
	public static function truncDiv($int, $divisor)
	{
		if ($divisor === 0) {
			throw new InvalidArgumentException('Division by zero');
		}
		return (int) floor($int / $divisor);
	}



	/**
	 * @param int
	 * @param int
	 * @return int
	 */
	public static function floorLog($int, $base)
	{
		if ($base <= 0) {
			throw new InvalidArgumentException('Base must be greater than 0');
		}
		return floor(log($int, $base));
	}

}
