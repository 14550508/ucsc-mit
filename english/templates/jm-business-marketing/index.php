<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined( '_JEXEC' ) or die;
// including base setup file
include_once (JPATH_ROOT."/templates/".$this->template.'/lib/php/dj_setup.php');
?>
<?php if ($this->direction == 'rtl') { ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php } else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php } ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $direction; ?>" >
<head>
	<jdoc:include type="head" />
	<?php
 	// including template header files
	include_once (JPATH_ROOT."/templates/".$this->template.'/lib/php/dj_head.php');
	?>
</head>
<body>
	<div id="jm-allpage" style="width: <?php echo $page_width; ?>;">
		<div id="jm-top" class="clearfix">
			<div id="jm-logo-sitedesc">
				<h1 id="jm-logo">
					<a href="<?php echo $this->baseurl; ?>" onFocus="blur()" ><?php if ($logo != null ): ?><img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>" alt="<?php echo htmlspecialchars($templateparams->get('sitetitle'));?>" border="0"/><?php else: ?><?php echo htmlspecialchars($templateparams->get('sitetitle'));?><?php endif; ?></a>
				</h1>
				<?php if ($sitedescription != null): ?>
				<div id="jm-sitedesc">
					<?php echo htmlspecialchars($templateparams->get('sitedescription'));?>
				</div>
				<?php endif; ?>
			</div>
			<?php if($this->countModules('position-0')) : ?> 
			<div id="jm-search">
				<jdoc:include type="modules" name="position-0" style="raw" />
			</div>
			<?php endif; ?>
		</div>
		<?php if($this->countModules('dj-menu-top')) : ?> 
		<div id="jm-topmenu">
			<jdoc:include type="modules" name="dj-menu-top" style="raw" />
		</div>
		<?php endif; ?>
		<?php if($this->countModules('header')) : ?> 
		<div id="jm-header">
			<jdoc:include type="modules" name="header" style="xhtml" />
		</div>
		<?php endif; ?>
		<div id="jm-main" class="<?php echo $currentScheme ?> clearfix"> <!--start: main div-->
			<?php
			if (!is_array($schemeOutput)) {
			echo '<p align="center"><b>Wrong SCHEME OPTION. Please, set valid scheme name<b></p>';
			} else {
			$i=1;
			foreach ($schemeOutput as $item) {
			if ($i==1){
				$className = 'first';
			}
			else if ($i==2){
				$className = 'second';
			}
			else if ($i==3){
				$className = 'third';
			}
			if (stristr($item,'left')) { ?>	  				
			<?php if($this->countModules('position-7')) : ?>
			<div id="jm-left" class="<?php echo $className; ?>" style="width: <?php echo $left_width; ?>;">
				<jdoc:include type="modules" name="position-7" style="djmodule" />
			</div>
			<?php endif; ?>  
			<?php } 	
	      	else if (stristr($item,'content')) 
	        {
	        ?>
			<div id="jm-content" class="<?php echo $className; ?>" style="width: <?php echo $content_width; ?>;">
				<?php if($this->countModules('breadcrumbsload')) : ?> 
				<div id="jm-pathway">
					<jdoc:include type="modules" name="breadcrumbsload" style="raw" /> 
				</div>
				<?php endif; ?>
				<div id="jm-maincontent">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
			</div>  
			<?php } ?>
			<?php
	        if (stristr($item, 'right'))
	        {
	        ?>
	        <div id="jm-right" class="<?php echo $className; ?>" style="width: <?php echo $right_width; ?>;">
	        	<jdoc:include type="modules" name="rightload" style="djmodule"/>
	        </div>
			<?php
	        }
	        $i++;
	        }
	        }
	        ?>
		</div>
		<?php if($this->countModules('bottom')) : ?>
		<div id="jm-bottom-mods">
			<?php echo DJModuleHelper::renderModules('bottom','djmodule',4); ?>
		</div>
	 	<?php endif; ?>	
		<div id="jm-footer" class="clearfix">
			<div id="jm-copyrights">
				<jdoc:include type="modules" name="copyrights" style="raw"/>
			</div>
			<div id="jm-poweredby">
				Copyright &copy; 2010 -2011 All Rights Reserved. Powered by <a href="http://skynet.lk" onFocus="blur()" target="_blank" title="skynet">Skynet</a>
			</div>
		</div>
		<?php if($stylearea) : ?>
		<div id="jm-stylearea">
			<a href="#" id="style_icon-1" class="style_switcher"><img src="<?php echo $jm_path;?>images/orange.png" alt="Orange Colour" border="0"/></a>
			<a href="#" id="style_icon-2" class="style_switcher"><img src="<?php echo $jm_path;?>images/red.png" alt="Red Colour" border="0"/></a>
			<a href="#" id="style_icon-3" class="style_switcher"><img src="<?php echo $jm_path;?>images/blue.png" alt="Blue Colour" border="0"/></a>
			<a href="#" id="style_icon-4" class="style_switcher"><img src="<?php echo $jm_path;?>images/green.png" alt="Green Colour" border="0"/></a>
		</div>
		<?php endif; ?>
	</div>
</body>
</html>