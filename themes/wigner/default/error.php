<?php
/**
 * Do not allow to frame simpleSAMLphp pages from another location.
 * This prevents clickjacking attacks in modern browsers.
 *
 * If you don't want any framing at all you can even change this to
 * 'DENY', or comment it out if you actually want to allow foreign
 * sites to put simpleSAMLphp in a frame. The latter is however
 * probably not a good security practice.
 */
header('X-Frame-Options: SAMEORIGIN');
?>
<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <meta name="HandheldFriendly" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noarchive, nofollow" />';
    
    <title>
<?php if (array_key_exists('header', $this->data)) {
        echo $this->data['header'];
} else {
        echo 'simpleSAMLphp';
}
?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML\Module::getModuleURL('themewigner/style.css'); ?>" />
    <link rel="stylesheet" media="screen and (max-width: 370px)" href="<?php echo SimpleSAML\Module::getModuleURL('themewigner/style_320.css'); ?>" />
    <link rel="stylesheet" media="screen and (max-device-width: 480px), handheld" href="<?php echo SimpleSAML\Module::getModuleURL('themewigner/style_480.css'); ?>" />

</head>

<body class="storing">

    <div id="wrapper">


        <div id="header">
            <img id="logo" src="<?php echo SimpleSAML\Module::getModuleURL('themewigner/wigner_logo.png'); ?>" />
            <h1 class="mainTitle"></h1>

        </div>

        <div id="content">
            <div class="item">
                <h1><?php echo $this->t($this->data['dictTitle']); ?></h1>
                <p><?php echo htmlspecialchars($this->t($this->data['dictDescr'], $this->data['parameters']));?></p>
                <p>

                    <?php echo $this->t('report_trackid'); ?>
                    <?php echo $this->data['error']['trackId']; ?>
                </p>        
            </div>  
        </div>
        
    </div>
</body>
</html>
