<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right') . bloginfo('name') ?></title>

    <!--
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/img/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>/img/apple-touch-icon-precomposed.png">
    -->

    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url') ?>/css/all.css" />



    <?php wp_head() ?>
</head>
<body>

<div class="header_wrap">
    <div class="header">
        <div class="texture"></div>
        <ul class="quick_links">
            <?php if (get_theme_mod('facebook')){ ?>
                <li class="facebook">
                    <a href="<?=get_theme_mod('facebook')?>" target="_blank">
                        Facebook
                    </a>
                </li>
            <?php } ?>
            <?php if (get_theme_mod('twitter')){ ?>
                <li class="twitter">
                    <a href="<?=get_theme_mod('twitter')?>" target="_blank">
                        Twitter
                    </a>
                </li>
            <?php } ?>
            <?php if (get_theme_mod('member_login')){ ?>
                <li class="login">
                    <a href="<?=get_theme_mod('member_login')?>" rel="nofollow">
                        Member Login
                    </a>
                </li>
            <?php } ?>
        </ul>
        <a href="/" class="logo"><?php bloginfo('blogname')?></a>
    </div>
</div>

<div class="menu_wrap">
    <?php wp_nav_menu([
        'theme_location' => 'main_menu',
        'depth' => 1
    ]) ?>
</div>

<div class="content_wrap">
    <div class="content">
        <div class="join_us">
            <h2>Join us this Sunday</h2>
            <ul>
                <?php if (get_theme_mod('church_address')){ ?>
                    <li class="church_address">
                        <h3>Worship with us:</h3>
                        <p><?=get_theme_mod('church_address')?></p>
                    </li>
                <?php } ?>
                <?php if (get_theme_mod('service_times')){ ?>
                    <li class="service_times">
                        <h3>Service times:</h3>
                        <p><?=get_theme_mod('service_times')?></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="page">

            <!-- Banner -->
            <div class="banner">
                <?php if (has_post_thumbnail($post->ID)): ?>
                    <?=get_the_post_thumbnail($post->ID, (is_front_page() and get_theme_mod('banner')) ? 'banner_large' : 'banner_small') ?>
                <?php endif ?>
            </div>

            <!-- Sub menu -->
            <?php if($post->post_parent) {
                 $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
            } else {
                 $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
            } if ($children) { ?>
                <div class="sub_menu_wrap">
                    <ul class="sub_menu" >
                        <?php echo $children; ?>
                    </ul>
                </div>
            <?php } ?>

            <div class="wysiwyg">