CREATE DATABASE whitireia_cafe;

CREATE TABLE food(
	productID int(11) AUTO_INCREMENT PRIMARY KEY not null,
	name varchar(256) not null,
	price decimal(11,2) not null,
	description varchar(256) not null,
	item_type varchar(256) not null,
	product_image BLOB
);

CREATE TABLE user(
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	user_first varchar(256) not null,
	user_last varchar(256) not null,
	user_email varchar(256) not null,
	user_username varchar(256) not null,
	user_password varchar(256) not null,
	user_type varchar(256) DEFAULT 'student' not null
);

CREATE TABLE user_order(
	order_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	productID int(11),
	user_id int(11)
);
	
	
INSERT INTO food (name, price, description, item_type)
	VALUES ('Burger', '7.50', 'Delicious Hamburger', 'hot-food'),
	 ('Pizza', '12.50', 'Chicken Pizza', 'hot-food'),
	 ('Pie', '3', 'Mince and cheese pie', 'hot-food'),
	 ('Beef Sandwich', '8.50', 'Beef sandwich', 'cold-food'),
	 ('Egg salad', '6', 'Freshly made egg salad with potatoes', 'cold-food'),
	 ('Chicken Sandwich', '8.50', 'Chicken sandwich', 'cold-food'),
	 ('Hot chocolate', '5', 'Hot chocolate with marshmellos', 'hot-drink'),
	 ('Coffee', '5.50', 'Coffee made from the barista', 'hot-drink'),
	 ('Tea', '4', 'Herbal tea', 'hot-drink'),
	 ('Water', '4.50', 'Cold water', 'cold-drink'),
	 ('Powerade', '4.50', 'Red powerade', 'cold-drink'),
	 ('Orange juice', '5', 'Orange juice', 'cold-drink');

INSERT INTO user (user_first, user_last, user_email, user_username, user_password)
	VALUES ('Wiremu', 'Sharman', 'wiremu@sharman.com', 'wiremusharman', 'pass');

INSERT INTO user (user_first, user_last, user_email, user_username, user_password, user_type)
	VALUES ('Iwan', 'Tjhin', 'iwan@tutor.com', 'iwantutor', 'pass', 'staff');
