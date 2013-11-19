DROP DATABASE IF EXISTS team15;

CREATE DATABASE team15;

use team15;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS friends;
DROP TABLE IF EXISTS usersBooks;


CREATE TABLE books
( 	isbn CHAR(17) NOT NULL PRIMARY KEY,
	title VARCHAR(50) CHARACTER SET utf8,
	author_first_name VARCHAR(20) CHARACTER SET utf8,
	author_last_name VARCHAR(20) CHARACTER SET utf8
) engine=InnoDB;

CREATE TABLE users
( 	username VARCHAR(20) CHARACTER SET utf8 PRIMARY KEY NOT NULL,
	password VARCHAR(20) CHARACTER SET utf8 NOT NULL,
	current_book CHAR(17),
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
	book CHAR(17) NOT NULL,
	FOREIGN KEY (user) REFERENCES users(username),
	FOREIGN KEY (book) REFERENCES books(isbn)
) engine=InnoDB;

insert into users values('authomps','password',NULL,'Austin','Thompson');
insert into users values('abroom','123456',NULL,'Alex','Broom');
insert into users values('sampcakes','hey',NULL,'Samp','Cakes');
insert into users values('hello','password',NULL,'Austin','Tomboy');
insert into users values('ncoats','123',NULL,'Nick','Coats');
insert into users values('bill','texas',NULL,'Bill','Texas');

insert into books values('123-0-123-12345-1', 'Welling and Banana','Jim','Raynor');
insert into books values('321-0-123-12345-1', 'Raynor and Banana','Bill','Raynor');
insert into books values('321-1-123-12345-1', 'Cat in the Hat','Dr','Seuss');
insert into books values('321-1-125-12345-1', 'Ender\'s Game','Cormac','McCarthy');

insert into friends values(NULL, 'authomps', 'sampcakes');
insert into friends values(NULL, 'authomps', 'abroom');
insert into friends values(NULL, 'abroom', 'ncoats');

insert into usersBooks values(NULL, 'authomps', '123-0-123-12345-1');
insert into usersBooks values(NULL, 'authomps', '321-0-123-12345-1');
insert into usersBooks values(NULL, 'ncoats', '123-0-123-12345-1');
