<?php


namespace Core;


use DateTime;

class DateFormat {
    public static function alter($date, $before, $after) {
        return DateTime::createFromFormat($before, $date)->format($after);
    }
    public static function toSQL($date, $before = 'Y-m-d') {
        return self::alter($date, $before, 'd-m-Y H:i:s');
    }
    public static function toHTML($date, $before = 'd-m-Y H:i:s') {
        return self::alter($date, $before, 'Y/m/d');
    }
}