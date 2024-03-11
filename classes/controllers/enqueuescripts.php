<?php
namespace controllers;

class EnqueueScripts
{

    private $version;

    public function __construct()
    {

        add_action('wp_enqueue_scripts', [ &$this, 'init' ], 100);
    }

    public function init()
    {

        $this->styles();
        $this->javascript();
    }

    /**
     * Css
     * @return void
     */
    private function styles()
    {

        wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/bundle.css', [], null);

        /**
         * Remove Styles
         */
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style');
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-smallscreen');
        wp_dequeue_style('woocommerce-general');

    }

    /**
     * Java Script
     * @return void
     */
    private function javascript()
    {

        //Bundle
        wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/bundle.js', ['jquery'], null, true);

        $script_data_array = [
            'ajaxurl' => admin_url('admin-ajax.php'),
        ];
        wp_localize_script('script', 'ajax_global_handle', $script_data_array);
    }
}
