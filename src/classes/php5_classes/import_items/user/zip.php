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
##    7.5.3-36-gea36ae7
##
##################################

class zipImportItem extends geoImportItem
{
	protected $_name = "Zip / Postal Code";
	protected $_description = "The user's Zip (Postal) Code";
	protected $_fieldGroup = self::USER_LOCATION_FIELDGROUP;
	
	public $displayOrder = 2;
	
	protected final function _cleanValue($value)
	{
		$value = addslashes(trim($value));
		return $value;
	}
	
	protected final function _updateDB($value, $groupId)
	{
		geoImport::$tableChanges['userdata']['zip'] = " `zip` = '{$value}' ";
		return true;
	}
	 
}