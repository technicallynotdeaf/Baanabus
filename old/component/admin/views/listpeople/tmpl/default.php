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



//we need this if we want to read input data 
// $jinput = JFactory::getApplication()->input;

$db = BaanabusHelper::getDB();

?>

<h3> List of People... </h3> 

<table> <tr>

<?php 
$people = BaanabusHelper::getPeople($db); 

$count = 0;

foreach ($people as $person) {
  $count = $count + 1;
  echo "<td style=\"text-align: center;\">";

?>
    <a href="index.php?option=com_baanabus&view=person&person_id=<?php echo $person->person_id; ?>">
    <?php echo BaanabusHelper::getAvatar($person->avatar_img); ?> <br/>
    <?php echo $person->name ?> </a>
    
<?php

  echo "</td>";
  
  if ($count > 5) {
    $count = 0;
    echo "</tr><tr>";

  }
}
?>

</tr>
</table>

<?php BUIhelper::showFooter(); ?>
