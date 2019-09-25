<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

/**
* @version $Id: component.php 16465 2010-04-26 01:46:24Z

eddieajau $
* @package Joomla.Site
* @copyright Copyright (C) 2005 - 2011 Open Source Matters, Inc. All

rights reserved.
* @license GNU General Public License version 2 or later; see

LICENSE.txt
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
if(JRequest::getVar('direction')=='rtl'){
	setcookie("djdirection", "rtl");
	$direction='rtl';
} else if(JRequest::getVar('direction')=='ltr'){
	setcookie("djdirection", "ltr");
	$direction='ltr';
} else {
	$direction=JRequest::getVar('djdirection',$this->direction);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $direction; ?>">
<head>
	<jdoc:include type="head" />
	<link href="<?php echo $this->baseurl ?>/templates/jm-business-marketing/css/print.css" rel="stylesheet" type="text/css" />
	<?php if($direction == 'rtl'): ?>
	<link href="<?php echo $this->baseurl ?>/templates/jm-business-marketing/css/print_rtl.css" rel="stylesheet" type="text/css" />
	<?php endif; ?>
</head>
<body class="contentpane">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>