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

What are you here for? 

<p> <a href="index.php?option=com_baanabus&view=reset"> Reset Button </a> (coming soon) </p>

<p> <a href="index.php?option=com_baanabus&view=addperson"> Add A Person </a> </p>

<p> <a href="index.php?option=com_baanabus&view=listpeople"> List of People </a> </p>

<p> <a href="index.php?option=com_baanabus&view=listtasks"> List of Tasks </a> </p>


