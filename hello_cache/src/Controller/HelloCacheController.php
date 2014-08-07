<?php

namespace Drupal\hello_cache\Controller;
use Drupal\Core\Cache\CacheBackendInterface;

class HelloCacheController {
  public function hellocachePage() {
    $cid = 'hello_cache';
    $data = NULL;

    $c = NULL;
    if ($c = \Drupal::cache()->get($cid)) {
      $data = $c->data;
    }
    else {
      $data = 'my hello cache 666777';
      $tags = array(
        'my_custom_tag' => TRUE,
        'node' => array(1, 3),
        'user' => array(7),
      );
      // case 1:  Drupal::cache
      $cache = \Drupal::cache();
      // case 2: inject services
      $cache = \Drupal::service('cache.default');
      // do not use tags
      // $cache->set($cid, $data, CacheBackendInterface::CACHE_PERMANENT);
      // use tags
      $cache->set($cid, $data, CacheBackendInterface::CACHE_PERMANENT, array('hello_page' => TRUE));

    }
    return $data;
  }

  public function hellocachePageClear() {
    $cid = 'hello_cache';
    $c = NULL;
    $c = \Drupal::cache()->get($cid);
    var_dump($c);
    if ($c) {
      if ($c->tags) {
        \Drupal::cache()->deleteTags(array('hello_page' => TRUE));
        return 'delete by tags';
      }
    }

    \Drupal::cache()->delete($c->cid);
    return 'delete by cache';
  }
}
