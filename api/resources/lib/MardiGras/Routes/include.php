<?php
/* Include all route scripts */

// Examples and tests
if (APPLICATION_ENV == "development")
	include __DIR__ .  '/Examples.php';

// Authentication methods
require __DIR__ . '/OAuth.php';

// POS
require __DIR__ . '/ClerkGroupPermissions.php';
require __DIR__ . '/ClerkGroupPermissionsAssign.php';
require __DIR__ . '/ClerkGroups.php';
require __DIR__ . '/Clerks.php';
require __DIR__ . '/Customers.php';
require __DIR__ . '/Inventory.php';
	require __DIR__ . '/Inventory/InventoryPieces.php';
require __DIR__ . '/Invoices.php';
	require __DIR__ . '/Invoices/DepositMethods.php';
require __DIR__ . '/Orders.php';
require __DIR__ . '/Vendors.php';