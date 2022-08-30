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
            $url='https://speed.fialka.tv:3001/';
            break;

        default:
            break;
    }
    if ($url) {
        $speedtest = "<iframe scrolling='no' src='$url' style='width: 90vw; height: 90vh; overflow: hidden; border: none;'></iframe>";
    } else {
        $speedtest = '<script src="https://ws.nperf.com/partner/js?k=2716fe83-5c8c-4ffa-859b-521ef926ffd5&sp=7418"></script>';
    }
    echo preg_replace('/{SPEEDTEST}/', $speedtest, file_get_contents(__DIR__ .'/iframe.tpl'));
} else {
    echo(file_get_contents(__DIR__.'/systemSelection.tpl'));
}
get_footer();
