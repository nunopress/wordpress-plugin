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
     * Manage the configuration with Illuminate/Config
     *
     * @param null|string $item
     * @param null|mixed $default
     *
     * @return \Illuminate\Config\Repository|mixed|null
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
     * Get or save metadata
     *
     * @param string $type
     * @param int $id
     * @param string $key
     * @param bool $single
     * @param null|mixed $value
     * @param bool $unique
     *
     * @return mixed
     */
    public function meta($type, $id, $key, $single = true, $value = null, $unique = false);

    /**
     * Register WordPress hooks here
     *
     * @return mixed
     */
    public function registerHooks();

    /**
     * Run the plugin
     *
     * @return mixed
     */
    public function run();
}
