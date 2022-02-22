<?php defined('_JEXEC') or die();
/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2021 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

JViewLegacy::loadHelper('baanabushelper'); // handles data requests

class BFeedItem {
	
	public $title; 
	public $text;
	public $buttons;
	
}


interface BaanabusFeed
{	
  // returns an array of BFeedItem objects
  public function getFeed();
    
}

class BaanabusFriendFeed implements BaanabusFeed {
	
  private $feed = array(); // this will be an array of BFeedItems, not that PHP cares
  
  function __construct() {
	  echo "Contructor got called.";
	  // baanabushelper:getPeopleToReview
	  // foreach person
	  // Title: = person.name
	  // content = person.tasks or person.attributes
	  // sort by review date if review date before today
  }
  
  function getFeed() {
	  // TODO
	  // baanabushelper:getPeopleToReview
	  // foreach person
	  // Title: = person.name
	  // content = person.tasks or person.attributes
	  // sort by review date if review date before today
	  
	  return $this->feed;
  }
}

