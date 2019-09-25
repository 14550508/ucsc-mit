<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

?>
<link href="<?php echo $jm_path;?>css/details.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jm_path;?>css/editor.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jm_path;?>css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jm_path;?>css/menus.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jm_path;?>css/modules.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jm_path;?>css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jm_path;?>css/template.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo $jm_path;?>images/favicon.ico" />
<?php if($direction == 'rtl') { ?>
	<link href="<?php echo $jm_path;?>css/rtl.css" rel="stylesheet" type="text/css" />
<?php } ?>
<?php if($stylearea) { ?>
	<link href="<?php echo $jm_path; ?>css/style<?php echo (isset($_COOKIE['jm_style_business-marketing']) ? $_COOKIE['jm_style_business-marketing'] : $template_color); ?>.css" rel="stylesheet" media="all" type="text/css" />	
<?php } else {  ?>
	<link href="<?php echo $jm_path; ?>css/style<?php echo $template_color; ?>.css" rel="stylesheet" media="all" type="text/css" />
<?php } ?>
<!--[if IE]>
    <link href="<?php echo $jm_path;?>css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 7]>
    <link href="<?php echo $jm_path;?>css/ie7.css" rel="stylesheet" type="text/css" />
    <?php if($direction == 'rtl'): ?>
	<link href="<?php echo $jm_path;?>css/ie7_rtl.css" rel="stylesheet" type="text/css" />
	<?php endif; ?>
<![endif]-->
<script type="text/javascript">
	$template_path = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>';
</script>
<script language="javascript" type="text/javascript" src="<?php echo $jm_path;?>lib/js/template_scripts.js"></script>