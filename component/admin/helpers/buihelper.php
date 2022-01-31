<?php defined('_JEXEC') or die();
/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2022 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 *
 * Baanabus UI Helper... because if you're gonna hard code CSS, it makes sense
 * to have it in one place and code reused instead of having to change fifteen billion
 * places when you change anything! 
 */

abstract class BUIhelper
{

  function showPanel($heading, $text, $icon, $image, $actions) {
   
     // Display order: Icon/heading on one line, then 
     // image if present, then body text. 
     
     echo "\n<div class=\"well\">";
     
     echo "<h1>" . $heading . "</h1>";
     
     echo "<p> " . $text . "</p>";
     
     if(isset($icon)) {
       echo "<p> Icon goes here. </p>"; 
     } 
     else echo "<p> No icon to display.</p>";

     echo "<div style=\"text-align: right;\" >"; 
     foreach ($actions as $btntxt => $href) { 
       echo "<a class=\"btn btn-info\" href=\"" . $href . "\" >" . $btntxt . "</a>";
     }
     echo "</div>";// end buttons div
     
     
     echo "\n</div>"; // end well 

  }
    
  function showHeader() {
   
     // Display top navbar... 
	// in theory this should be smart enough to highlight the current page
	// but for now it can be dumb, it just needs to be 'good enough' not perfect
     
echo <<<END

<div width="100%" style="text-align:center;"> <!-- navbar? --> 
<div class="btn-group">
  <button class="btn">
    <a href="index.php?option=com_baanabus&view=start" class="nav-link"> Feed </a>
  </button>
  <button class="btn">
    <a class="nav-link" href="index.php?option=com_baanabus&view=listpeople"> People </a>
  </button>
  <button class="btn">
    <a class="nav-link" href="index.php?option=com_baanabus&view=listtasks"> Tasks </a>
  </button>
  <button class="btn">
    <a class="nav-link" href="index.php?option=com_baanabus&view=events"> Events </a>
  </button>
  <button class="btn">
    <a class="nav-link" href="index.php?option=com_baanabus&view=projects"> Projects </a>
  </button>
  <button class="btn">
    <a href="index.php?option=com_baanabus&view=reset" style="text-color:red;" class="nav-link"> Reset </a>
  </button>
</div>

</div>
</nav>

<div class="content" style="max-width: 499px; margin: auto; border-style= none dashed;">
END;

  }
  
  function showFooter() {
echo "
  </div><!-- end page-area -->
</div><!-- end main-container -->

<hr/>

<footer>
<p align=\"center\"> This is the page footer. </p>
</footer>
<!-- end page-wrap -->";

  }
    
}


