<?php
class Redirect
{
    public static function redirectTo($location = null)
    {
        if ($location) {
            // if $location is a number, it'll be an error code 
            if (is_numeric($location)) {
                // Can be expanded to include other error codes
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        break;
                }
            }

            header('Location: ' . $location);
            exit();
        }
    }
}
