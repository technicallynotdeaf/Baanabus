<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2022 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */


//JViewLegacy::loadHelper('baanabushelper');

JViewLegacy::loadHelper('buihelper'); // Baanabus UI helper

BUIhelper::showHeader();

?>

<h3> Settings Page </h3> 

<p> > Run Backup?  </p> 


<?php BUIhelper::showFooter(); ?>
                                     
