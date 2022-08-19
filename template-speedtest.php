<?php

/*
Template Name: Speedtest
*/

header('Content-Type: text/html; charset=UTF-8');
global $woo_options;
woo_content_before();
get_header();
woo_pagenav();
wp_reset_query();

if ($inputPost = filter_input_array(INPUT_POST)) {
    switch (key($inputPost)) {
        case 'speedtest_x':
            $url='https://fialka.speedtestcustom.com';
            break;
        case 'fireprobe_x':
            $url='https://fialka.fireprobe.net';
            break;
        case 'openspeedtest_x':
            $url='http://speed.fialka.tv:3000/';
            break;

        default:
            break;
    }
    echo preg_replace('/{URL}/', $url, file_get_contents(__DIR__ .'/iframe.tpl'));
} else {
    echo(file_get_contents(__DIR__.'/systemSelection.tpl'));
}
get_footer();
