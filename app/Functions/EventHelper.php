<?php

namespace App\Functions;

use App\Functions\DateHelper;

class EventHelper
{
    public static function chunckEventsToPeriods($events)
    {
        $now = DateHelper::getCurrentDate();
    
        $overdue = [];
        $today = [];
        $tomorrow = [];
        $in_week = [];
    
        foreach ($events as $event) {

            $event_date = DateHelper::convertTimestampToDate($event['timestamp']);
            $diff = DateHelper::getDiffDate($now, $event_date);
    
            if ($diff < 0) {
                $overdue[] = $event;
            } elseif ($diff == 0) {
                $today[] = $event;
            } elseif ($diff > 0 && $diff < 2) {
                $tomorrow[] = $event;
            } elseif ($diff >= 2 && $diff < 8) {
                $in_week[] = $event;
            }
        }   
        
        return [$overdue, $today, $tomorrow, $in_week];
    }    
}
