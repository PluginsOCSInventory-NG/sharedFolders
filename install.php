<?php

/**
 * This function is called on installation and is used to create database schema for the plugin
 */
function extension_install_sharedfolders()
{
    $commonObject = new ExtensionCommon;

    $commonObject -> sqlQuery("CREATE TABLE IF NOT EXISTS `sharedfolders` (
                          `ID` INT(11) NOT NULL AUTO_INCREMENT,
                          `HARDWARE_ID` INT(11) NOT NULL,
                          `ShareName` VARCHAR(256) DEFAULT NULL,
                          `SharePath` VARCHAR(256) DEFAULT NULL,
                          `ShareType` VARCHAR(8) DEFAULT NULL,
                          `ShareDesc` VARCHAR(256) DEFAULT NULL,
                          PRIMARY KEY  (`ID`,`HARDWARE_ID`)
                        ) ENGINE=INNODB;");
}

/**
 * This function is called on removal and is used to destroy database schema for the plugin
 */
function extension_delete_sharedfolders()
{
    $commonObject = new ExtensionCommon;
    $commonObject -> sqlQuery("DROP TABLE IF EXISTS `sharedfolders`");
}

/**
 * This function is called on plugin upgrade
 */
function extension_upgrade_sharedfolders()
{

}
