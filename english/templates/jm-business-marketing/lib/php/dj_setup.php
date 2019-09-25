<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

if(JRequest::getVar('direction')=='rtl'){
	setcookie("djdirection", "rtl");
	$direction='rtl';
} else if(JRequest::getVar('direction')=='ltr'){
	setcookie("djdirection", "ltr");
	$direction='ltr';
} else {
	$direction=JRequest::getVar('djdirection',$this->direction);
}
	
$mosConfig_live_site = $this->baseurl;
$app = JFactory::getApplication();

// setting variable for template base url
$jm_name = $app->getTemplate();
$jm_path = $mosConfig_live_site . '/templates/' . $jm_name . '/';

// Use the folowing option for quick off LEFT and RIGHT positions displaying
	$sideBarsScheme = array (	
    //by default
    'default'=>   'left-content-right', 
);

/***
DO NOT MODIFY THIS IF YOU DONT KNOW WHAT YOU DOING!
***/

$option = 'default';
if ($option && isset($sideBarsScheme[$option]) && trim($sideBarsScheme[$option]) && stristr($sideBarsScheme[$option],'content')!= false){
	$currentScheme = trim($sideBarsScheme[$option]);
} else {
	$currentScheme = $sideBarsScheme['default'];
}
if (!$this->countModules('position-7')) $currentScheme = str_replace('left','',$currentScheme);
if (!$this->countModules('rightload')) $currentScheme = str_replace('right','',$currentScheme);

$schemeOutput = '';
$currentScheme = explode("-",$currentScheme);

if (is_array ($currentScheme)) {
   foreach ($currentScheme as $item) {
   	   if ($item) $schemeOutput[] = $item;
   }
}

$currentScheme = "scheme_".count($schemeOutput);

//getting information template parameters
	$templateparams	= $app->getTemplate(true)->params;
//getting information about logo
	$logo = $this->params->get('logo');
//getting information about sitedescription
	$sitedescription = $this->params->get('sitedescription');
// getting information about style switcher
	$stylearea = ($this->params->get("stylearea", 1) == 0) ? false : true;
// getting information about basic template color
	$template_color = $this->params->get("template_color", 1);
// getting information about basic template width
	$page_width = $this->params->get("page_width", "900px" );
// getting information about basic template width
	$left_width = $this->params->get("left_width", "200px" );
// getting information about basic template width
	$right_width = $this->params->get("right_width", "200px" );
	
// getting information about content width
if(($this->countModules('position-7')) && ($this->countModules('rightload'))) {
	$content_width = (($page_width - $left_width - $right_width) - 30).'px';
} else if (($this->countModules('position-7')) && ($this->countModules('rightload') == 0)) {
	$content_width = (($page_width - $left_width) - 15).'px';
} else if (($this->countModules('position-7') == 0) && ($this->countModules('rightload'))) {
	$content_width = (($page_width - $right_width) - 15).'px';
} else {
	$content_width = $page_width.'px';
}

/*
* How to use in a template code:
* echo DJModuleHelper::renderModules('position_name','[none|rounded|xhtml|table|horz]');
* etc.: echo DJModuleHelper::renderModules('footer','none');
*/

jimport( 'joomla.application.module.helper' );

class DJModuleHelper extends JModuleHelper {
	
	function renderModules($position, $chrome = 'none', $modulesPerRow = 1) {
		if (!$position) return false;
		$html = '';
		if ($modules = parent::getModules( $position )) {
			$attribs['style'] = $chrome;

			$html .= '<div class="'.$position.' count_'.count($modules).'">';
			
			for ($i = 0, $k = 0; $i < count($modules); $i++) {

				$className = $position.'-in';
				
				if ($i % $modulesPerRow == 0) {
					$className .= ' '.$position.'-row-first';
					$rowClass = 'rowcount_';
					$scheme = $modulesPerRow;
					if ($i + $modulesPerRow > count($modules)) {
						$scheme = count($modules) % $modulesPerRow;
					}
					$html .= '<div class="'.$rowClass.$scheme.' clearfix">';
				}
				
				if (($i+1) % $modulesPerRow == 0 || $i == count($modules)-1) {
					$className .= ' '.$position.'-row-last';
				}
				
				$html .= '<div class="'.$className.'">';
				$html .= '<div class="'.$position.'-bg'.'">';
				$html .= parent::renderModule($modules[$i], $attribs);
				$html .= '</div>';
				$html .= '</div>';
				
				if (($i+1) % $modulesPerRow == 0 || $i == count($modules)-1) {
					$html .= '</div>';
				}
				
				$k = 1 - $k;
			}
			
			$html .= '</div>';
			
		}
		return $html;
	}
}

?> 