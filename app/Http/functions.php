<?php
/**
 * Created by PhpStorm.
 * User: Gathem
 * Date: 10/20/2018
 * Time: 1:41 PM
 */

function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60)
    {
        return "just now";
    }
    //Minutes
    else if($minutes <=60)
    {
        if($minutes==1){ return "one min ago"; }
        else{return "$minutes mins ago";}
    }
    //Hours
    else if($hours <=24)
    {
        if($hours==1){return "an hour ago";}
        else{return "$hours hrs ago";}
    }
    //Days
    else if($days <= 7)
    {
        if($days==1){return "yesterday";}
        else{return "$days days ago";}
    }
    //Weeks
    else if($weeks <= 4.3)
    {
        if($weeks==1){return "a wk ago";}
        else{return "$weeks wks ago";}
    }
    //Months
    else if($months <=12)
    {
        if($months==1){ return "a mth ago";}
        else{return "$months mths ago";}
    }
    //Years
    else
    {
        if($years==1){return "one yr ago";}
        else{return "$years yrs ago";}
    }
}