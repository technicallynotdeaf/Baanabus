<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2021 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */


JViewLegacy::loadHelper('baanabushelper');
JViewLegacy::loadHelper('buihelper'); // Baanabus UI helper

BUIhelper::showHeader();



// connect to the database... 
$db = BaanabusHelper::getDB();

//we need this if we want to read input data 
$jinput = JFactory::getApplication()->input;


// **** Read data if a event was submitted... **** 
$action = $jinput->get('action', '', 'STRING');
$event_id = $jinput->get('event_id', 0, 'INT');
$event_title = $jinput->get('event_title', '', 'STRING');

if(!empty($action)) {
 
  if(strcmp($action, "delete") == 0 && $event_id > 0) {
    BaanabusHelper::deleteEvent($db, $event_id);
  }

}
else if (!empty($event_title) && empty($event_id)) {
	echo "<h2> Event submitted... </h2> ";

  // Create a new event from submitted strings & save to DB

  $new_event = new stdClass();
  $new_event->title = $event_title; 
 
  $description = $jinput->get('event_description', '', 'STRING');
  
  if(!empty($description)) {
    $new_event->description = $description; 
  }

  $event_context = $jinput->get('context', '', 'STRING');
  if(!empty($context)) {
    $new_event->context = $context; 
  }

  BaanabusHelper::addEvent($db, $new_event);    
}

?>

<h3> Events list... </h3> 
<?php 


// This isn't working yet because the table creation screwed up on me for some reason.
// Probably a syntax error in the SQL file... oops 
$events = BaanabusHelper::getEvents($db); 

echo "<table>";

?>

<tr>
 <th style="width:200px; text-align:left;"> Title </th>
 <th style="width:200px; text-align:left;"> Description </th>
 <th style="width:200px; text-align:left;"> People </th>
 <th style="width:150px; text-align:left;"> Context </th>
 <th style="width:100px; text-align:left;"> &nbsp; </th>
</tr>

<?php

foreach ($events as $event) {

  print("<p>");
	

  print_r($event);
  
  print("</p>");
  
  echo "<tr>";
  echo "<td>" . $event->title . "</td> ";
  echo "<td>" . $event->description . "</td> ";

  $person = BaanabusHelper::getPerson($db, $event->person_id);
  
  echo "<td>" . $person->name . "</td> ";

  echo "<td>" . $event->context . "</td> ";


  // then the edit button... 
  ?>
  <td>
    <form action="index.php?option=com_baanabus&view=listevents"  method="post" >
    <input type="hidden" name="event_id" value="<?php echo $event->event_id; ?>"  />
    <input type="hidden" name="action" value="delete"  />  
    <input value="delete" type="submit" class="btn btn-warning" >
    </form>
  </td>
  <?php

  echo "</tr>";

} // end foreach(event)

//foreach ($events as $column => $value) {
//
//  echo (string)$column . ": " . (string)$value . "<br/>";
//
//}

echo "</table>";

?>

<h3> Add a event </h3> 

<form method="post"> 

  <form action="index.php?option=com_baanabus&view=addevent" method="post" id="neweventForm" name="neweventForm">

  <br/>
  <div class="label">Title: </div> 
  <input type="text" class="form-control span6" name="event_title" ><br/>

  <div class="label">Description: </div> 
  <input type="text" class="form-control span6" name="event_description" ><br/>

  <div class="label"> Context:</div> 
  <input type="text" class="form-control span6" name="context" value="home"> <br/>

  <input id="lkaje23fsr3" value="Update Changes" type="submit" class="btn btn-success" >

</form>

<?php BUIhelper::showFooter(); ?>

