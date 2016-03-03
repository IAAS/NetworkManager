#!/bin/php
<?php
/*
 * SQL Database Settings
 */
define("DB_HOST", "localhost");
define("DB_USER", "TestUser2");
define("DB_PASS", "De9zDAAdNs45xzJA");
define("DB_NAME", "TestWorld");

define("DEBUG", true);


/*
 * SQL Commands
 */
define("SQL_CREATE_DATABASE_DESCRIPTIONS", json_encode(array(
	"create Address table",
	"create Computer table",
	"create Key table",
	"create Login table",
	"create Pool table",
	"create foreign key on Pool table",
	"create foreign key on Pool table",
	"create foreign key on Address table",
	"create foreign key on Login table",
	"create foreign key on Key table"
)));
define("SQL_CREATE_DATABASE_COMMANDS", json_encode(array(
	"CREATE TABLE Address (id tinyint NOT NULL AUTO_INCREMENT, dns bit(1) DEFAULT 0 NOT NULL, dhcp bit(1) DEFAULT 0 NOT NULL, dynamic bit(1) DEFAULT 0 NOT NULL, Computer_id int(10) UNIQUE, PRIMARY KEY (id), UNIQUE INDEX (id));",
	"CREATE TABLE Computer (id int(10) NOT NULL AUTO_INCREMENT, mac varchar(17) NOT NULL UNIQUE, name varchar(255) UNIQUE, location varchar(255), type varchar(255), `function` varchar(255), production bit(1) DEFAULT 0 NOT NULL, manager varchar(255), PRIMARY KEY (id), UNIQUE INDEX (id));",
	"CREATE TABLE Key (id int(10) unsigned NOT NULL AUTO_INCREMENT, `key` text, type varchar(5), fingerprint varchar(47), Login_id unsigned, PRIMARY KEY (id), UNIQUE INDEX (id));",
	"CREATE TABLE Login (id int(10) unsigned NOT NULL AUTO_INCREMENT, username varchar(255) NOT NULL, password varchar(255) NOT NULL, Computer_id int(10) NOT NULL, PRIMARY KEY (id), UNIQUE INDEX (id));",
	"CREATE TABLE Pool (id int(10) unsigned NOT NULL AUTO_INCREMENT, name varchar(255) NOT NULL, start_Address tinyint NOT NULL, end_Address tinyint NOT NULL, PRIMARY KEY (id), UNIQUE INDEX (id));",
	"ALTER TABLE Pool ADD INDEX FKPool851427 (start_Address), ADD CONSTRAINT FKPool851427 FOREIGN KEY (start_Address) REFERENCES Address (id);",
	"ALTER TABLE Pool ADD INDEX FKPool715931 (end_Address), ADD CONSTRAINT FKPool715931 FOREIGN KEY (end_Address) REFERENCES Address (id);",
	"ALTER TABLE Address ADD INDEX FKAddress312723 (Computer_id), ADD CONSTRAINT FKAddress312723 FOREIGN KEY (Computer_id) REFERENCES Computer (id);",
	"ALTER TABLE Login ADD INDEX FKLogin947788 (Computer_id), ADD CONSTRAINT FKLogin947788 FOREIGN KEY (Computer_id) REFERENCES Computer (id);",
	"ALTER TABLE Key ADD INDEX FKKey890017 (Login_id), ADD CONSTRAINT FKKey890017 FOREIGN KEY (Login_id) REFERENCES Login (id);"
)));

define("SQL_CLEAR_DATABASE_DESCRIPTION", json_encode(array(
	"drop foreign key on Pool table",
	"drop foreign key on Pool table",
	"drop foreign key on Address table",
	"drop foreign key on Login table",
	"drop foreign key on Key table",
	"drop table Address",
	"drop table Computer",
	"drop table Key",
	"drop table Login",
	"drop table Pool",
)));
define("SQL_CLEAR_DATABASE_COMMANDS", json_encode(array(
	"ALTER TABLE Pool DROP FOREIGN KEY FKPool851427;",
	"ALTER TABLE Pool DROP FOREIGN KEY FKPool715931;",
	"ALTER TABLE Address DROP FOREIGN KEY FKAddress312723;",
	"ALTER TABLE Login DROP FOREIGN KEY FKLogin947788;",
	"ALTER TABLE Key DROP FOREIGN KEY FKKey890017;",
	"DROP TABLE IF EXISTS Address;",
	"DROP TABLE IF EXISTS Computer;",
	"DROP TABLE IF EXISTS Key;",
	"DROP TABLE IF EXISTS Login;",
	"DROP TABLE IF EXISTS Pool;"
)));
?>