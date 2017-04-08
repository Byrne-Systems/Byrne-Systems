<?php
/**
 * WAFFLE DESCRIPTION!
 *
 * @package     Controllers\Controller
 * @category    Controllers
 * @author      Justin D. Byrne <justin@byrne-systems.com>
 * @version     $Id$
 */

namespace WAFFLE\Controller;

use WAFFLE\Controller;                                  # Primary: controller for index.php
use WAFFLE\Framework\Engines\Template;                  # Template: engine developed to substitute special WAFFLE tags while publishing a clean HTML document

require '/../lib/_Framework/template.class.php';

# Set: Root Directory
$root = rtrim(dirname(__FILE__), '/inc');

// session_start();                                        # Session: start

# ------------------------------------ [ Header ] ------------------------------------ #

# Load: ancillary (or contributory) views
$notes  = new Template($root . '/web/views/' . 'notes.wad');
$meta   = new Template($root . '/web/views/' . 'meta.wad');
$styles = new Template($root . '/web/views/' . 'style-sheets.wad');
$script = new Template($root . '/web/views/' . 'script.wad');

####################################################################
###                       Load Template(s)                       ###
####################################################################

# Load: layout 'bootstrap'
$layout = new Template($root . '/web/views/layouts/'  . 'html5.wad');

# Load: primary page elements
$header = new Template($root . '/web/views/' . 'header.wad');
$main   = new Template($root . '/web/views/' . 'main.wad');
$footer = new Template($root . '/web/views/' . 'footer.wad');

# Load: composite application template
$app    = new Template($root . '/web/views/' . 'app.wad');

# Load: project and/or application frame(s)
// Cycle through various projects applications

####################################################################
###                       Build Master Page                      ###
####################################################################

# Set: tags inside layout 'bootstrap'
$layout->set('file_notes',              $notes->output());
$layout->set('title',                   'Byrne-Systems | Web-Application Design & Development');
$layout->set('meta_tags',               $meta->output());
$layout->set('favicon',                 $header->favicon($root . '/web/images/fav/cube.fav'));
$layout->set('styles',                  $styles->output());
$layout->set('wrapper',                 'Byrne-Systems');

$layout->set('header',                  $header->output());
$layout->set('main',                    $main->output());
$layout->set('footer',                  $footer->output());

$layout->set('script',                  $script->output());

# Compile: all pre-parsed views into a single application view 'app.wad' to echo (or print) to users' screen; or stdout
$app->set('app',                            $layout->output());