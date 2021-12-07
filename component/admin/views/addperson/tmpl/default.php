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

<h3> Add A Person... </h3> 

<p> Form goes here... </p>

<h4> rows from Database: </h4> 

<?php 

// This isn't working yet because the table creation screwed up on me for some reason.
// Probably a syntax error in the SQL file... oops 
$people = BaanabusHelper::getPeople($db); 

print_r($people);


foreach ($people as $person) {
echo "<p>";
echo "[" . $person->person_id ;
echo "] " . $person->name . " is " . $person->char1 ;
echo "</p>";
}



?>

