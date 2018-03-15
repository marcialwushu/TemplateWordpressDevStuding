
<html <?php language_attributes(); ?> >
<head>
<meta charset=<?php bloginfo('charset'); ?> >
<title><?php bloginfo('name'); ?>  <?php wp_title(); ?> <?php ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->

<?php wp_head(); ?>


<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />




<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php 
                    
                    $custom_logo_id = get_theme_mod('custom-logo');
                    $image = wp_get_attachment_image_src($custom_logo_id,'full');
                    $image[0];
                    
                    ?>

                    <img src="<?php echo $image[0]; ?>">


                    <?php /*<a class="navbar-brand" href="index.html"><span>M</span>oderna</a> */?>
                </div>   
                
                <div class="navbar-collapse collapse">

                    <?php //wp_nav_menu(array('theme_location'=>'primary')); 
                    
                            $args=array(
                                'theme_location'=>'primary',
                                'depth'         => '0',
                                'container'     =>false,
                                'menu_class'    =>'nav navbar-nav',
                                'walker'	 => new BootstrapNavMenuWalker()
                            );

                            

                        wp_nav_menu($args);
                
                    ?>

<script type="text/javascript">
		jQuery(document).ready(function($) {
	  $('ul.sub-menu li.dropdown, ul.sub-menu li.dropdown-submenu').hover(function() {
			$(this).find(' > .dropdown-menu').stop(true, true).delay(200).fadeIn();
		}, function() {
			$(this).find(' > .dropdown-menu').stop(true, true).delay(200).fadeOut();
		});
	});	
</script>




                    

                    <?php /*?><ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="components.html">Components</a></li>
								<li><a href="pricingbox.html">Pricing box</a></li>
                            </ul>
                        </li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li class="active"><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul><?php */?>
                </div>
            </div>
        </div>
	</header>
</div>
</body>
</html>