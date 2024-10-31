<?php
/*
Plugin Name: Percent to Infograph
Plugin URI: http://www.nokhshi.com/plugins/percent_infograph
Description: Percent to Infograph represents simple percent (%) into Infograph with some effects. [percent_to_graph] Shortcode made it so simple, all you need is to copy shortcode with parameters to your post content area, for example: [percent_to_graph data_percent="70" data_text="70%"] . Parameters are optional, while you can adjust almost all values of your Infograph by passing values to those parameters/variables. Here is full list of variable with some example values: [percent_to_graph data_percent="30" data_text="30%" data_info=" Value&nbsp;Increased" data_width="25" data_fontsize="16" data_dimension="200" data_fgcolor="#E439A1" data_bgcolor="#eee" data_fill="#fff"]
Version: 1.0
Author: Salah Uddin
Author URI: http://www.profile.wordpress.com/cutesalah
*/

/*  Copyright YEAR  Salah Uddin  (email : cutesalah@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* @todo:
- automatically convert the number and put the data text automatically based on a bulean variable.
*/

/**
 * enqueue scripts and styles
 */
/***

function percent_infograph_test() {
    return'<div class="myStat" 
                data-percent="65" 
                data-text="65%" 
                data-info="Users Online" 
                data-width="25" 
                data-fontsize="20" 
                data-dimension="170" 
                data-fgcolor="#80E800" 
                data-bgcolor="#eee" 
                data-fill="#fff">
            </div>';
}
add_shortcode('percent_info', 'percent_infograph_test'); 
*/

function percent_infograph_scripts() {
    wp_enqueue_style("circlifulcss",plugins_url('/css/jquery.circliful.css', __FILE__), false,"1.0.0");
    wp_enqueue_script( 'circlifuljs', plugins_url('/js/jquery.circliful.min.js', __FILE__), array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'percent_infograph_scripts' );


function percent_infograph_active () {?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.myStat').circliful();
        });     
    </script>
<?php
}
add_action('wp_head','percent_infograph_active');




function percent_infograph_test($atts){
    extract( shortcode_atts( array(
                'data_percent'=> '100', 
                'data_text'=> '100%', 
                'data_info'=> '""', 
                'data_width'=> '25', 
                'data_fontsize'=> '18', 
                'data_dimension'=> '170', 
                'data_fgcolor'=> '#80E800', 
                'data_bgcolor'=> '#eee', 
                'data_fill'=> '#fff'
    ), $atts, 'per_info' ) );
    
    return '<div class="myStat" 
                data-percent=' . $data_percent . '
                data-text=' . $data_text . '
                data-info=' . $data_info . '
                data-width=' . $data_width . '
                data-fontsize=' . $data_fontsize . '
                data-dimension=' . $data_dimension . '
                data-fgcolor=' . $data_fgcolor . '
                data-bgcolor=' . $data_bgcolor . '
                data-fill=' . $data_fill . '></div>';
}
add_shortcode('percent_to_graph', 'percent_infograph_test');    

?>
