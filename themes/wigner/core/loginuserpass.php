<?php
header('X-Frame-Options: SAMEORIGIN');

?>
<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="HandheldFriendly" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="robots" content="noindex, nofollow" />
    <title>
<?php
if (array_key_exists('header', $this->data)) {
        echo $this->data['header'];
} else {
        echo 'simpleSAMLphp';
}
?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML\Module::getModuleURL('themewigner/style.css'); ?>" />
    <link rel="stylesheet" media="screen and (max-width: 370px)" href="<?php echo SimpleSAML\Module::getModuleURL('themewigner/style_320.css'); ?>" />
    <link rel="stylesheet" media="screen and (max-device-width: 480px), handheld" href="<?php echo SimpleSAML\Module::getModuleURL('themewigner/style_480.css'); ?>" />

    <script type="text/javascript">
    function initiate(){
        document.getElementById('username').focus();
    }
    </script>

</head>

<body class="index" onload="initiate()">
    <div id="wrapper">
        <div id="header">
            <img id="logo" src="<?php echo SimpleSAML\Module::getModuleURL('themewigner/wigner_logo.png'); ?>" />
            <img id="logo" src="<?php echo SimpleSAML\Module::getModuleURL('themewigner/ek_logo.png'); ?>" />
            <h1 class="mainTitle"></h1>
<?php if (!isset($_POST['username'])) : ?>
            <ul class="langSelect">

<?php

    $languages = array(
        "hu" => '',
        "en" => ''
    );

    $langnames = array();
    foreach ($languages as $k => $v) {
        $langnames[$k] = strtoupper($k);
    }
    $textarray = array();
    foreach ($languages as $lang => $current) {
        $lang = strtolower($lang);
        if ($lang == 'hu' || $lang == 'en') {
            if ($current) {
                $textarray[] = '<li class="active">' . $langnames[$lang] . "</li>";
            } else {
                $textarray[] = '<li><a href="' . htmlspecialchars(SimpleSAML_Utilities::addURLparameter(SimpleSAML_Utilities::selfURL(), array('language' => $lang))) . '">' .
                    $langnames[$lang] . '</a></li>';
            }
        }
    }
    echo join($textarray);

?>
            </ul>
<?php endif; ?>
        </div>

        <div id="content">

<div class="item">

<?php if ($this->data['errorcode'] !== null) : ?>

    <p class="error"><?php echo $this->t('{errors:descr_' . $this->data['errorcode'] . '}'); ?></p>
    <h1 align="center"><?php echo $this->t('{login:help_header}');?></h1>
    <div class="createIndex" style="width:95%">
        <p><?php echo $this->t('{login:help_text}');?></p>
    </div>
    
<?php endif; ?>



                <form id="login" method="POST" action="?" name="f">
                    <label for="username"><?php echo $this->t('{login:username}'); ?></label> <span class="example">(<?php echo $this->t('{themewigner:themewigner:help_example}');?>.: pelda.pal@wigner.mta.hu)</span>
                    <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($this->data['username']); ?>" autocomplete= "on" />
                    <label for="password"><?php echo $this->t('{login:password}'); ?></label>
                    <input type="password" name="password" id="password" autocomplete= "on" />
                    <input type="submit" name="submit" id="submit" value="<?php echo $this->t('{login:login_button}'); ?>" />

<?php
foreach ($this->data['stateparams'] as $name => $value) {
    echo('<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" />');
}
?>

                </form>
            </div>

            <div class="subitem">
                <!--
              <div class="createIndex">
                <h2><?php echo $this->t('{login:help_header}');?></h2>
                <p><?php echo $this->t('{login:help_text}');?></p>
             </div>-->
            </div>

        </div>

        </div>
</body>
</html>
