<?php
/**
 * WAFFLE DESCRIPTION!
 *
 * @package     Controllers\Functions
 * @category    Controllers
 * @author      Justin D. Byrne <justin@byrne-systems.com>
 * @version     $Id$
 */

namespace WAFFLE\Functions;

use WAFFLE\Functions;

/**
 * Article Template
 *
 * Article class for generating articles for blogs and other posts
 */
class Article
{
    protected $type;
    protected $title;
    protected $subtitle;
    protected $content;
    protected $author;
    protected $header_img;
    protected $date;
    protected $time;

    /**
     * Constructor method used to instantiate a new Article object after
     * passing the appropriate parameter arguments.
     *
     * @method  __construct(String $type, String $title, String $subtitle, String $content, String $author, String $header_img, String $date, String $time)
     *
     * @param           String $type                    The type of article; blog, project, periodical, etc...
     * @param           String $title                   The title of the article
     * @param           String $subtitle                The subtitle of the article
     * @param           String $content                 The content of the article
     * @param           String $author                  The author of the article
     * @param           String $header_img              The article's header image; if one is available
     * @param           String $date                    The date of the article
     * @param           String $time                    The time of the article
     */
    public function __construct($type, $title, $subtitle, $content, $author, $header_img, $date, $time)
    {
      $this->type = $type;
      $this->title = $title;
      $this->subtitle = $subtitle;
      $this->content = $content;
      $this->author = $author;
      $this->header_img = $header_img;
      $this->date = $date;
      $this->time = $time;
    }

    public function type()
    {
      return $this->type;
    }

    public function title()
    {
      return $this->title;
    }

    public function subtitle()
    {
      return $this->subtitle;
    }

    public function content()
    {
      return $this->content;
    }

    public function author()
    {
      return $this->author;
    }

    public function header_img()
    {
      return $this->header_img;
    }

    public function date()
    {
      return $this->date;
    }

    public function time()
    {
      return $this->time;
    }
}