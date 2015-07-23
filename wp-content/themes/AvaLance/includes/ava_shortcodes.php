<?php
// Columns
function ava_column($atts, $content = null) {
    extract( shortcode_atts( array(
        'width' => '1/2',
        'place' => 'alpha',
        'custom_class' => ''
        ), $atts ) );

    switch ( $width ) {
        case "full" :
        $w = "columns sixteen";
        break;
        
        case "1/2" :
        $w = "columns eight";
        break;

        case "1/3" :
        $w = "column one-third";
        break;

        case "2/3" :
        $w = "column two-thirds";
        break;

        case "1/4" :
        $w = "four columns";
        break;

        case "3/4" :
        $w = "twelve columns";
        break;

        case "one" : $w = "one columns"; break;
        case "two" : $w = "two columns"; break;
        case "three" : $w = "three columns"; break;
        case "four" : $w = "four columns"; break;
        case "five" : $w = "five columns"; break;
        case "six" : $w = "six columns"; break;
        case "seven" : $w = "seven columns"; break;
        case "eight" : $w = "eight columns"; break;
        case "nine" : $w = "nine columns"; break;
        case "ten" : $w = "ten columns"; break;
        case "eleven" : $w = "eleven columns"; break;
        case "twelve" : $w = "twelve columns"; break;
        case "thirteen" : $w = "thirteen columns"; break;
        case "fourteen" : $w = "fourteen columns"; break;
        case "fifteen" : $w = "fifteen columns"; break;
        case "sixteen" : $w = "sixteen columns"; break;
        

        default :
        $w = 'columns sixteen';
    }
    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = 'alpha';
    }

    $column ='<div class="'.$w.' '.$custom_class.' ';
    $column .= $p.'">'.do_shortcode( $content ).'</div>';
    if($place=='last') $column .= '<br class="clear" />';
    return $column;
} add_shortcode('column', 'ava_column');

// Titles
function ava_titles($atts, $content = null) {
    extract( shortcode_atts( array('type' => 'h3'), $atts ) );

    switch ( $type ) {
        case "h1" : $h = "h1"; break;	
        case "h2" : $h = "h2"; break;
        case "h3" : $h = "h3"; break;
        case "h4" : $h = "h4"; break;
        case "h5" : $h = "h5"; break;
        case "h6" : $h = "h6";  break;
        default : $h = 'h3';
    }
	
    $title ='<'.$h.' class="'.$h.'">'.do_shortcode( $content ).'</'.$h.'>';
    return $title;
} add_shortcode('title', 'ava_titles');

// Divider
function ava_divider(){
	return '<div class="text-divider"></div>';
} add_shortcode('divider','ava_divider');

// Lead
function ava_lead($atts, $content){
	return '<p class="lead">'.do_shortcode( $content ).'</p><div class="divider"></div>';
} add_shortcode('lead','ava_lead');

// Buttons
function ava_button($atts, $content = null) {
    extract(shortcode_atts(array(
        "src" => '',
        "size" => 'medium'
    ), $atts));

    $output = '<a href="'. $src .'" class="ava-btn '. $size .'"> '. $content .'</a>';
    return $output;
}
add_shortcode('button', 'ava_button');

// Clients
function ava_clients($atts, $content){
    extract(shortcode_atts(array(
		"title" => 'Our Clients'
	), $atts));
	return '<div class="sixteen columns alpha clients"><br /><h2 class="h2">'.$title.'</h2>'.do_shortcode( $content ).'</div>';
} add_shortcode('clients','ava_clients');

// List
function ava_list($atts, $content){
	return '<div class="ava-list">'.$content.'</div>';
} add_shortcode('list','ava_list');
?>