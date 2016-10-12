<?php

namespace NunoPress\WP\Plugin;

use Illuminate\Config\Repository;

/**
 * Class PluginFactory
 *
 * @package NunoPress\WP\Plugin
 */
abstract class PluginFactory implements PluginInterface
{
    /**
     * @var Repository|null
     */
    protected $config = null;

    /**
     * PluginFactory constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (null === $this->config) {
            $this->config = new Repository($options);
        }
    }

    /**
     * @param null|string $item
     * @param null|mixed $default
     *
     * @return Repository|mixed|null
     */
    public function config($item = null, $default = null)
    {
        return (null === $item) ? $this->config : $this->config->get($item, $default);
    }

    /**
     * @param string $template
     * @param array $data
     * @param bool $return
     *
     * @return bool|string
     */
    public function render($template, array $data = [], $return = false)
    {
        if (false === file_exists($template)) {
            return false;
        }

        ob_start();

        extract($data);

        include $template;

        $content = ob_get_clean();

        if (true === $return) {
            return $content;
        } else {
            echo $content;
        }
    }

    /**
     * Register WordPress hooks here
     */
    public function registerHooks()
    {
        throw new \Exception(sprintf(
                'You need to implement %s in %s class.',
                __METHOD__,
                get_called_class()
        ));
    }

    /**
     * @param string $type
     * @param int $id
     * @param string $key
     * @param bool $single
     * @param mixed $value
     * @param bool $unique
     *
     * @return mixed
     */
    public function meta($type, $id, $key, $single = true, $value = null, $unique = false)
    {
        return (null === $value) ? get_metadata($type, $id, $key, $single) : add_metadata($type, $id, $key, $value, $unique);
    }

    /**
     * Run the plugin
     */
    public function run()
    {
        $this->registerHooks();
    }
}
