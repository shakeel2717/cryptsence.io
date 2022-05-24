<?php

use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;


function getDevice()
{
    if (Agent::isDesktop()) {
        return 'Desktop';
    } elseif (Agent::isPhone()) {
        return 'Phone';
    } elseif (Agent::isTablet()) {
        return 'Tablet';
    } else {
        return 'Unknown';
    }
}



function edie($message)
{
    // store this message into log
    Log::info($message);
    die();
}
