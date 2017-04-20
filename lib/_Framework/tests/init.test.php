<?php
/**
 * testTemplate : Unit Testing class for "template.class.php"
 *
 * @package     UnitTests\testTemplate
 * @category    UnitTest
 * @author      Justin D. Byrne <justin@byrne-systems.com>
 */

namespace UnitTests;

use UnitTests\testInit;

require 'psl-config.php';

# Instantiate: mysqli object for MySQL control
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

# Check: database connection connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

session_start();                                        # Start: session to carry session data

/**
 * @author  Justin D. Byrne <justin@byrne-systems.com>
 */
class testTemplate extends \PHPUnit_Framework_TestCase {
    protected $template;

    public function setUp()
    {
        # Location: of vital assets for unit testing
        $assets = 'C:/xampp/htdocs/apps/Byrne-Systems/lib/_Framework/tests/assets/';

        # Instantiate: new Template object
        $this->template = new Template($assets . 'testTemplate.wad');
    }

    /**
     * [Description]
     *
     * @assert()                                        [Description]
     */
    public function test_template_set_N_output_methods()
    {
        # Set: tag 'test' to 'Application Test'
        $this->template->set('test', 'Application Test');

        # @assertEquals
        $this->assertEquals('Application Test', $this->template->output());
    }
}