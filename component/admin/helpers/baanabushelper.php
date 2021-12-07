<?php defined('_JEXEC') or die();
/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2021 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

abstract class BaanabusHelper
{

  /* Create the DB connection to the joomla database... */
  function getDB() {
   
     $db = JFactory::getDbo();
     
     return $db;

  }
  
  
  function getData($db) {
  
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__com_baanabus_tasks');

    // echo "\n<br/>Question Lookup Query: " . (string)$query;
    $db->setQuery((string)$query);
    
    $data_returned = $db->loadObjectList();
    
    return $data_returned;

  } 
  
  function getPeople($db) {
  
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__com_baanabus_people');

    // echo "\n<br/>Question Lookup Query: " . (string)$query;
    $db->setQuery((string)$query);
    
    $data_returned = $db->loadObjectList();
    
    return $data_returned;

  }   
  
  function getTasks($db) {
  
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__com_baanabus_tasks');

    // echo "\n<br/>Question Lookup Query: " . (string)$query;
    $db->setQuery((string)$query);
    
    $data_returned = $db->loadObjectList();
    
    return $data_returned;

  }    
  
  function getNotes($db, $person_id = 0) {
  
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__com_baanabus_tasks');
    
    // get notes relevant to a specific person... 
    //if($person_id != 0) {
    //  $query->where(
    //}

    // echo "\n<br/>Question Lookup Query: " . (string)$query;
    $db->setQuery((string)$query);
    
    $data_returned = $db->loadObjectList();
    
    return $data_returned;

  }   

  
    
}
