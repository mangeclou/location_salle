<!DOCTYPE html>
<!-- Layout : structure générale de mon application, càd le cadre -->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link media="all" rel="stylesheet" type="text/css" href="/web/css/styles.css">
        <link rel="stylesheet" href="/../../js/jquery-ui-1.11.2.custom/jquery-ui.min.css" type="text/css">
        
        <script src="/../../web/js/jquery-2.1.3.js"></script>
        <script src="/../../web/js/jquery-ui-1.11.2.custom/webexternal/jquery/jquery.js"></script>
        <script src="/../../web/js/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
        <script src="/../../web/js/main.js"></script>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        
    </head>
    <body>
            <h1><?php echo $title; ?></h1>
		<?php echo $content; ?>
	</body>
</html>