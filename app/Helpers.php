<?php

function getDateDiff($fromDate, $toDate = null) {
    if (!$toDate) {
        $toDate = date('Y-m-d H:i:s');
    }
    // check diff day
    $date = strtotime($toDate) - strtotime($fromDate);
    $diff = floor($date / (60 * 60 * 24));
    if ($diff > 0) {
        return $diff . " ngày";
    } else {
        $diff = floor($date / (3600));
        if ($diff > 0) {
            return $diff . " giờ";
        } else {
            $diff = floor($date / (60));
            if ($diff > 0) {
                return $diff . " phút";
            } else {
                $diff = floor($date);
                return $diff . " giây";
            }
        }
    }
}
