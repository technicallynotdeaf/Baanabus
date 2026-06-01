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

 //nb the helpername specified here **must be lowercase**, and correspond to a php file
 // located in /component/admin/helpers/helpername.php
 // ... but the class name can be capitals, and is different from this helpername
 // i.e. the class name in helpername.php might be called abstract class MYHelper
 // and accessed by calling MYHelper::function();
 JViewLegacy::loadHelper('baanabushelper'); // handles data requests

 JViewLegacy::loadHelper('buihelper'); // Baanabus UI helper

 BUIhelper::showHeader();

 // BUIhelper::showScripts(); // spit the show/hide scripts for the news feed into the same document,
 // instead of asking the user's browser to submit another request.

 //we need this if we want to read input data:
 // $jinput = JFactory::getApplication()->input;

$db = BaanabusHelper::getDB();

//we need this if we want to read input data 
$jinput = JFactory::getApplication()->input;

$person_id = $jinput->get('person_id', 0, 'INT');


$task_title = $jinput->get('task_title', '', 'STRING');

if (!empty($task_title)) {

  // Create a new task from submitted strings & save to DB

  print("New task submitted... ");
  $new_task = new stdClass();
  $new_task->task_title = $task_title;

  $task_description = $jinput->get('task_description', '', 'STRING');
  if (!empty($task_description)) {
    $new_task->task_description = $task_description;
  }

  $task_context = $jinput->get('context', '', 'STRING');
  if (!empty($task_context)) {
    $new_task->context = $task_context;
  }
  
  $new_task->person_id = $person_id;

  BaanabusHelper::addTask($db, $new_task);
}

$note_contents = $jinput->get('note_contents', '', 'STRING');

if (!empty($note_contents)) {

  // Create a new note from submitted strings & save to DB

  print("New note submitted... ");
  $new_note = new stdClass();
  
  $new_note->contents = $note_contents;

  $new_note->person_id = $person_id;

  BaanabusHelper::addNote($db, $new_note);
}

/* person zero is now me... */
// if($person_id == 0) {
//  echo "<p>Can't find person zero... </p>";
//  return();
//}

$person_obj = BaanabusHelper::getPerson($db, $person_id); 

// if ($person_obj == null) ... TODO put a test in here to handle this gracefully 

// $avatar_link = BaanabusHelper::getAvatar($person_obj->avatar_img);

// echo  "<h3>" . $avatar_link . $person_obj->name . "</h3>";

// Setup for the info boxes... 


$icon = $person_obj->avatar_img;
$actions = array(); // empty array to avoid errors.. yeah i know this shouldn't be needed


// ====== Display their avatar, name, basic attributes... =======// 

$heading =$person_obj->name;

$main_box_info = array();

$main_box_info['thankful'] = "<p> I'm thankful for ". $person_obj->name . "</p>";


$main_box_info['pray_for'] = "<p> I will remember to pray for ". $person_obj->name . "</p>";


$text2 = $person_obj->name . " is: <ul>";

if (isset($person_obj->char1)) {
  $text2 = $text2 . "<li>" . $person_obj->char1 . "</li>"; 
}

if (isset($person_obj->char2)) {
  $text2 = $text2 . "<li>" . $person_obj->char2 . "</li>";
}

if (isset($person_obj->char3)) {
  $text2 = $text2 . "<li>" . $person_obj->char3 . "</li>";
}

$text2 = $text2 . "</ul>";

$main_box_info['character'] = $text2;

$text_to_display = implode($main_box_info);

BUIhelper::showPanel($heading, $text_to_display, $icon, $image, $actions);



// ================ Tasks related to this person ========== // 

$heading = "Tasks";
$icon = "task.jpeg";

$tasks = BaanabusHelper::getTasks($db, $person_id);

$link3 = "index.php?option=com_baanabus&view=person";

$success_button = new BaanabusButton("Got It", $link3, "success");
$dismiss_button = new BaanabusButton("Dismiss", $link3, "action");

$text_to_display = "You were going to: <ul>";

foreach ($tasks as $task) {
  $text_to_display = $text_to_display . "<li><b>" . $task->task_title . "</b><br/>" . $task->task_description ." </li>";
}

$text_to_display = $text_to_display . "</ul>";

BUIhelper::showPanel($heading, $text_to_display, $icon, $image, $actions);

// ---------- Add Task form --------------

?>
<form method="post">

<br/>
<div class="label">Title: </div>
<input type="text" class="form-control span6" name="task_title" ><br/>

<div class="label">Description: </div>
<input type="text" class="form-control span6" name="task_description" ><br/>

<div class="label"> Context:</div>
<input type="text" class="form-control span6" name="context" value="home"> <br/>

<input type="hidden" name="person_id" value="<?php echo $person_id ?>" >

<input value="Add Task!" type="submit" class="btn btn-success" >

</form>

<?php

// ============ Notes about person ============ //


//$image = $person_obj->avatar_img;

$heading = "Notes about " . $person_obj->name;

$icon = "task.jpeg";

$notes = BaanabusHelper::getNotes($db, $person_id);

$notes_box_info = array();

foreach ($notes as $note) {
  $this_note = "<p>" . $note->contents . "</p>";
  array_push($notes_box_info, $this_note);
}

$text_to_display = implode($notes_box_info);

BUIhelper::showPanel($heading, $text_to_display, $icon, $image, $actions);


// ---------- Add Note form --------------

?>

<form method="post">

  <br/>
  <div class="label">New Note: </div>
  <input type="text" class="form-control span6" name="note_contents" ><br/>

  <input type="hidden" name="person_id" value="<?php echo $person_id ?>" >

  <input value="Add Note!" type="submit" class="btn btn-success" >

</form>

<?php

print_r($person_obj);

