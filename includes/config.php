<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

// require the Eagle class.
require_once('Eagle.class.php');

// global settings
$website['name']       = 'Project Eagle';
$website['algorithms'] = Eagle::allAlgorithms();
$website['more']       = array_rand($website['algorithms'], 8);
$website['count']      = count($website['algorithms']);
$website['url']        = Eagle::websiteUrl();
$website['current']    = Eagle::websiteCurrent();
?>