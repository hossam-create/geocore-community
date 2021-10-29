<?php

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
##    7.5.0-13-g6eae54b
##
##################################

class address2ImportItem extends geoImportItem
{
	protected $_name = "Address 2";
	protected $_description = "The user's street address (second line)";
	protected $_fieldGroup = self::USER_LOCATION_FIELDGROUP;
	
	public $displayOrder = 1;
	
	protected final function _cleanValue($value)
	{
		$value = addslashes(trim($value));
		return $value;
	}
	
	
	protected final function _updateDB($value, $groupId)
	{
		geoImport::$tableChanges['userdata']['address_2'] = " `address_2` = '{$value}' ";
		return true;
	}
	 
}