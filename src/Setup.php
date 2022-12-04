<?php

namespace Intimation\Catalyst;

final class Setup
{
    public function init(): void
    {
        $class_and_config = $this->get_config();
        foreach ($class_and_config as $class => $config) {
            if (class_exists($class)) {
                $class = new $class($config);
                $class->init();
            }
        }
    }

    protected function get_config(): array
    {
        return file_exists($this->get_config_path()) ? include_once $this->get_config_path() : [];
    }

    protected function get_config_path(): string
    {
        return get_theme_file_path('config/defaults.php');
    }
}
