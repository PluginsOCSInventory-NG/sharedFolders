<?php
function plugin_version_sharedfolder()
{
return array('name' => 'sharedfolder',
'version' => '1.0',
'author'=> 'Benoit SARDA, Valentin DEVILLE',
'license' => 'GPLv2',
'verMinOcs' => '2.2');
}

function plugin_init_sharedfolder()
{
$object = new plugins;
$object -> add_cd_entry("sharedfolder","config");

$object -> sql_query("CREATE TABLE IF NOT EXISTS `sharedfolders` (
                      `ID` INT(11) NOT NULL AUTO_INCREMENT,
                      `HARDWARE_ID` INT(11) NOT NULL,
                      `ShareName` VARCHAR(256) DEFAULT NULL,
                      `SharePath` VARCHAR(256) DEFAULT NULL,
                      `ShareType` VARCHAR(8) DEFAULT NULL, 
                      `ShareDesc` VARCHAR(256) DEFAULT NULL,
                      PRIMARY KEY  (`ID`,`HARDWARE_ID`)
                      ) ENGINE=INNODB;"
);

}

function plugin_delete_sharedfolder()
{
$object = new plugins;
$object -> del_cd_entry("sharedfolder");
$object -> sql_query("DROP TABLE `sharedfolders`");

}