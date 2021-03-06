<?php
/**
 * Mage+
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@mageplus.org so we can send you a copy immediately.
 *
 * @category    Mage
 * @package     Mage_Cms
 * @copyright   Copyright (c) 2012 Mage+ (http://www.mageplus.org) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

// add trigger on create
$installer->getConnection()
    ->addTrigger($installer->getTable('cms/block'), 'trig_' . $installer->getTable('cms/block') . '_created',
                  'FOR EACH ROW SET NEW.creation_time = UTC_TIMESTAMP',
                  Varien_Db_Adapter_Interface::TRIGGER_TIME_BEFORE, Varien_Db_Adapter_Interface::EVENT_TYPE_INSERT);

// add trigger on update
$installer->getConnection()
    ->addTrigger($installer->getTable('cms/block'), 'trig_' . $installer->getTable('cms/block') . '_updated',
                  'FOR EACH ROW SET NEW.update_time = UTC_TIMESTAMP, NEW.creation_time = OLD.creation_time',
                  Varien_Db_Adapter_Interface::TRIGGER_TIME_BEFORE, Varien_Db_Adapter_Interface::EVENT_TYPE_UPDATE);
    
// add trigger on create
$installer->getConnection()
    ->addTrigger($installer->getTable('cms/page'), 'trig_' . $installer->getTable('cms/page') . '_created',
                  'FOR EACH ROW SET NEW.creation_time = UTC_TIMESTAMP',
                  Varien_Db_Adapter_Interface::TRIGGER_TIME_BEFORE, Varien_Db_Adapter_Interface::EVENT_TYPE_INSERT);

// add trigger on update
$installer->getConnection()
    ->addTrigger($installer->getTable('cms/page'), 'trig_' . $installer->getTable('cms/page') . '_updated',
                  'FOR EACH ROW SET NEW.update_time = UTC_TIMESTAMP, NEW.creation_time = OLD.creation_time',
                  Varien_Db_Adapter_Interface::TRIGGER_TIME_BEFORE, Varien_Db_Adapter_Interface::EVENT_TYPE_UPDATE);

$installer->endSetup();