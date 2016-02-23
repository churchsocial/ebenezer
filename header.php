<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right').bloginfo('name') ?></title>
    <meta name="description" content="<?php bloginfo('description')?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url') ?>/css/all.css" />
    <script src="<?php bloginfo('template_url') ?>/js/respond.js"></script>
    <?php wp_head() ?>
</head>

<body>

<div class="header_wrap">
    <div class="header">
        <div class="texture"></div>
        <ul class="quick_links">
            <?php if (get_theme_mod('facebook')): ?>
                <li class="facebook">
                    <a href="<?=get_theme_mod('facebook')?>" target="_blank">
                        Facebook
                    </a>
                </li>
            <?php endif ?>
            <?php if (get_theme_mod('twitter')): ?>
                <li class="twitter">
                    <a href="<?=get_theme_mod('twitter')?>" target="_blank">
                        Twitter
                    </a>
                </li>
            <?php endif ?>
            <?php if (get_theme_mod('member_login')): ?>
                <li class="login">
                    <a href="<?=get_theme_mod('member_login')?>" rel="nofollow">
                        Member Login
                    </a>
                </li>
            <?php endif ?>
        </ul>
        <a href="/" class="logo"><?php bloginfo('blogname')?></a>
    </div>
</div>

<div class="menu_wrap">
    <?php wp_nav_menu([
        'theme_location' => 'main_menu',
        'depth' => 1,
        'menu_class' => 'menu',
        'container' => '',
    ]) ?>
</div>

<div class="content_wrap">
    <div class="content">
        <div class="join_us">
            <h2>Join us this Sunday</h2>
            <ul>
                <?php if (get_theme_mod('church_address')): ?>
                    <li class="church_address">
                        <h3>Worship with us:</h3>
                        <p><?=get_theme_mod('church_address')?></p>
                    </li>
                <?php endif ?>
                <?php if (get_theme_mod('service_times')): ?>
                    <li class="service_times">
                        <h3>Service times:</h3>
                        <p><?=get_theme_mod('service_times')?></p>
                    </li>
                <?php endif ?>
            </ul>
        </div>
        <div class="page">

            <div class="banner">
                <?php if (has_post_thumbnail($post->ID)): ?>
                    <?=get_the_post_thumbnail($post->ID, (is_front_page() and get_theme_mod('banner')) ? 'banner_large' : 'banner_small') ?>
                <?php endif ?>
            </div>

            <div class="sub_menu_wrap">
                <?=get_sub_menu()?>
            </div>

            <div class="wysiwyg">