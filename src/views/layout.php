<!DOCTYPE html>
<!-- Layout : structure générale de mon application, càd le cadre -->
<html>
    <?php
        /**
         * Include the head via the extracted viewParameters.php transmitted
         * by the controller
         */
        include_once $head_inc;
            
        /**
         * Include the header via the extracted viewParameters.php transmitted
         * by the controller
         */
        include_once $header_inc;
    ?>
        
    <body>
            <h1><?php echo $title; ?></h1>
		<?php echo $content; ?>
    </body>
    
    <?php
        /**
         * Include the footer via the extracted viewParameters.php transmitted
         * by the controller
         */
        include_once $footer_inc;
    ?>
    
</html>