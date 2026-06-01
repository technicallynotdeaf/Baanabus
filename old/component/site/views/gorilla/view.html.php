<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2021 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class BaanabusViewGorilla extends JViewLegacy
{
  /**
   * Display the 'gorilla' view 
   * just to show how to create a page.
   * Once the component is installed, you add a page to one of the site (front end) 
   * menus, and select 'gorilla' view from 'squiggle' component.
   *
   * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths. You can ignore this and leave as is.
   *
   * @return  void
   */
  function display($tpl = null)
  {
    // Assign data to the view
    $this->msg = $this->get('Msg');

    // Check for errors.
    $errors = $this->get('Errors');

    if (null !== $errors)
    {
      if (count($errors = $this->get('Errors'))) {
        JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

        return false;
      }
    }

    // Display the view
    parent::display($tpl);
  }
}

