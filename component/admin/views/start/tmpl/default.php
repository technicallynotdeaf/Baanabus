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

/**
* HOME FEED / START PAGE
* 
*/

//nb the helpername specified here **must be lowercase**, and correspond to a php file 
// located in /component/admin/helpers/helpername.php 
// ... but the class name can be capitals, and is different from this helpername
// i.e. the class name in helpername.php might be called abstract class MYHelper 
// and accessed by calling MYHelper::function(); 
JViewLegacy::loadHelper('baanabushelper'); // handles data requests

JViewLegacy::loadHelper('buihelper'); // Baanabus UI helper

JViewLegacy::loadHelper('baanabusfeed'); // feed objects code/classes

BUIhelper::showHeader();

BUIhelper::showScripts(); // spit the show/hide scripts for the news feed into the same document, 
// instead of asking the user's browser to submit another request.

//we need this if we want to read input data:
// $jinput = JFactory::getApplication()->input;

$db = BaanabusHelper::getDB(); 

// ============ Read Input/Do Actions ===============/

//we need this if we want to read input data
$jinput = JFactory::getApplication()->input;

$baanabus_action = $jinput->get('action', '', 'STRING');

if ($baanabus_action = "complete_task") {
  // don't do anthing yet
}



// ============ Display Feed ===============/
?>

<h3> Baanabus Home Feed </h3> 

<?php 

$heading = "Well Hello there";

$text = "This is some body text to show that the thing is generally working. Let's do this!";

$link3 = "index.php?option=com_baanabus&view=start";

$success_button = new BaanabusButton("Got It", $link3, "success");
$dismiss_button = new BaanabusButton("Dismiss", $link3, "action");

$actions = array($success_button, $dismiss_button);

BUIhelper::showPanel($heading, $text, $icon, $image, $actions);

$tasks = BaanabusHelper::getTasks($db);

foreach ($tasks as $task) {

  $task_heading = $task->task_title;

  $task_text = $task->task_description;
  
  $link3 = "index.php?option=com_baanabus&view=start";
  
  $task_icon = "task.jpeg";

  $success_button = new BaanabusButton("Got It", $link3, "success");
  $dismiss_button = new BaanabusButton("Dismiss", $link3, "action");
  
  $task_actions = array($success_button, $dismiss_button);

  BUIhelper::showPanel($task_heading, $task_text, $task_icon, $task_image, $task_actions);
}

?>

<?php BUIhelper::showFooter(); ?>
