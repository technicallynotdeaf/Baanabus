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
// $jinput = JFactory::getApplication()->input;

$db = BaanabusHelper::getDB();

?>

<h3> List of Tasks </h3> 


<?php 

// This isn't working yet because the table creation screwed up on me for some reason.
// Probably a syntax error in the SQL file... oops 
$people = BaanabusHelper::getTasks($db); 

echo "<table>";

echo "<tr> <th> ID </th> <th> Description </th> <th> Context </th> </tr>";

foreach ($people as $person) {
echo "<tr>";
echo "<td>" . $person->task_id . "</td> ";
echo "<td>" . $person->task_description . "</td> ";
echo "<td>" . $person->context . "</td> ";
echo "</tr>";
}

echo "</table>";


?>

