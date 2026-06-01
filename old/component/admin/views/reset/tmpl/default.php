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


//JViewLegacy::loadHelper('baanabushelper');

JViewLegacy::loadHelper('buihelper'); // Baanabus UI helper

BUIhelper::showHeader();

?>

<h3> Reset Button </h3> 

<p> Have you drunk water? </p> 

<p> Have you restarted the laundry washing/drying? </p> 

<p> Have you eaten something? </p>

<?php BUIhelper::showFooter(); ?>
                                     
