<?php
/**
 * @version		$Id: default.php 21411 2011-05-31 15:33:40Z infograf768 $
 * @package		Joomla.Site
 * @subpackage	mod_related_items
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<div class="mod_related_items_thumb<?php echo $moduleclass_sfx; ?>">
    <!-- Related Articles with Thumbnails by Cedric Walter - www.waltercedric.com -->
    <?php foreach ($list as $item) : ?>
    <div class="mod_related_items_thumb_entry">
        <span class='mod_related_items_thumb_image'>
			<?php
            if ($item->image != null) {
                ?>
                <a href="<?php echo $item->route; ?>">
                    <img id="mod_related_items_thumb_thumb" align="left"
                         alt="<?php echo $item->title; ?>"
                         title="<?php echo $item->title; ?>"
                         src="<?php echo JURI :: base() . "libraries/timthumb/timthumb.php?src=" . $item->image . "&amp;w=" . $params->get('thumbnailWidth') . "&amp;h=" . $params->get('thumbnailHeight') . "&amp;zc=1"?>">
                </a>
                <?php
            }     ?>
		</span>
        <?php
        if ($params->get('useTitle')) {
         ?>
		<span class="mod_related_items_thumb_title">
			<a href="<?php echo $item->route; ?>"><?php echo $item->title; ?></a>
		</span>
        <?php
        }
        ?>
        <?php if ($item->teaser != null) { ?>
        <span class="mod_related_items_thumb_teaser">
			<?php echo $item->teaser; ?><?php echo $params->get('teaserEnding'); ?>
		</span>
        <?php } ?>
    </div>
    <div style="clear:both;"></div>
    <?php endforeach; ?>

	<!--<center>
        <small>
            <small><a href="http://www.waltercedric.com">mod_articles_popular_thumb</a></small>
        </small>
    </center>-->
</div>

