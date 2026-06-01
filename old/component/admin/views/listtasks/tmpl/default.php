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


// **** Read data if a task was submitted... **** 
$action = $jinput->get('action', '', 'STRING');
$task_id = $jinput->get('task_id', 0, 'INT');
$task_title = $jinput->get('task_title', '', 'STRING');

if(!empty($action)) {
 
  if(strcmp($action, "delete") == 0 && $task_id > 0) {
    BaanabusHelper::deleteTask($db, $task_id);
  }

}
else if(!empty($task_title) && empty($task_id)) {

  // Create a new task from submitted strings & save to DB

  $new_task = new stdClass();
  $new_task->task_title = $task_title; 
 
  $task_description = $jinput->get('task_description', '', 'STRING');
  if(!empty($task_description)) {
    $new_task->task_description = $task_description; 
  }

  $task_context = $jinput->get('context', '', 'STRING');
  if(!empty($task_context)) {
    $new_task->context = $task_context; 
  }

  BaanabusHelper::addTask($db, $new_task);    
}

?>

<h3> Existing Tasks </h3> 
<?php 



// This isn't working yet because the table creation screwed up on me for some reason.
// Probably a syntax error in the SQL file... oops 
$tasks = BaanabusHelper::getTasks($db); 

echo "<table>";

?>

<tr>
 <th style="width:200px; text-align:left;"> Title </th>
 <th style="width:200px; text-align:left;"> Description </th>
 <th style="width:200px; text-align:left;"> Doing it for... </th>
 <th style="width:150px; text-align:left;"> Context </th>
 <th style="width:100px; text-align:left;"> &nbsp; </th>
</tr>

<?php

foreach ($tasks as $task) {

  echo "<tr>";
  echo "<td>" . $task->task_title . "</td> ";
  echo "<td>" . $task->task_description . "</td> ";

  $person = BaanabusHelper::getPerson($db, $task->person_id);
  echo "<td>" . $person->name . "</td> ";

  echo "<td>" . $task->context . "</td> ";


  // then the edit button... 
  ?>
  <td>
    <form action="index.php?option=com_baanabus&view=listtasks"  method="post" >
    <input type="hidden" name="task_id" value="<?php echo $task->task_id; ?>"  />
    <input type="hidden" name="action" value="delete"  />  
    <input value="Delete" type="submit" class="btn btn-warning" >
    </form>
  </td>
  <?php

  echo "</tr>";

} // end foreach(Task)

echo "</table>";

?>

<h3> Add a task </h3> 

<form method="post"> 

  <form method="post" id="newTaskForm" name="newTaskForm">

  <br/>
  <div class="label">Title: </div> 
  <input type="text" class="form-control span6" name="task_title" ><br/>

  <div class="label">Description: </div> 
  <input type="text" class="form-control span6" name="task_description" ><br/>

  <div class="label"> Context:</div> 
  <input type="text" class="form-control span6" name="context" value="home"> <br/>

  <input id="lkaje23fsr3" value="Update Changes" type="submit" class="btn btn-success" >

</form>

<?php BUIhelper::showFooter(); ?>

