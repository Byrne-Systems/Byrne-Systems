<?php
/**
 * Global: configuration variables & Database Login Credentials
 *
 * @package     Framework\IO\Adapters\Credentials
 * @category    Credentials
 * @author      Justin D. Byrne <justin@byrne-systems.com>
 * @version     $Id$
 */

namespace WAFFLE\Framework\Adapters\DBA;

define("HOST",      "localhost");                       # The host you want to connect to.
define("USER",      "bsys_admin");                      # The database username.
define("PASSWORD",  "myW9KvpMpPtTFWYs");                # The database password.
define("DATABASE",  "byrne_systems");                   # The database name.

/**
 * Secure: connection while using am HTTPS connection.
 */
define("SECURE", FALSE);                                # FOR DEVELOPMENT ONLY!!!!