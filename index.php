  
<?php

/**
 * This is an example of a front controller for a flat file PHP site. Using a
 * Static list provides security against URL injection by default. See README.md
 * for more examples.
 */
# [START gae_simple_front_controller]
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'homepage.php';
        break;
    case '/work.php':
        require 'work.php';
        break;
    case '/createdb.php':
        require 'createdb.php';
        break;
    case '/change.php':
        require 'change.php';
        break;
    case '/insert.php':
        require 'insert.php';
        break;
    case '/buy.php':
        require 'buy.php';
        break;
    case '/destroy.php':
        require 'destroy.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}
# [END gae_simple_front_controller]