<?php
/**
 * about.php
 */

use WAFFLE\Framework\Engines\Template;                  # Template: engine developed to substitute special WAFFLE tags while publishing a clean HTML document

# Debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

# Require: templating class
require $_SERVER['DOCUMENT_ROOT'] . '/lib/.framework/template.class.php';

###############################################################################
###                             Load Views                                  ###
###############################################################################

# Load: Web-Application Display layout file(s)
$layout = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/layouts/'  . 'html5.wad');
$app    = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/' . 'app.wad');

# Load: meta data
$notes  = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'notes.wad');
$meta   = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'meta.wad');
// $styles = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'styles.wad');              // (Deprecated) in favor for adaptive web solution
$styles = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/about/' . 'styles.wad');
$script = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/meta/' . 'script.wad');

# Load: body elements
$header = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/about/' . 'header.wad');
$main   = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/about/' . 'main.wad');
$footer = new Template($_SERVER['DOCUMENT_ROOT'] . '/web/views/pages/about/' . 'footer.wad');

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
$layout->set('header',                  $header->output());
$layout->set('main',                    $main->output());
$layout->set('footer',                  $footer->output());
$layout->set('script',                  $script->output());

# Compile: all pre-parsed views into a single application view 'app.wad'
$app->set('app',                   $layout->output());

# Display: application
echo $app->output();