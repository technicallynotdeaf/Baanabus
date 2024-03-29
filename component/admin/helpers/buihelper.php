<?php defined('_JEXEC') or die();
/**
 * @package     Joomla.Administrator
 * @subpackage  com_baanabus
 *
 * @author      Spliced together using VIm in 2022 by github/technicallynotdeaf 
 * @license     GNU General Public License version 3 or later; see LICENSE.txt4
 * 
 *
 * Baanabus UI Helper... because if you're gonna hard code CSS, it makes sense
 * to have it in one place and code reused instead of having to change fifteen billion
 * places when you change anything! 
 */
 
 use Joomla\CMS\Uri\Uri;
 use Joomla\CMS\HTML\HTMLHelper;

abstract class BUIhelper
{

  /*
   *  
   */
  function showPanel($heading, $text, $icon, $image, $buttons) {
   
     // Display order: Icon/heading on one line, then 
     // image if present, then image, then text (like on a FB post?)
     
     echo "\n<div class=\"well\">";
     
     echo "<h1>";
     
     if (isset($icon)) {
       //NB I know this is hard coded and that is bad, but, it's a result of the joomla component layout
       //I can't NOT hard code it, the location is set as a result of the manifest (component.xml)
       $avatar_folder_location = Uri::root() . "/media/com_baanabus/avatars/";

       $avatar_link = $avatar_folder_location . $icon;

       // echo "<p>Filename: " . $avatar_link . "</p>";

       $attributes = array("width" => "50px", "height" => "50px", "float" => "left");

       $iconstr = HTMLHelper::image( $avatar_link , 'Missing Avatar', $attributes);

       echo $iconstr;
       
     } 
     else echo "(No icon)";

     echo "&nbsp;&nbsp;&nbsp;" . $heading . "</h1>";

     echo "<p> " . $text . "</p>";
     
     // --- show buttons, if any... -------
     echo "<div style=\"text-align: right;\" >"; 
     foreach ($buttons as $button) { 
       echo "<a class=\"btn btn-". $button->css_class . " \" href=\"" . $button->link . "\" >" . $button->description . "</a>";
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
    <a class="nav-link" href="index.php?option=com_baanabus&view=listevents"> Events </a>
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

<div class="content" style="max-width: 800px; margin: auto; border-style= none dashed;">
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
  
  function showScripts() {
  	// yeah OK, the correct thing to do would be to create a separate .js file and include that. 
  	// but i want inline javascript because faster.. and i SO can't be bothered stuffing around 
  	// trying to include more files because Joomla puts stuff in weird places and references it weird.
	  echo <<<END

	  <script>
	    
	  </script>
END;
  }
  
    
}

class BaanabusButton {
	public $link;
	public $description;
	public $css_class;
	
	public function __construct(string $description, string $link, string $css_class="info")
	{
		$this->link = $link;
		$this->description = $description;
		$this->css_class = $css_class;
	}
	
	
}


