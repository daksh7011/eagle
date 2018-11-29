<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

class eagle {

    //get protocol whether it is secured or plain
   public static function website_protocol() {
      return (isset($_SERVER['HTTPS']) && (!empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http');
   }

    //get website url from global var and concat it with protocol
   public static function website_url() {
      return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
   }

   //get current url
   public static function website_current() {
      return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   }

}
?>