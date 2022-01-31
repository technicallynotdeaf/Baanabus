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

//we need this if we want to read input data 
// $jinput = JFactory::getApplication()->input;

$db = BaanabusHelper::getDB(); 

?>

<h3> Baanabus Home Feed </h3> 

<?php 

$heading = "Well Hello there";

$text = "This is some body text to show that the thing is generally working. Off you go!";

$link3 = "index.php?option=com_baanabus&view=start";

$actions = array("Got it!" => $link3, "No Stress" => $link3);

BUIhelper::showPanel($heading, $text, $icon, $image, $actions);

$tasks = BaanabusHelper::getTasks($db);

foreach ($tasks as $task) {

  $task_heading = "Task: " . $task->task_title ;

  $task_text = "Task Description: " . $task->task_description;

  $task_actions = array("edit" => "#", "Done it!" => "#");

  BUIhelper::showPanel($task_heading, $task_text, $task_icon, $task_image, $task_actions);
}

?>

<div style="width: 98%; height: 50px; border-style: dashed; border-width: 2px; border-radius: 5px;"> 
  <a href="index.php?option=com_baanabus&view=listpeople"> List of People </a> </p>
</div> 

<?php BUIhelper::showFooter(); ?>
