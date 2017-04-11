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

session_start();                                        # Session: start

# ------------------------------------ [ Header ] --------------------------- #

# Load: ancillary (or contributory) views
$notes  = new Template($root . '/web/views/meta/' . 'notes.wad');
$meta   = new Template($root . '/web/views/meta/' . 'meta.wad');
$styles = new Template($root . '/web/views/meta/' . 'style-sheets.wad');
$script = new Template($root . '/web/views/meta/' . 'script.wad');

###############################################################################
###                       Load Template(s)                                   ##
###############################################################################

# Load: composite application template
$app    = new Template($root . '/web/views/' . 'app.wad');

# Load: layout 'bootstrap'
$layout = new Template($root . '/web/views/layouts/'  . 'html5.wad');

$_SESSION['Page'] = 'blog';

switch ($_SESSION['Page']) {
  case 'blog':
    # Load: blog page page elements
    $blog    = new Template($root . '/web/views/pages/blog/' . 'blog.wad');
    $sidebar = new Template($root . '/web/views/pages/blog/' . 'sidebar.wad');
    $content = new Template($root . '/web/views/pages/blog/' . 'content.wad');

    ############################################################################
    ###                       Setup Landing Page                             ###
    ############################################################################
    $layout->set('header', '');
    $layout->set('favicon',                 $sidebar->favicon($root . '/web/images/fav/cube.fav'));
    $blog->set('sidebar',                   $sidebar->output());
    $blog->set('content',                   $content->output());
    $layout->set('main',                    $blog->output());
    $layout->set('footer',                  '');
    break;
  default:
    # Load: landing page elements
    $header = new Template($root . '/web/views/pages/landing/' . 'header.wad');
    $main   = new Template($root . '/web/views/pages/landing/' . 'main.wad');
    $footer = new Template($root . '/web/views/pages/landing/' . 'footer.wad');

    ############################################################################
    ###                       Setup Landing Page                             ###
    ############################################################################
    $layout->set('header',                  $header->output());
    $layout->set('favicon',                 $header->favicon($root . '/web/images/fav/cube.fav'));
    $layout->set('main',                    $main->output());
    $layout->set('footer',                  $footer->output());
    break;
}

###############################################################################
###                       Finalize Page with Meta Data                      ###
###############################################################################

# Set: tags inside layout 'bootstrap'
$layout->set('file_notes',              $notes->output());
$layout->set('title',                   'Byrne-Systems | Web-Application Design & Development');
$layout->set('meta_tags',               $meta->output());
// $layout->set('favicon',                 $header->favicon($root . '/web/images/fav/cube.fav'));
$layout->set('styles',                  $styles->output());
$layout->set('wrapper',                 'Byrne-Systems');
$layout->set('script',                  $script->output());

# Compile: all pre-parsed views into a single application view 'app.wad' to echo (or print) to users' screen; or stdout
$app->set('app',                        $layout->output());