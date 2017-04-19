<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $company_name; ?> | Easy!Appointments</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="icon" type="image/x-icon"
          href="<?php echo $base_url; ?>/assets/img/favicon.ico">

    <?php
        // ------------------------------------------------------------
        // INCLUDE CSS FILES
        // ------------------------------------------------------------ ?>
 <!--    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo $base_url; ?>/assets/ext/bootstrap/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo $base_url; ?>/assets/ext/jquery-ui/jquery-ui.min.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo $base_url; ?>/assets/ext/jquery-qtip/jquery.qtip.min.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo $base_url; ?>/assets/ext/jquery-jscrollpane/jquery.jscrollpane.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo $base_url; ?>/assets/css/backend.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="<?php echo $base_url; ?>/assets/css/general.css">

    <?php
        // ------------------------------------------------------------
        // INCLUDE JAVASCRIPT FILES
        // ------------------------------------------------------------ ?>
    <script
        type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/jquery/jquery.min.js"></script>
    <script
        type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/bootstrap/js/bootstrap.min.js"></script>
    <script
        type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/jquery-ui/jquery-ui.min.js"></script>
    <script
        type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/jquery-qtip/jquery.qtip.min.js"></script>
    <script
        type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/datejs/date.js"></script>
    <script
        type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/jquery-jscrollpane/jquery.jscrollpane.min.js"></script>
    <script
        type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/jquery-mousewheel/jquery.mousewheel.js"></script>

   <!--  <script type="text/javascript">
    	// Global JavaScript Variables - Used in all backend pages.
    	var availableLanguages = <?php echo json_encode($this->config->item('available_languages')); ?>;
    	var EALang = <?php echo json_encode($this->lang->language); ?>;
    </script> -->
</head>

<body>
<nav id="header" class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <div id="header-logo" class="navbar-brand">
                <img src="<?php echo $base_url; ?>/assets/img/logo.png">
                <span><?php echo $company_name; ?></span>
            </div>
            
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-menu" 
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        

        <div id="header-menu" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <?php if ($this->session->userdata('useremail')){?>
                <li class="active">
                    <a href="<?= $base_url; ?>" class="menu-item">
                        Home
                    </a>
                </li>

                <li>
                    <a href="<?= $base_url?>appointments" class="menu-item">
                        Add Appoinments
                    </a>
                </li>
                <li>
                    <a href="<?= $base_url?>student/logout" class="menu-item">
                        Logout
                    </a>
                </li>
<?php }else {
//                   echo '<pre>';
//                   print_r($_SESSION);
               }?>
            </ul>
        </div>
    </div>
</nav>

<div id="notification" style="display: none;"></div>

<div id="loading" style="display: none;">
    <img src="<?php echo $base_url; ?>/assets/img/loading.gif" />
</div>
