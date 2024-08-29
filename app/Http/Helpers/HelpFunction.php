<?php

if (!function_exists('activeLink')) {
    function activeLink($url, $dropdown = false, $activeClass = 'active')
    {
        $dropdown ? $activeClass .= ' open' : $activeClass;
        return request()->routeIs($url) ? $activeClass : null;
    }
}
