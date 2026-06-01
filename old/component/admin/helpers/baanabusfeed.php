<?php defined('_JEXEC') or die();
/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2021 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

//JViewLegacy::loadHelper('baanabushelper'); // handles data requests

//JViewLegacy::loadHelper('buihelper'); // handles data requests


abstract class BFeedItem {
	
	public $title; 
	public $text;
	public $buttons;
	
}

 

abstract class BaanabusFeed
{
  // private $feed = array(); // this will be an array of BFeedItems, not that PHP cares
	
  // returns an array of BFeedItem objects
  public function getFeed() { 
    return null;
  }
  
}

/*
class BaanabusFriendFeed extends BaanabusFeed {
	
  
  function getFeed()
  {
	  return $this->feed;
  }
  
} *

