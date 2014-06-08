create database cupon_dev;

use cupon_dev;

create table mobile_company (
	id int not null auto_increment,
	name varchar(30) not null,
	primary key (id)
) engine=InnoDB;

create table cupon_dev.profession (
	id int not null auto_increment,
	name varchar(30) not null,
	primary key (id)
) engine=InnoDB;

create table cupon_dev.user (
	name varchar(30) not null,
	surname varchar(30) not null,
	email varchar(30) not null,
	birthday datetime not null,
	address varchar(30) not null,
	city varchar(30) not null,
	country varchar(30) not null,
	phone varchar(30) not null,
	mobile varchar(30) not null,
	mobile_company_id int not null,
	profession_id int not null,
	create_date datetime not null,
	voucher mediumint unsigned not null,
	primary key (email),
	foreign key (mobile_company_id) references mobile_company(id),
	foreign key (profession_id) references profession(id),
	unique key (voucher)
) engine=InnoDB;