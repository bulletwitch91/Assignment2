CREATE DATABASE whitireia_cafe;

CREATE TABLE food(
	productID int(11) AUTO_INCREMENT PRIMARY KEY not null,
	name varchar(256) not null,
	price float(11) not null,
	description varchar(256) not null,
	item_type varchar(256) not null
);

CREATE TABLE user(
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	user_first varchar(256) not null,
	user_last varchar(256) not null,
	user_email varchar(256) not null,
	user_username varchar(256) not null,
	user_password varchar(256) not null,
	user_type varchar(256) not null
);

INSERT INTO food (name, price, description, item_type)
	VALUES ('Burger', '7.50', 'Delicious Hamburger', 'hot-food'),
	 ('Pizza', '12.50', 'Chicken Pizza', 'hot-food'),
	 ('Pie', '3', 'Mince and cheese pie', 'hot-food'),
	 ('Sandwich', '8.50', 'Egg sandwich', 'cold-food'),
	 ('Hot chocolate', '5', 'Hot chocolate with marshmellos', 'hot-drink'),
	 ('Water', '4.50', 'Cold water', 'cold-drink');
	