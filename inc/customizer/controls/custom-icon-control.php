<?php 
/**
 *
 * @package Bidaya
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (class_exists('WP_Customize_Control')) {
    class Icon_Picker_Custom_Control extends WP_Customize_Control {
        public $type = 'icon-picker';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <select <?php $this->link(); ?>>
                    <option value="fa-star" <?php selected($this->value(), 'fa-star'); ?>>Star</option>
                    <option value="fa-heart" <?php selected($this->value(), 'fa-heart'); ?>>Heart</option>
                    <!-- Add more options -->
                </select>
            </label>
            <?php
        }
    }
}