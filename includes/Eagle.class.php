<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

class Eagle
{

    //get protocol whether it is secured or plain
    public static function websiteProtocol()
    {
        return (isset($_SERVER['HTTPS']) && (!empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http');
    }

    //get website url from global var and concat it with protocol
    public static function websiteUrl()
    {
        $dir = dirname($_SERVER['PHP_SELF']);
        return self::websiteProtocol() . '://' . $_SERVER['HTTP_HOST'] . $dir . '/';
    }

    //get current full request path including the querystring.
    public static function websiteCurrent()
    {
        return self::websiteProtocol() . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    //prepare slugs
    public static function algorithmSlug($string)
    {
        $slug = strtolower($string);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        return trim($slug, '-');
    }

    //prepare name of algorithm
    public static function algorithmName($string)
    {
        $name = strtolower($string);
        $name = preg_replace('/[^a-z0-9\.\,\s]+/', ' ', $name);
        return trim($name, ' ');
    }

    //available string algorithms in core php
    public static function stringAlgorithms()
    {
        $functions = array(
            "base64_encode",
            "base64_decode"
        );

        //store slugs and url scheme for string crypto algorithms
        $algorithms = array();
        foreach ($functions as $function) {
            if (function_exists($function)) {
                $algorithm = array();
                $algorithm['slug'] = self::algorithmSlug($function);
                $algorithm['name'] = self::algorithmName($function);
                $algorithm['url'] = self::websiteUrl() . 'algorithm/' . $algorithm['slug'];
                $algorithm['algorithm'] = $function;
                $algorithm['type'] = 'string';
                $algorithms[] = $algorithm;
            }
        }
        return (!empty($algorithms) ? $algorithms : false);
    }

    //hashing algorithms yet to implement

    //count available algorithms
    public static function allAlgorithms()
    {
        $hash = null;
        $string = self::stringAlgorithms();
        return ($hash && $string ? array_merge($hash, $string) : ($hash ? $hash : $string));
    }

    //convert algorithm names to appropriate slugs
    public static function slugToAlgorithm($slug)
    {
        $algorithms = self::allAlgorithms();
        foreach ($algorithms as $algorithm) {
            if ($algorithm['slug'] == $slug) {
                return $algorithm;
                break;
            }
        }
        return false;
    }


    //the main magic happens here
    public static function magicMethod($algorithm, $opts)
    {
        //validate if string is not null
        if (!isset($opts['string']) || empty($opts['string'])) {
            return 'the string input is empty, please provide a string.';
        } //check algorithm type
        else if ($algorithm['type'] == 'string') {
            return $algorithm['algorithm']($opts['string']);
        } //when custom salt is available
        else if (isset($opts['string']) && isset($opts['salt'])) {
            return hash($algorithm['algorithm'], $opts['string'] . $opts['salt']);
        } //when custom salt doesnt exist
        else {
            return hash($algorithm['algorithm'], $opts['string']);
        }
    }

}

?>