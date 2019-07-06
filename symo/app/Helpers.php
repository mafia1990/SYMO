<?php

namespace App;


class Helpers
{
    public static function growth_rate_check($newGrowth,$oldGrowth) {
        if($oldGrowth==0) return $newGrowth;
        return ($newGrowth-$oldGrowth)/$oldGrowth*100;

    }
    public static function time_elapsed_string($datetime, $full = false) {

    return \Carbon\Carbon::createFromTimeStamp(strtotime($datetime))->diffForHumans();

    }
    public static function deleteFile($filename,$path="") {
            if (\File::exists(@public_path().$path.$filename)) {
                @unlink(public_path().$path.  $filename);
                return true;
            }
        dd(@public_path().$path.$filename);

            return false;

    }

}