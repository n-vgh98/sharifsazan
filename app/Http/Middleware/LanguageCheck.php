<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class LanguageCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $x = substr($request->getPathInfo(), 1, 2);
        if ($x == "" or $x == null) {
            $ip = $request->ip();
            $geoip = new GeoIPLocation();
            $geoip->setIP($ip);
            $country = $geoip->getCountry();
            if ($country == "iran") {
                URL::defaults(['locale' => "fa"]);
                App::setLocale("fa");
                return $next($request);
            } else {
                URL::defaults(['locale' => "en"]);
                App::setLocale("en");
                return $next($request);
            }
        } else {
            URL::defaults(['locale' => $x]);
            App::setLocale($x);
            return $next($request);
        }
    }
}
