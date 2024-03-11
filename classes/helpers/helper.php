<?php

namespace helpers;

class Helper
{

    public static function phoneToMobile($phone)
    {
        if (!empty($phone)) {
            $phone = preg_replace("/[^0-9+]/", "", $phone);
        }

        return $phone;
    }

    public static function logo()
    {
        return get_custom_logo();
    }

}
