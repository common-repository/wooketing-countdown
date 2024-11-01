<?php
	/*
	Plugin Name: Wooketing Countdown
	Plugin URI: http://wordpress.org/
	Description: Wooketing countdown timer display on woocommerce single product
	Author: HieuNguyen
	Author URI: http://wooketing.com
	Version: 1.0.2
	Text Domain: wooketing
	License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
	*/

	if(!defined('ABSPATH')) {
		header('HTTP/1.0 403 Forbidden');
		exit;
	}

	define('WK_COUNTDOWN_VERSION', '1.0.2');
	define('WK_COUNTDOWN_PATH', dirname(__FILE__));
	define('WK_COUNTDOWN_BASE', plugins_url() . '/wooketing-countdown');
	define('WK_COUNTDOWN_ASSETS',  plugins_url() . '/wooketing-countdown/assets');


	/*
	 * Load js css
	*/
	function wk_countdown_script()
	{
		if ( is_product() ) {
			wp_enqueue_style( 'wk-style', WK_COUNTDOWN_ASSETS.'/wk-style.css', false, WK_COUNTDOWN_VERSION, 'screen' );

			wp_register_script( 'wk.jquery', WK_COUNTDOWN_ASSETS . '/wk.jquery.js', false, WK_COUNTDOWN_VERSION, true );
			wp_enqueue_script('wk.jquery');
		}

	}
	add_action('wp_enqueue_scripts','wk_countdown_script');


	add_action( 'woocommerce_single_product_summary', 'wooketing_product_single_countdown', 33 );
	function wooketing_product_single_countdown() {
		$html = '
			<div class="items-count" id="progress_bar"></div>
			<div id="clock-ticker" class="clearfix">
				<div class="block">
					<span class="flip-top" id="numdays">0</span><br>
					<span class="label">Days</span>
				</div>
				<div class="block">
					<span class="flip-top" id="numhours">4</span><br>
					<span class="label">Hours</span>
				</div>
				<div class="block">
					<span class="flip-top" id="nummins">17</span><br>
					<span class="label">Minutes</span>
				</div>
				<div class="block">
					<span class="flip-top" id="numsecs">36</span><br>
					<span class="label">Seconds</span>
				</div>
			</div>
		';

		echo $html;
	}