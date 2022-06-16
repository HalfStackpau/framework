<?php
//src/helpers.php
    /** Require a view.
     *
     * @param  string $name
     * @param  array  $data
     */
    function view($name, $data = [])
    {
        extract($data);

        return require "src/views/{$name}.view.php";
    }
    function root()
    {
        if ($_ENV['ROOT'] == '/') {
            return '';
        }
        return $_ENV['ROOT'];
    }
