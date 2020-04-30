<?php
// Class allows us to acces our config inside $GLOBALS easily
class Config
{

    // Path defaults to null
    public static function get($path = null)
    {
        // Check if $path was set
        if ($path) {
            $config = $GLOBALS['config'];

            // Explode splits a string up by its first parameter, creates an array
            // e.g = $path was 'mysql/host' $path[0] would be mysql and $path[1] would be host
            $path = explode('/', $path);

            // loops over the array we just created
            foreach ($path as $bit) {

                if (isset($config[$bit])) {
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}
