<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

?>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $website['url']; ?>">
                <img src="<?php echo $website['url']; ?>/assets/img/logo.png"
                     alt="<?php echo $website['name']; ?>"/></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if ((isset($type) && $type == 'string') || (isset($algorithm['type']) &&
                        $algorithm['type'] == 'string')) {
                    echo 'class="active"';
                } ?>>
                    <a href="<?php echo $website['url']; ?>string-algorithms">String algorithms</a>
                </li>
                <li <?php if ((isset($type) && $type == 'hash') || (isset($algorithm['type']) &&
                        $algorithm['type'] == 'hash')) {
                    echo 'class="active"';
                } ?>>
                    <a href="<?php echo $website['url']; ?>hash-algorithms">Hash algorithms</a>
                </li>
                <li>
                    <a href="gitlab.com/daksh7011/eagle" target="_blank">Fork this</a>
                </li>
            </ul>
        </div>
    </div>
</nav>