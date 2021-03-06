<?php
/**
 *
 *  * Open Source Project made by Daksh (daksh7011.com)
 *  * Do NOT remove this excerpt even if you fork this or use it by any means.
 *  * This project is Licenced under GNU GENERAL PUBLIC LICENSE Version 3
 *
 *
 */

// require the website config file.
require_once('includes/config.php');

// set the title, description & response.
$algorithm = (isset($_GET['slug']) ? Eagle::slugToAlgorithm($_GET['slug']) : false);
if ($algorithm) {
    $website['title'] = ucwords($algorithm['name']);
    $website['description'] = 'Use the ' . $algorithm['name'] . ' ' . $algorithm['type'] . ' algorithm on your strings.';
    $website['response'] = (isset($_POST['submit']) ? Eagle::magicMethod($algorithm, $_POST) : false);
} else {
    header('location: ../');
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en"">
<head>

    <!-- meta tags -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title><?php echo $website['title']; ?></title>
    <meta name="description" content="<?php echo $website['description']; ?>"/>

    <!-- favicon that doesnt exist -->
    <link href="<?php echo $website['url']; ?>assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="<?php echo $website['url']; ?>assets/img/favicon.ico" rel="icon" type="image/x-icon"/>

    <!-- stylesheets -->
    <link href="<?php echo $website['url']; ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $website['url']; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $website['url']; ?>assets/css/styles.css?t=<?php echo time(); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css">
    <!-- javascript -->
    <script src="<?php echo $website['url']; ?>assets/js/bootstrap.js" type="text/javascript"></script>

</head>
<body>

<!--include the header and hero files.-->
<?php include_once('includes/html/header.php'); ?>
<?php include_once('includes/html/hero.php'); ?>

<!-- main -->
<div id="main" class="algo">
    <div class="section">
        <div class="container">
            <div class="section-information">
                <h2><?php echo ucfirst($algorithm['name']); ?></h2>
                <p>Use the <?php echo $algorithm['name']; ?> <?php echo $algorithm['type']; ?> algorithm on your
                    strings.</p>
            </div>
            <form method="post" action="<?php echo $website['current']; ?>" id="algorithm-form">
                <?php if ($algorithm['type'] == 'hash'): ?>
                    <div class="form-group"><input type="text" name="salt" placeholder="salt (optional)"
                                                   class="form-control input-lg"/></div>
                <?php endif; ?>
                <div class="form-group"><textarea name="string" placeholder="string"
                                                  class="form-control input-lg"><?php if ($website['response']) {
                            echo $website['response'];
                        } ?></textarea></div>
                <button type="submit" name="submit" class="btn btn-blue btn-lg"><?php echo $algorithm['name']; ?> my
                    string
                </button>
            </form>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="section-information">
                <h2>More algorithms</h2>
                <p>Here is some more algorithms for you to use on your strings.</p>
            </div>
            <div class="algorithm-list">
                <?php foreach ($website['more'] as $key): ?>
                    <div class="col-md-3">
                        <a href="<?php echo $website['algorithms'][$key]['url']; ?>"
                           title="<?php echo $website['algorithms'][$key]['name']; ?>">
                            <div class="panel panel-default panel-tool">
                                <div class="panel-body">
                                    <?php echo $website['algorithms'][$key]['name']; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- include the footer file. -->
<?php include_once('includes/html/footer.php'); ?>

</body>
</html>