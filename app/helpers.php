<?php
    // ======================= My common functions =======================

    // Break the lines in database's texts
    function lineBreak($string)
    {
        $string = str_replace(array("\r\n", "\r", "\n"), "<br/>", $string);
        return $string;
    }

    // Date : dd/mm/yyyy
    function dateFormat($date)
    {
        $dateFormat = \Carbon\Carbon::parse($date)->format('d/m/Y');
        return $dateFormat;
    }

    // format date dd/mm/yyyy hh:mm:ss ???????


    // Verification of user's admin role
    function isAdmin(){
        if( Auth::user()->role == 1 ){
            return true;
        } else {
            return false;
        }
    }
?>