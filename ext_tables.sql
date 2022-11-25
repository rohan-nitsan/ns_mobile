CREATE TABLE tx_nsmobile_domain_model_mobiles (
	name varchar(255) NOT NULL DEFAULT '',
	price int(11) NOT NULL DEFAULT '0',
	description text,
	manufacture_date date DEFAULT NULL,
	warranty varchar(255) NOT NULL DEFAULT '',
	image int(11) unsigned NOT NULL DEFAULT '0',
	ram varchar(255) NOT NULL DEFAULT '',
	model int(11) unsigned DEFAULT '0',
	brand int(11) unsigned DEFAULT '0',
	technology int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_nsmobile_domain_model_brand (
	name varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	logo int(11) unsigned NOT NULL DEFAULT '0',
	model int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_nsmobile_domain_model_accessories (
	name varchar(255) NOT NULL DEFAULT '',
	price int(11) NOT NULL DEFAULT '0',
	image int(11) unsigned NOT NULL DEFAULT '0',
	model int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_nsmobile_domain_model_model (
	brand int(11) unsigned DEFAULT '0' NOT NULL,
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_nsmobile_domain_model_technology (
	name varchar(255) NOT NULL DEFAULT ''
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder