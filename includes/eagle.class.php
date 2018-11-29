<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

class eagle
{

    //get protocol whether it is secured or plain
    public static function website_protocol()
    {
        return (isset($_SERVER['HTTPS']) && (!empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http');
    }

    //get website url from global var and concat it with protocol
    public static function website_url()
    {
        return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
    }

    //get current url
    public static function website_current()
    {
        return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

//prepare slugs
    public static function algorithm_slug($string)
    {
        $slug = strtolower($string);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        return trim($slug, '-');
    }

    //prepare name of algorithm
    public static function algorithm_name($string)
    {
        $name = strtolower($string);
        $name = preg_replace('/[^a-z0-9\.\,\s]+/', ' ', $name);
        return trim($name, ' ');
    }

    //available string algorithms in core php
    public static function string_algorithms()
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
                $algorithm['slug'] = self::algorithm_slug($function);
                $algorithm['name'] = self::algorithm_name($function);
                $algorithm['url'] = self::website_url() . 'algorithm/' . $algorithm['slug'];
                $algorithm['algorithm'] = $function;
                $algorithm['type'] = 'string';
                $algorithms[] = $algorithm;
            }
        }
        return (!empty($algorithms) ? $algorithms : false);
    }

    //hashing algorithms yet to implement

    //count available algorithms
    public static function all_algorithms()
    {
        $hash = null;
        $string = self::string_algorithms();
        return ($hash && $string ? array_merge($hash, $string) : ($hash ? $hash : $string));
    }

    //create slugs for all algorithms
    public static function slug_to_algorithm($slug)
    {
        $algorithms = self::all_algorithms();
        foreach ($algorithms as $algorithm) {
            if ($algorithm['slug'] == $slug) {
                return $algorithm;
                break;
            }
        }
        return false;
    }


    //the main magic happens here that needs to be developed
    public static function use_algorithm($algorithm, $opts)
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