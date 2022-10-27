<?php

namespace app\services;

class generateDateFormatService
{
    public function format($date)
    {

        return date("l, jS F Y", strtotime(str_replace('/', '-', $date)));
    }
}
