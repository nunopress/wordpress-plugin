<?php

namespace NunoPress\WP\Plugin;

/**
 * Interface PluginInterface
 *
 * @package NunoPress\WP\Plugin
 */
interface PluginInterface
{
    /**
     * PluginInterface constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = []);

    /**
     * Register WordPress hooks here
     *
     * @return mixed
     */
    public function registerHooks();

    /**
     * Manage the configuration with Illuminate/Config
     *
     * @param null|string $item
     * @param null|mixed $default
     *
     * @return mixed
     */
    public function config($item = null, $default = null);

    /**
     * Render template
     *
     * @param string $template
     * @param array $data
     * @param bool $return
     *
     * @return mixed
     */
    public function render($template, array $data = [], $return = false);

    /**
     * Run the plugin
     *
     * @return mixed
     */
    public function run();
}
