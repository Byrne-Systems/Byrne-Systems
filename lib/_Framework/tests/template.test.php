<?php
/**
 * testTemplate : Unit Testing class for "template.class.php"
 *
 * @package     UnitTests\testTemplate
 * @category    UnitTest
 * @author      Justin D. Byrne <justin@byrne-systems.com>
 */

namespace UnitTests;

use UnitTests\testTemplate;
use WAFFLE\Framework\Engines\Template;

require_once __DIR__ . '/../template.class.php';

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

    /**
     * [Description]
     */
    public function test_Merge_Templates()
    {
        # Location: of vital assets for unit testing
        $assets = 'C:/xampp/htdocs/apps/Byrne-Systems/lib/_Framework/tests/assets/';

        // Generate: an array holding various user's attributes
        $users = array(
            array(      # [0] CASE: First user and their associated birthplace
                "username" => "monkey",
                "location" => "Portugal"
            ),
            array(      # [1] CASE: Second user and their associated birthplace
                "username" => "Sailor",
                "location" => "Moon"
            ),
            array(      # [2] CASE: Third user and their associated birthplace
                "username" => "Trex",
                "location" => "Caribbean Islands"
            )
        );

        // Set: each user's value within '$users' (Array) into '$row' then put all rows in '$users_templates'
        foreach ($users as $user) {
            $row = new Template($assets . 'list_users_row.wad');

            foreach ($user as $key => $value) { $row->set($key, $value); }

            $users_templates[] = $row;
        }

        # Merge: template's together
        $users_contents = Template::merge($users_templates);

        # Instantiate: new template
        $users_list = new Template($assets . 'list_users.wad');

        # Set: the '$user_contents' within the '$users_list' (Object)
        $users_list->set('users', $users_contents);

        # Instantiate: new template
        $layout = new Template($assets . 'layout.wad');

        # Set: the 'title' of the '$layout' template with "Users"
        $layout->set('title', 'Users');

        # Set: the 'content' of the '$users_list' template with the parsed content of '$users_list'
        $layout->set('content', $users_list->output());

        # Get: expected file contents of the 'page.html' file
        $expected = file_get_contents($assets . 'page.html');

        // Assert: both $expected and asserted context(s) with preg_split, to negate any addition (or added) carriage returns...
        $this->assertEquals(preg_split('/\r\n|\r|\n/',$expected), preg_split('/\r\n|\r|\n/', $layout->output()));
    }

    /**
     * [Description]
     *
     * @assert()                                        [Description]
     */
    public function test_Failure_Output()
    {
        $this->template = new Template('not_real_file.wad');                                        # Instantiate: new template with a phony template file

        $msg = '[error] cannot load template file (not_real_file.wad).';                                  # Error message

        $this->assertEquals($msg, $this->template->output());                                       # Output: parsed content
    }
}