<?php defined('_JEXEC') or die();
/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2021 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

 use Joomla\CMS\Uri\Uri;
 use Joomla\CMS\HTML\HTMLHelper;

abstract class BaanabusHelper
{

  /* Create the connection to the database... */
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
  
  function getPeopleToReview($db)
  {

	  $query = $db->getQuery(true);
	  $query->select('*');
	  $query->from('#__com_baanabus_people');

	  // echo "\n<br/>Question Lookup Query: " . (string)$query;
	  $db->setQuery((string)$query);

	  $data_returned = $db->loadObjectList();

	  return $data_returned;
  }

  
  function getEvents($db) {
  
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__com_baanabus_events');

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
  
  function getTasks($db, $person_id = 0)
  {

    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__com_baanabus_tasks');
    
    if ( $person_id == 0) {

      // we want alll notes
    } else {
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

    $result = $db->insertObject('#__com_baanabus_tasks', $task, 'task_id');
  }
  
  function addNote($db, $note)
  {

    $result = $db->insertObject('#__com_baanabus_notes', $note, 'note_id');
  }

  
  function addEvent($db, $event) {

    $result = $db->insertObject('#__com_baanabus_events', $event, 'event_id');
  }
  
  
  function deleteTask($db, $task_id) {
    $query = $db->getQuery(true);

    $query->delete($db->quoteName('#__com_baanabus_tasks'));
    $query->where($db->quoteName('task_id') . ' = ' . $task_id);

    $db->setQuery($query);

    $result = $db->execute();

  }
  
  function getAvatar($filename) {
    
    //NB I know this is hard coded and that is bad, but, it's a result of the joomla component layout
    //I can't NOT hard code it, the location is set as a result of the manifest (component.xml)
    $avatar_folder_location = Uri::root() . "/media/com_baanabus/avatars/";

    $avatar_link = $avatar_folder_location . $filename; 
    
    // echo "<p>Filename: " . $avatar_link . "</p>";
    
    $attributes = array("width" => "100px", "height" => "100px");
    
    $avatarstr = HTMLHelper::image( $avatar_link , 'Missing Avatar', $attributes);

    return $avatarstr; 

  }
  
  function showMiniAvatar($filename)
  {

    //NB I know this is hard coded and that is bad, but, it's a result of the joomla component layout
    //I can't NOT hard code it, the location is set as a result of the manifest (component.xml)
    $avatar_folder_location = Uri::root() . "/media/com_baanabus/avatars/";

    $avatar_link = $avatar_folder_location . $filename;

    echo "<p>Filename: " . $avatar_link . "</p>";

    $attributes = array("width" => "50px", "height" => "50px");

    $avatarstr = HTMLHelper::image( $avatar_link , 'Missing Avatar', $attributes);

    echo $avatarstr;
  }
  

    
}


