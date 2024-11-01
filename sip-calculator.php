<?php
/**
* Plugin Name: SIP Calculator
* Description: This plugin allows you to Create SIP Calculator in wordpress.
* Version: 1.0
* Copyright: 2023
* Text Domain: sip-calculator
*/


// define for base name
if (!defined('SIPC_BASE_NAME')) {
	define('SIPC_BASE_NAME', plugin_basename(__FILE__));
}

// define for plugin file
if (!defined('SIPC_plugin_file')) {
	define('SIPC_plugin_file', __FILE__);
}

if (!defined('SIPC_PLUGIN_DIR')) {
  define('SIPC_PLUGIN_DIR',plugins_url('', __FILE__));
}

include_once('inc/sip_backend.php');
include_once('inc/sip_fronted.php');


function sip_calculator_load_admin_script(){
  wp_enqueue_script('jquery', false, array(), false, false);
  wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker-alpha', SIPC_PLUGIN_DIR . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '3.0.2', true );
	wp_add_inline_script(
		'wp-color-picker-alpha',
		'jQuery( function() { jQuery( ".color-picker" ).wpColorPicker(); } );'
	);
	wp_enqueue_script( 'wp-color-picker-alpha' );
	wp_enqueue_style( 'sip-admin-css', SIPC_PLUGIN_DIR . '/assets/css/sip_admin.css', false, '1.0.0' );
	wp_enqueue_script( 'sip-admin-script', SIPC_PLUGIN_DIR. '/assets/js/sip_backend.js', false, '1.0');

}
add_action( 'admin_enqueue_scripts', 'sip_calculator_load_admin_script' );

add_action( 'wp_enqueue_scripts','SIP_calculator_loadScriptStyle');
function SIP_calculator_loadScriptStyle() {
	wp_enqueue_script('jquery', false, array(), false, false);
	
	wp_enqueue_script( 'sip_calc_js', SIPC_PLUGIN_DIR . '/assets/js/sip_calc.js', false, '1.0.0' );
	wp_enqueue_script( 'sip_calc_front_js', SIPC_PLUGIN_DIR . '/assets/js/sip_calc_front.js', false, '1.0.0' );
	wp_enqueue_script( 'chart-js', SIPC_PLUGIN_DIR . '/assets/js/chart.js', false, '1.0.0' );
	wp_enqueue_script( 'popper-min-js', SIPC_PLUGIN_DIR . '/assets/js/popper.min.js', false, '1.0.0' );
	wp_enqueue_script( 'rangeslider-min-js', SIPC_PLUGIN_DIR . '/assets/js/rangeSlider.min.js', false, '2.3.0' );
	wp_enqueue_style( 'style-css', SIPC_PLUGIN_DIR . '/assets/css/style.css', false, '1.0.0' );
	wp_enqueue_style( 'rangeslider-css', SIPC_PLUGIN_DIR . '/assets/css/rangeslider.min.css', false, '2.3.0' );
  $sip_color_var =  array( 
    'investd_amount_color' => get_option('sip_investamount_color','rgba(188, 220, 255, 0.8)'),
    'profit_amount_color' => get_option('sip_profitamount_color','rgba(21, 58, 91, 0.44)'),
    'result_with_chart' => get_option('sip_enable_chart','true'),
    'result_with_table' => get_option('sip_enable_table','true'),
    'calc_chart_type' => get_option('sip_chart_type','doughnut_chart'),
    'calc_chart_invested_amount_text' => get_option('chart_invested_amount_text','Invested Amount'),
    'calc_chart_profit_earned_text' => get_option('chart_profit_earned_text','Profit Earned'),
    'sip_min_invested_amount' => get_option('min_invested_amount','100'),
    'sip_max_invested_amount' => get_option('max_invested_amount','100000'),
    'sip_min_investment_period' => get_option('min_investment_period','1'),
    'sip_max_investment_period' => get_option('max_investment_period','30'),
    'sip_min_expected_annual' => get_option('min_expected_annual','1'),
    'sip_max_expected_annual' => get_option('max_expected_annual','30'),
  );
  wp_localize_script( 'sip_calc_front_js', 'sip_calc_style', $sip_color_var);
}

?>