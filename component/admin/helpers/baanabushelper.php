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
  
  function getPerson($db, $person_id) {

    // If i'm not doing it for someone else, assume i'm doing it for myself 
    // This is just to prevent lots of "if it's not set, then ..." NULL-queries 
    // accidentally going to the database. 
    if(!isset($person_id)) {
      $person_id = 1; 
    } 

    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__com_baanabus_people');

    $query->where($db->quoteName('person_id') . ' = ' . $person_id);

    // echo "\n<br/>Question Lookup Query: " . (string)$query;
    $db->setQuery((string)$query);
    
    $person_obj = $db->loadObject();
    
    return $person_obj;

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
    $query->from('#__com_baanabus_notes');
    
    if( $person_id == 0) {
    
     // we want alll notes 
    }
    else {
      // filter query by person_id
      $query->where($db->quoteName('person_id') . " = " . $person_id);
    }

    /* ****** Syntax for Where, andWhere ... ***********
    // Filter by just statements that are relevant to requested question... 
    $query->andWhere($db->quoteName('question_id') . " = " . $db->quote(strval($question_id)));
    
    ****************** *********** */

    // echo "\n<br/>Question Lookup Query: " . (string)$query;
    $db->setQuery((string)$query);
    
    $data_returned = $db->loadObjectList();
    
    return $data_returned;

  }   

  /* 
   * @$db - JDatabase DBO connection object, use ::getDB() above
   * 
   * $task - $task object that has properties named the same as 
   * columns in the tasks table, such as "task_description" 
   */
  function addTask($db, $task) {

    $result = $db->insertObject('#__com_baanabus_tasks', $task, 'quote_id');
  }
  
  
  function deleteTask($db, $task_id) {
    $query = $db->getQuery(true);

    $query->delete($db->quoteName('#__com_baanabus_tasks'));
    $query->where($db->quoteName('task_id') . ' = ' . $task_id);

    $db->setQuery($query);

    $result = $db->execute();

  }
    
}


