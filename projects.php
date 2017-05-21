<?php
/**
 * About.php
 */

use WAFFLE\Framework\Engines\Template;                  # Template: engine developed to substitute special WAFFLE tags while publishing a clean HTML document

# Debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

# Require: templating class
require $_SERVER['DOCUMENT_ROOT'] . '/lib/.framework/template.class.php';

########                SQL                                            ########
require $_SERVER['DOCUMENT_ROOT'] . '/inc/sql-config.php';                      # Global: SQL Configuration Variables

# Instantiate: mysqli object for MySQL connection
// $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);

// # Check: connection
// if (mysqli_connect_errno()) {
//   printf("[failed] connection failed: %s\n", mysqli_connect_error());
//   exit();
// } else {
//   echo "[success] connection established";
// }

// $type    = "project";
// $title   = "WAFFLE";
// $content = "content...";
// $author  = "Justin D. Byrne";
// $header_image = "waffle_logo.png";
// $date;
// $time;

// $stmt = "INSERT INTO articles (type, title, content, author, header_image)
// VALUES ('" . $type . "', '" . $title . "', '" . $content . "', '" . $author . "', '" . $header_image . "')";

// if ($conn->query($stmt) === TRUE) {
//   echo "New record created!" . '<br>';
// } else {
//   echo "[error] " . $sql . "<br>" . $conn->error;
// }

// $conn->close();

########                SQL                                            ########

###############################################################################
###                             Load Views                                  ###
###############################################################################

# Load: Web-Application Display layout file(s)
$layout  = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/layouts/'  . 'html5.wad');
$app     = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/' . 'app.wad');

# Load: meta data
$notes   = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'notes.wad');
$meta    = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'meta.wad');
// $styles = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'styles.wad');              // (Deprecated) in favor for adaptive web solution
$styles  = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/projects/' . 'styles.wad');
$script  = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'script.wad');

# Load: body elements
$projects = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/projects/' . 'projects.wad');
$sidebar  = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/projects/' . 'sidebar.wad');
$content  = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/projects/' . 'content.wad');
$footer   = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/projects/' . 'footer.wad');

###############################################################################
###                       Setup Page                                        ###
###############################################################################
# Set: tags inside layout the chosen layout
$layout->set('file_notes',              $notes->output());
$layout->set('title',                   'Byrne-Systems | Web-Application Design & Development');
$layout->set('meta_tags',               $meta->output());
$layout->set('favicon',                 $layout->favicon($_SERVER['DOCUMENT_ROOT'] . '/web/images/fav/cube.fav'));
$layout->set('styles',                  $styles->output());
$layout->set('wrapper',                 'Byrne-Systems');
$layout->set('header',                  '');
$layout->set('styles',                  $styles->output());
$projects->set('sidebar',               $sidebar->output());
$projects->set('content',               $content->output());
$layout->set('main',                    $projects->output());
$layout->set('footer',                  $footer->output());
$layout->set('script',                  $script->output());

# Compile: all pre-parsed views into a single application view 'app.wad'
$app->set('app',                        $layout->output());

# Display: application
echo $app->output();