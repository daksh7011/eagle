<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

// require the config file.
require_once('includes/config.php');

// set the title & description.
$type = (isset($_GET['type']) && in_array($_GET['type'], array('string', 'hash')) ? $_GET['type'] : false);
if ($type) {
    $website['title'] = ucfirst($type) . ' Algorithms';
    $website['description'] = 'Use our ' . $type . ' algorithms on your strings.';
} else {
    $website['title'] = 'Home';
    $website['description'] = $website['name'] . ' is a free online service providing ' . $website['count'] . ' hash and string algorithms.';
}
?>
<!DOCTYPE html >
<html lang="en">
<head>

    <!-- meta tags -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title><?php echo $website['title']; ?></title>
    <meta name="description" content="<?php echo $website['description']; ?>"/>

    <!-- favicon that doesnt exist yet -->
    <link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="assets/img/favicon.ico" rel="icon" type="image/x-icon"/>

    <!-- stylesheets -->
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/styles.css?t=<?php echo time(); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css">
    <!-- bootstrap javascript -->
    <script src="assets/js/bootstrap.js" type="text/javascript"></script>

</head>
<body>

<!-- include the website header and hero  -->
<?php include_once('includes/html/header.php'); ?>
<?php include_once('includes/html/hero.php'); ?>

<!-- website main -->
<div id="main">
    <?php if (!$type || ($type && $type == 'string')): ?>
        <div id="string" class="section">
            <div class="container">
                <div class="section-information">
                    <h2>String algorithms</h2>
                </div>
                <div class="row">
                    <?php foreach ($website['algorithms'] as $algorithm): ?>
                        <?php if ($algorithm['type'] == 'string'): ?>
                            <div class="col-md-4">
                                <a href="<?php echo $algorithm['url']; ?>" title="<?php echo $algorithm['name']; ?>">
                                    <div class="panel panel-default panel-tool">
                                        <div class="panel-body">
                                            <!-- Dump string algorithms-->
                                            <?php echo $algorithm['name']; ?>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>


</div>

<!--include the website footer file.-->
<?php include_once('includes/html/footer.php'); ?>

</body>
</html>