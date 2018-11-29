<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

// require the eagle class.
require_once('eagle.class.php');

// global settings
$website['name']       = 'Project Eagle';
$website['algorithms'] = eagle::all_algorithms();
$website['more']       = array_rand($website['algorithms'], 8);
$website['count']      = count($website['algorithms']);
$website['url']        = eagle::website_url();
$website['current']    = eagle::website_current();
?>