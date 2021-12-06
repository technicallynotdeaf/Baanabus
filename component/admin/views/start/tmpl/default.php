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

<h3> Start </h3> 


<h4> Rows from Database: </h4> 

<?php 

// This isn't working yet because the table creation screwed up on me for some reason.
// Probably a syntax error in the SQL file... oops 
$squiggle_data = BaanabusHelper::getData($db); 

// print_r($squiggle_data);

foreach ($squiggle_data as $sdata) {
echo "<p>";
echo "Row ID: " . $sdata->task_id ;
echo "<t/> Name: " . $sdata->task_description . " <t/> Context: " . $sdata->context ;
echo "</p>";
}



?>

