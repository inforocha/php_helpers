<?php

class DateHelper {
	/**
	* [en]
	* checks the number of days between two dates.
	* [pt-br]
	* verifica a quantidade de dias entre duas datas.
	* @param string $date1 - format Y-m-d or seconds
	* @param string $date2 - format Y-m-d or seconds
	* @param boolean $isStrToTime
	* @return int
	* example
	* 	DateHelper::numberOfDaysBetweenDates('2020-04-13', '2020-04-13'); // 0
	* 	DateHelper::numberOfDaysBetweenDates('2020-04-14', '2020-04-13'); // 1
	* 	DateHelper::numberOfDaysBetweenDates('2020-04-13', '2020-04-14'); // -1
	* 	DateHelper::numberOfDaysBetweenDates(strtotime('2020-04-13'), strtotime('2020-04-14'));
	* 	DateHelper::numberOfDaysBetweenDates(1587178800, 1586746800);
	*/
	public static function numberOfDaysBetweenDates($day1, $day2, $isStrToTime = false) {
		if (!$isStrToTime) {
			$day1 = strtotime($day1);
			$day2 = strtotime($day2);
		}
		$diff = $day1-$day2;
		return (int)floor( $diff / (60 * 60 * 24));
	}

	/**
	* [en]
	* adds a number of days to the informed date.
	* [pt-br]
	* soma uma quantidade de dias a data informada.
	* @param int $days
	* @param string $date - format Y-m-d
	* @return string - format Y-m-d
	* example
	* 	DateHelper::addDaysInDate(2, date('Y-m-d')); // add 2 days today
	* 	DateHelper::addDaysInDate(2, '2020-04-13'); // add 2 days to day 2020-04-13
	* 	strtotime(DateHelper::addDaysInDate(2, '2020-04-13')); // seconds of add 2 days to day 2020-04-13
	*/
	public static function addDaysInDate($days, $date) {
		return date('Y-m-d', strtotime('+'.$days.' days', strtotime($date)));
	}
}
