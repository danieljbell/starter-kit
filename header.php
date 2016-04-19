<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href='https://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:300,300italic,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/respond.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php if ( is_author() || is_category() || is_front_page() ) : ?>
<?php else : ?>
    <?php if( current_user_can('administrator') ) : ?>
        <?php edit_post_link(__('Edit This Post')); ?>
    <?php endif; ?>
<?php endif; ?>


<section id="site-top" class="animated">
    <div class="site-width">
        <div class="half-force">
            <div>
                <h1>
                    <?php if ( is_front_page() ) : ?>
                    <span class="brand-font">logo</span>
                    <?php else : ?>
                    <a href="<?php echo site_url(); ?>" class="brand-font">logo</a>
                    <?php endif; ?>
                </h1>
            </div>
            <div>
                <button id="menu-toggle" class="btn-secondary-outline"><a>menu</a></button>
            </div>
        </div>
        <section>
            <div class="half">
                <div>
                    <h1>Layout</h1>
                    <hr>
                    <ul>
                        <li><a href="<?php echo site_url(); ?>/sales-process/how-to-determine-your-ideal-customer-profile/">single.php</a></li>
                        <li><a href="<?php echo site_url(); ?>/sales-process/">category.php</a></li>
                        <li><a href="<?php echo site_url(); ?>/author/sharmin">author.php</a></li>
                        <li><a href="#standard-grid">Standard Grid</a></li>
                        <li><a href="#stack-grid">Stack Order Grid</a></li>
                        <li><a href="#force-grid">Force Grid</a></li>
                        <li><a href="#only-grid">Only Grid</a></li>
                        <li><a href="#responsive-table">Responsive Table</a></li>
                        <li><a href="#cards">Cards</a></li>
                        <li><a href="#number-cards">Number Cards</a></li>
                        <li><a href="#typography">Typography</a></li>
                        <li><a href="#forms">Forms</a></li>
                    </ul>
                </div>
                <div>
                    <h1>Javascript</h1>
                    <hr>
                    <ul>
                        <li><a href="#modals">Modals</a></li>
                        <li><a href="<?php echo site_url(); ?>/wp-admin">Login</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</section>

<div class="page-body">