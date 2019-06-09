<?php

namespace App;


class Helpers
{
    public static function time_elapsed_string($datetime, $full = false) {

    return \Carbon\Carbon::createFromTimeStamp(strtotime($datetime))->diffForHumans();

    }
}