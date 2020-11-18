create table categories
(
	id int auto_increment
		primary key,
	name varchar(50) not null
);

create table product_images
(
	id int auto_increment
		primary key,
	title varchar(50) not null,
	path varchar(255) not null,
	views int default 0 null,
	product_id int null
);

create table products
(
	id int auto_increment
		primary key,
	name varchar(50) not null,
	description varchar(255) null,
	price float default 0 null,
	category_id int null
);

create table users
(
	id int auto_increment
		primary key,
	login varchar(50) null,
	password varchar(50) null
);

