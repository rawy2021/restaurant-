<?php
/**
 * Custom Customizer Controls.
 *
 * @package EnterNews
 */


/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'cl_res_GeneratePress_Upsell_Section' ) ) {
    /**
     * Create our upsell section.
     * Escape your URL in the Customizer using esc_url().
     *
     * @since unknown
     */
    class cl_res_GeneratePress_Upsell_Section extends WP_Customize_Section {
        /**
         * Set type.
         *
         * @var public $type
         */
        public $type = 'gp-upsell-section';

        /**
         * Set pro URL.
         *
         * @var public $pro_url
         */
        public $pro_url = '';

        /**
         * Set pro text.
         *
         * @var public $pro_text
         */
        public $pro_text = '';

        /**
         * Set ID.
         *
         * @var public $id
         */
        public $id = '';

        /**
         * Send variables to json.
         */
        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['id'] = $this->id;
            return $json;
        }

        /**
         * Render content.
         */
        protected function render_template() {
            ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>   
            <?php
        }
    }
}
if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'cl_res_Cls_Res_Customize_Section_Upsell' ) ) {
    /**
     * Create our upsell section.
     * Escape your URL in the Customizer using esc_url().
     *
     * @since unknown
     */
    class cl_res_Cls_Res_Customize_Section_Upsell extends WP_Customize_Section {
        /**
         * Set type.
         *
         * @var public $type
         */
        public $type = 'gp-upsell-section';

        /**
         * Set pro URL.
         *
         * @var public $pro_url
         */
        public $pro_url = '';

        /**
         * Set pro text.
         *
         * @var public $pro_text
         */
        public $pro_text = '';

        /**
         * Set ID.
         *
         * @var public $id
         */
        public $id = '';

        /**
         * Send variables to json.
         */
        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['id'] = $this->id;
            return $json;
        }

        /**
         * Render content.
         */
        protected function render_template() {
            ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>   
            <?php
        }
    }
}