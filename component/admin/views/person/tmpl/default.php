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

//we need this if we want to read input data 
$jinput = JFactory::getApplication()->input;

$person_id = $jinput->get('person_id', 0, 'INT');

if($person_id == 0) {
  echo "<p>Can't find person zero... </p>";
  die();
}

$db = BaanabusHelper::getDB();

$person_obj = BaanabusHelper::getPerson($db, $person_id); 

echo "<h3>" . $person_obj->name . "</h3>";

echo $person_obj->avatar_img;

echo "<p>[" . $person_obj->person_id ;
echo "] " . $person_obj->name . " is " . $person_obj->char1 ;
echo "</p>";

?>

