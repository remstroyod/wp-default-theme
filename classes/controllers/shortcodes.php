<?php
namespace controllers;

class Shortcodes
{

    private static $instance;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        add_filter('widget_text', 'do_shortcode');

    }

    public static function getInstance()
    {
        if (!Shortcodes::$instance instanceof self) {
            Shortcodes::$instance = new self();
        }
        return Shortcodes::$instance;
    }
}
