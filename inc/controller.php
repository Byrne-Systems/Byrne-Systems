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

# ------------------------------------ [ Header ] --------------------------- #

# Load: ancillary (or contributory) views
$notes  = new Template($root . '/web/views/meta/' . 'notes.wad');
$meta   = new Template($root . '/web/views/meta/' . 'meta.wad');
// $styles = new Template($root . '/web/views/meta/' . 'styles.wad');             // (Deprecated) for adaptive design
$script = new Template($root . '/web/views/meta/' . 'script.wad');

###############################################################################
###                       Load Template(s)                                   ##
###############################################################################

# Load: composite application template
$app    = new Template($root . '/web/views/' . 'app.wad');

# Load: layout 'bootstrap'
$layout = new Template($root . '/web/views/layouts/'  . 'html5.wad');

if (empty($_GET['Page'])) {
  # Load: landing page elements
  $header = new Template($root . '/web/views/pages/landing/' . 'header.wad');
  $main   = new Template($root . '/web/views/pages/landing/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/landing/' . 'footer.wad');
  $styles = new Template($root . '/web/views/pages/landing/' . 'styles.wad');

  #############################################################################
  ###                       Setup Landing Page                              ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('styles',                  $styles->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());
} else if ($_GET['Page'] == 'blog') {
  # Load: blog page page elements
  $blog    = new Template($root . '/web/views/pages/blog/' . 'blog.wad');
  $sidebar = new Template($root . '/web/views/pages/blog/' . 'sidebar.wad');
  $content = new Template($root . '/web/views/pages/blog/' . 'content.wad');
  $footer  = new Template($root . '/web/views/pages/blog/' . 'footer.wad');

  ############################################################################
  ###                       Setup Blog Page                                ###
  ############################################################################
  $layout->set('header', '');
  $blog->set('sidebar',                   $sidebar->output());
  $blog->set('content',                   $content->output());
  $layout->set('main',                    $blog->output());
  $layout->set('footer',                  $footer->output());
} else if ($_GET['Page'] == 'projects') {
  # Load: projects page page elements
  $projects = new Template($root . '/web/views/pages/projects/' . 'projects.wad');
  $sidebar  = new Template($root . '/web/views/pages/projects/' . 'sidebar.wad');
  $content  = new Template($root . '/web/views/pages/projects/' . 'content.wad');
  $footer   = new Template($root . '/web/views/pages/projects/' . 'footer.wad');

  #############################################################################
  ###                       Setup Projects Page                             ###
  #############################################################################
  $layout->set('header', '');
  $projects->set('sidebar',               $sidebar->output());
  $projects->set('content',               $content->output());
  $layout->set('main',                    $projects->output());
  $layout->set('footer',                  $footer->output());
} else if ($_GET['Page'] == 'about') {
  # Load: about page elements
  $header = new Template($root . '/web/views/pages/about/' . 'header.wad');
  $main   = new Template($root . '/web/views/pages/about/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/about/' . 'footer.wad');

  #############################################################################
  ###                       Setup Contact Page                              ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());
} else if ($_GET['Page'] == 'contact') {
  # Load: about page elements
  $header = new Template($root . '/web/views/pages/contact/' . 'header.wad');
  $main   = new Template($root . '/web/views/pages/contact/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/contact/' . 'footer.wad');

  #############################################################################
  ###                       Setup Landing Page                              ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());
} else if ($_GET['Page'] == '404') {
  # Load: 404 page elements
  $header = new Template($root . '/web/views/pages/404/' . 'header.wad');
  $main   = new Template($root . '/web/views/pages/404/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/404/' . 'footer.wad');

  #############################################################################
  ###                       Setup Landing Page                              ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());
}

###############################################################################
###                       Finalize Page with Meta Data                      ###
###############################################################################

# Set: tags inside layout the chosen layout
$layout->set('file_notes',              $notes->output());
$layout->set('title',                   'Byrne-Systems | Web-Application Design & Development');
$layout->set('meta_tags',               $meta->output());
$layout->set('favicon',                 $layout->favicon($root . '/web/images/fav/cube.fav'));
// $layout->set('styles',                  $styles->output());                     // (Deprecated) in favor for adaptive web
$layout->set('wrapper',                 'Byrne-Systems');
$layout->set('script',                  $script->output());

# Compile: all pre-parsed views into a single application view 'app.wad' to echo (or print) to users' screen; or stdout
$app->set('app',                        $layout->output());