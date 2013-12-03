DROP DATABASE IF EXISTS team15;

CREATE DATABASE team15;

use team15;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS friends;
DROP TABLE IF EXISTS usersBooks;


CREATE TABLE books
( 	isbn VARCHAR(13) NOT NULL PRIMARY KEY,
	title VARCHAR(50) CHARACTER SET utf8,
	author_first_name VARCHAR(20) CHARACTER SET utf8,
	author_last_name VARCHAR(20) CHARACTER SET utf8
) engine=InnoDB;

CREATE TABLE users
( 	username VARCHAR(20) CHARACTER SET utf8 PRIMARY KEY NOT NULL,
	password VARCHAR(20) CHARACTER SET utf8 NOT NULL,
	current_book VARCHAR(13),
	first_name VARCHAR(20) CHARACTER SET utf8,
	last_name VARCHAR(20) CHARACTER SET utf8,
	FOREIGN KEY (current_book) REFERENCES books(isbn)
) engine=InnoDB;

CREATE TABLE friends
( 	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user VARCHAR(20) CHARACTER SET utf8,
	friend VARCHAR(20) CHARACTER SET utf8,
	FOREIGN KEY (user) REFERENCES users(username),
	FOREIGN KEY (friend) REFERENCES users(username)
) engine=InnoDB;

CREATE TABLE usersBooks
( 	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user VARCHAR(20) CHARACTER SET utf8,
	book VARCHAR(13) NOT NULL,
	FOREIGN KEY (user) REFERENCES users(username),
	FOREIGN KEY (book) REFERENCES books(isbn)
) engine=InnoDB;

insert into books values('0345333926', 'Ringworld','Larry','Niven');
insert into books values('9781629100111', 'The Call of the Wild','Jack','London');
insert into books values('0486292568', 'Wuthering Heights', 'Emily', 'Bronte');
insert into books values('0307417131', 'Hitchhiker\'s Guide to the Galaxy', 'Douglas', 'Adams');
insert into books values('9780307567277', 'Cat\'s Cradle: A Novel', 'Kurt', 'Vonnegut');

insert into users values('authomps','password','0345333926','Austin','Thompson');
insert into users values('abroom','123456',NULL,'Alex','Broom');
insert into users values('sampcakes','hey',NULL,'Samp','Cakes');
insert into users values('hello','password',NULL,'Austin','Tomboy');
insert into users values('ncoats','123',NULL,'Nick','Coats');
insert into users values('bill','texas',NULL,'Bill','Texas');

insert into friends values(NULL, 'authomps', 'sampcakes');
insert into friends values(NULL, 'authomps', 'abroom');
insert into friends values(NULL, 'abroom', 'ncoats');

insert into usersBooks values(NULL, 'authomps', '0345333926');
insert into usersBooks values(NULL, 'authomps', '9781629100111');
insert into usersBooks values(NULL, 'ncoats', '0345333926');
