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

session_start();                    # Start: session to carry session data

# Master: switch construct operating according the passed '$page' variable
switch ($_GET['page']) {

    case 'about':
      $_SESSION['about'];           # Set: session variables for about page
    break;

    case 'projects':
      $_SESSION['projects'];        # Set: session variables for projects page
    break;

    case 'blog':
      $_SESSION['blog'];            # Set: session variables for blog page
    break;

    case 'contact':
      $_SESSION['contact'];         # Set: session variables for contact page
    break;

}

header("Location: http://localhost/", TRUE, 307);

include 'debug/session_debug.php';                      # [TEMP]