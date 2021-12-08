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

<h3> List of People... </h3> 

<table> 

<?php 
$people = BaanabusHelper::getPeople($db); 

foreach ($people as $person) {
echo "<tr>";
echo "<td>" . $person->avatar_img . "</td>";
?>
<td>
  <form action="index.php?option=com_baanabus&view=person"  method="post" >
  <input type="hidden" name="person_id" value="<?php echo $person->person_id; ?>"  />
  <input value="<?php echo $person->name ?>" type="submit" class="btn" >
  </form>
</td>
<?php
echo "<td>" . $person->char1 . ", " . $person->char2 . "</td>";
echo "</tr>";
}
?>

</table>


