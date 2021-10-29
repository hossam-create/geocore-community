<?php
//block.add_footer_html.php
/**************************************************************************
Geodesic Classifieds & Auctions Platform 18.02
Copyright (c) 2001-2018 Geodesic Solutions, LLC
All rights reserved
http://geodesicsolutions.com
see license attached to distribution
**************************************************************************/
##########GIT Build Data##########
## 
## File Changed In GIT Commit:
## 
##    7.3beta2-114-g74766f6
## 
##################################

//This fella takes care of {add_footer_html}...{/add_footer_html}
function smarty_block_add_footer_html ($params, $content, Smarty_Internal_Template $smarty, &$repeat)
{
	//only output on closing tag
	if (!$repeat) {
		if (isset($content)) {
			//figure out...  if set to use footer
			$view = geoView::getInstance();
			if (!isset($view->_canUseFooter)) {
				$db = DataAccess::getInstance();
				//can use footer if not in admin, not in ajax, and setting turned on to do so
				$view->_canUseFooter = (!defined('IN_ADMIN') && !geoAjax::isAjax() && $db->get_site_setting('useFooterJs'));
			}
			if ($view->_canUseFooter) {
				//we do indeed add to the footer rather than displaying it here.
				
				$footer = ''.$view->_add_footer_html;
				$footer .= $content;
				$view->_add_footer_html = $footer;
			} else {
				//not using the {footer_html} so just output the content in-place
				return $content;
			}
		}
	}
}
