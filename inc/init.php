<?php
/**
 * Console pageessing script(s)
 *
 * @package     Controllers\Init
 * @category    Controllers
 * @author      Justin D. Byrne <justin@byrne-systems.com>
 * @version     $Id$
 */

require 'psl-config.php';

# Instantiate: mysqli object for MySQL control
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

# Check: database connection connection
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

echo "MySQLi Successful!";

session_start();                                        # Start: session to carry session data

echo $_SESSION['page'];

# Master: switch construct operating according the passed '$page' variable
switch ($_SESSION['page']) {

  case 'about':
    $_SESSION['page'] = 'about';                        # Set: session variables for about page
    header('http://localhost/about');
  break;

  case 'blog':
    $_SESSION['page'] = 'blog';                         # Set: session variables for blog page
    header('http://localhost/blog');
  break;

  case 'contact':
    $_SESSION['page'] = 'contact';                      # Set: session variables for contact page
    header('http://localhost/contact');
  break;

  case 'projects':
    $_SESSION['page'] = 'projects';                     # Set: session variables for projects page
    header('http://localhost/projects');
  break;

  case '404':
    $_SESSION['page'] = '404';                          # Set: session variables for contact page
  break;
}

header("Location: http://localhost/", TRUE, 307);

include 'debug/session_debug.php';                      # [TEMP]