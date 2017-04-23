<?php
/**
 * WAFFLE (Web-Application Development Framework)
 *
 * @package     WAFFLE
 * @category    Gateway
 * @author      Justin Don Byrne <justinbyrne001@gmail.com>
 * @version     $Id$
 * @copyright   2010-2017 Byrne-Systems
 */

# Debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

# Load Controller
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/controller.php';

# Parse Application
echo $app->output();