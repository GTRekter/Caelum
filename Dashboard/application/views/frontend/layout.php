<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>L'Ibiscoblu Allevamento e Pensione</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Ivan Porta, Andrea Giada Bassani">
        <meta name="description" content="Ibiscoblu è un allevamento canino certificato ENCI e FCI situato a Bergamo, in Lombardia (Italia). È anche una pensione accogliente e sicura per gatti e cani.">
        <!--IMPORTANT--><meta name='keywords' content='DA METTERE'>
        <meta name='language' content='IT'>

        <!-- FAVICON CODE -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->config->item('contents_img'); ?>/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $this->config->item('contents_img'); ?>/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->config->item('contents_img'); ?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->config->item('contents_img'); ?>/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->config->item('contents_img'); ?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $this->config->item('contents_img'); ?>/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        
        <style>
            @font-face {
                font-family: "Chapaza";
                src: url(<?php echo $this->config->item('contents_font'); ?>/chapaza/Chapaza.ttf) format("embedded-truetype"),
                src: url(<?php echo $this->config->item('contents_font'); ?>/chapaza/Chapaza.eot) format("embedded-opentype"), 
            }
            @font-face {
                font-family: "MoonLight";
                src: url(<?php echo $this->config->item('contents_font'); ?>/moon/MoonLight.ttf) format("embedded-truetype"),
                src: url(<?php echo $this->config->item('contents_font'); ?>/moon/MoonLight.eot) format("embedded-opentype"), 
            }

            /* ==== BACKGROUND ==== */
            #homepage-header {
                background-image: url(<?php echo $this->config->item('contents_img'); ?>/frontend/homepage-header.jpg);
            }
            #homepage .section-breeding .section-left-side {
                background-image: url(<?php echo $this->config->item('contents_img'); ?>/frontend/homepage-breeding.jpg);
            }
            #homepage .section-retire .section-left-side {
                background-image: url(<?php echo $this->config->item('contents_img'); ?>/frontend/homepage-retire.jpg);
            }
            #retire-header {
                background-image: url(<?php echo $this->config->item('contents_img'); ?>/frontend/pensione.jpg);
            }
            #contact .contact-header {
                background-image: url(<?php echo $this->config->item('contents_img'); ?>/frontend/sfondocontatti.jpg);
            }
            #breeding-header {
                background-image: url(<?php echo $this->config->item('contents_img'); ?>/frontend/bulldog.jpg);
            }
        </style>
        
        <link href="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet" />  
        <link href="<?php echo $this->config->item('libraries_url'); ?>/animate/css/animate.css" rel="stylesheet">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?php echo $this->config->item('contents_css'); ?>/frontend.css" rel="stylesheet">
        
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

	<body id="page-top"
		data-content-img-url="<?php echo $this->config->item('contents_img'); ?>"
        data-base-url="<?php echo base_url('index.php/'); ?>">
        
        <?php echo $navBar; ?>
        <?php echo $homepage; ?>
        <?php echo $about; ?>
        <?php echo $contact; ?>
        <?php echo $retire; ?>
        <?php echo $breeding; ?>
        <?php echo $footer; ?>
          
        <script src="<?php echo $this->config->item('libraries_url'); ?>/jquery/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->config->item('libraries_url'); ?>/wow.js/js/wow.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->config->item('libraries_url'); ?>/isotope/js/isotope.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->config->item('contents_js'); ?>/frontend.js" type="text/javascript"></script>
	</body>
</html>