<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

/**
 * @version		$Id: modules.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

function modChrome_djmodule($module, &$params, &$attribs) 
{
?>
<div class="djmodule <?php echo $params->get('moduleclass_sfx'); ?>" id="Mod<?php echo $module->id; ?>">
	<?php if ($module->showtitle != 0) : ?>
	<div class="title_border">
		<div class="title_left">
			<div class="title_right">
				<h3 class="title"><?php echo $module->title; ?></h3>
			</div>
		</div>
	</div>
	<?php endif; ?>
    <div class="module-content">
    	<?php echo $module->content; ?>
    </div>
</div>
<?php
}
?>