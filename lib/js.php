<?php

namespace Kirby\Cachebuster;

use F;

/**
 * Kirby Cachebuster JS Component
 * 
 * @author Lukas Bestle <lukas@getkirby.com>
 * @license MIT
 * @link https://getkirby.com
 */
class JS extends \Kirby\Component\JS {

  /**
   * Builds the html script tag for the given javascript file
   * 
   * @param string $src
   * @param boolean async
   * @return string
   */
  public function tag($src, $async = false) {

    if(is_array($src)) {
      $js = array();
      foreach($src as $s) $js[] = $this->tag($s, $async);
      return implode(PHP_EOL, $js) . PHP_EOL;
    }

    if($url == '@auto') {
      $file = kirby()->site()->page()->template() . '.css';
      $file = kirby()->roots()->autojs() . DS . $file;
      $url  = str_replace(kirby()->roots()->index(), "", $file);
    } else {
      $file = kirby()->roots()->index() . DS . $src;
    }

    if(file_exists($file)) {
      $mod = f::modified($file);
      $src = dirname($src) . '/' . f::name($src) . '.' . $mod . '.js';
    }

    return parent::tag($src, $async);

  }

}
