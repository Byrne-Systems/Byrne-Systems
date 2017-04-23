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

# Set: Root Directory
$root = rtrim(dirname(__FILE__), '/inc');

require $_SERVER['DOCUMENT_ROOT'] . '/lib/_Framework/template.class.php';

# Set: Root Directory
// $root = rtrim(dirname(__FILE__), '/inc');

# ------------------------------------ [ Header ] --------------------------- #

# Load: ancillary (or contributory) views
$notes  = new Template($root . '/web/views/meta/' . 'notes.wad');
$meta   = new Template($root . '/web/views/meta/' . 'meta.wad');
$styles = new Template($root . '/web/views/meta/' . 'styles.wad');              // (Deprecated) in favor for adaptive web solution
$script = new Template($root . '/web/views/meta/' . 'script.wad');

###############################################################################
###                       Load Template(s)                                   ##
###############################################################################

# Load: composite application template
$app    = new Template($root . '/web/views/' . 'app.wad');

# Load: layout 'bootstrap'
$layout = new Template($root . '/web/views/layouts/'  . 'html5.wad');

if (empty($_GET['page'])) {

  # Load: landing page elements
  $header = new Template($root . '/web/views/pages/landing/' . 'header.wad');
  $styles = new Template($root . '/web/views/pages/landing/' . 'styles.wad');
  $main   = new Template($root . '/web/views/pages/landing/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/landing/' . 'footer.wad');

  #############################################################################
  ###                       Setup Landing Page                              ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('styles',                  $styles->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());

} else if ($_GET['page'] == 'about') {

  # Load: about page elements
  $header = new Template($root . '/web/views/pages/about/' . 'header.wad');
  $styles = new Template($root . '/web/views/pages/about/' . 'styles.wad');
  $main   = new Template($root . '/web/views/pages/about/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/about/' . 'footer.wad');

  #############################################################################
  ###                       Setup About Page                                ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('styles',                  $styles->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());

} else if ($_GET['page'] == 'blog') {

  # Load: blog page page elements
  $styles  = new Template($root . '/web/views/pages/blog/' . 'styles.wad');
  $blog    = new Template($root . '/web/views/pages/blog/' . 'blog.wad');
  $sidebar = new Template($root . '/web/views/pages/blog/' . 'sidebar.wad');
  $content = new Template($root . '/web/views/pages/blog/' . 'content.wad');
  $footer  = new Template($root . '/web/views/pages/blog/' . 'footer.wad');

  #############################################################################
  ###                       Setup Blog Page                                 ###
  #############################################################################
  $layout->set('header', '');
  $layout->set('styles',                  $styles->output());
  $blog->set('sidebar',                   $sidebar->output());
  $blog->set('content',                   $content->output());
  $layout->set('main',                    $blog->output());
  $layout->set('footer',                  $footer->output());

} else if ($_GET['page'] == 'contact') {

  # Load: contact page elements
  $header = new Template($root . '/web/views/pages/contact/' . 'header.wad');
  $styles = new Template($root . '/web/views/pages/contact/' . 'styles.wad');
  $main   = new Template($root . '/web/views/pages/contact/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/contact/' . 'footer.wad');

  #############################################################################
  ###                       Setup Contact Page                              ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('styles',                  $styles->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());

} else if ($_GET['page'] == 'projects') {

  # Load: projects page page elements
  // $styles   = new Template($root . '/web/views/pages/projects/' . 'styles.wad');
  $projects = new Template($root . '/web/views/pages/projects/' . 'projects.wad');
  $sidebar  = new Template($root . '/web/views/pages/projects/' . 'sidebar.wad');
  $content  = new Template($root . '/web/views/pages/projects/' . 'content.wad');
  $footer   = new Template($root . '/web/views/pages/projects/' . 'footer.wad');

  #############################################################################
  ###                       Setup Projects Page                             ###
  #############################################################################
  $layout->set('header', '');
  // $layout->set('styles',                  $styles->output());
  $projects->set('sidebar',               $sidebar->output());
  $projects->set('content',               $content->output());
  $layout->set('main',                    $projects->output());
  $layout->set('footer',                  $footer->output());

} else if ($_GET['page'] == '404') {

  # Load: 404 page elements
  $styles = new Template($root . '/web/views/pages/404/' . 'styles.wad');
  $main   = new Template($root . '/web/views/pages/404/' . 'main.wad');

  #############################################################################
  ###                       Setup 404 Page                                  ###
  #############################################################################
  $layout->set('header',                  '');
  $layout->set('styles',                  $styles->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  '');

} else if ($_GET['page'] == 'debug') {

  # Load: debug page elements
  $header = new Template($root . '/web/views/pages/debug/' . 'header.wad');
  $styles = new Template($root . '/web/views/pages/debug/' . 'styles.wad');
  $main   = new Template($root . '/web/views/pages/debug/' . 'main.wad');
  $footer = new Template($root . '/web/views/pages/debug/' . 'footer.wad');

  #############################################################################
  ###                       Setup Debug Page                                ###
  #############################################################################
  $layout->set('header',                  $header->output());
  $layout->set('styles',                  $styles->output());
  $layout->set('main',                    $main->output());
  $layout->set('footer',                  $footer->output());
}

###############################################################################
###                       Finalize Page with Shared Meta Data               ###
###############################################################################

# Set: tags inside layout the chosen layout
$layout->set('file_notes',              $notes->output());
$layout->set('title',                   'Byrne-Systems | Web-Application Design & Development');
$layout->set('meta_tags',               $meta->output());
$layout->set('favicon',                 $layout->favicon($root . '/web/images/fav/cube.fav'));
$layout->set('styles',                  $styles->output());                     // (Deprecated) in favor for adaptive web solution
$layout->set('wrapper',                 'Byrne-Systems');
$layout->set('script',                  $script->output());

# Compile: all pre-parsed views into a single application view 'app.wad' to echo (or print) to users' screen; or stdout
$app->set('app',                        $layout->output());