<?php

/*
 * This file is part of the EasyBanglaDate package.
 *
 * Copyright (c) 2015 Roni Saha
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace Tests\Tools;


use EasyBanglaDate\Tests\Utils\CsvFileIterator;
use EasyBanglaDate\Tools\Converter;

class ConverterTest extends \PHPUnit_Framework_TestCase
{
    public function flagDataProvider()
    {
        return new CsvFileIterator(__DIR__ . '/../Resources/bn_conversion_data.csv');
    }

    /**
     * @dataProvider flagDataProvider
     * @param $time
     * @param $year
     * @param $month
     * @param $day
     */
    public function testFormat($time, $year, $month, $day)
    {
        $object = new \DateTime($time, new \DateTimeZone('Asia/Dhaka'));

        $arr = Converter::getBengaliDateMonthYear($object);

        $expected = array('date' => $day, 'month' => $month, 'year' => $year);

        $this->assertEquals($expected, $arr);
    }
}
