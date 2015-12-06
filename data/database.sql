DROP TABLE IF EXISTS User;
CREATE TABLE User(
		idUser INTEGER PRIMARY KEY AUTOINCREMENT,
		username VARCHAR2(50),
		password VARCHAR2(250),
		registerDate DATE
);

DROP TABLE IF EXISTS Event;
CREATE TABLE Event (
		idEvent INTEGER PRIMARY KEY AUTOINCREMENT,
		idUser INTEGER NOT NULL,
		isPublic INTEGER,		/* 1-publico 0-privado */
		title VARCHAR2(100),
		image VARCHAR2(255),
		eventDate DATE,
		description VARCHAR2(100),
		idType INTEGER NOT NULL
);

DROP TABLE IF EXISTS Type;
CREATE TABLE Type (
		idType INTEGER PRIMARY KEY AUTOINCREMENT,
		type VARCHAR2(50)
);

INSERT INTO Type (type) VALUES ("Party");
INSERT INTO Type (type) VALUES ("Concert");
INSERT INTO Type (type) VALUES ("Conference");
INSERT INTO Type (type) VALUES ("Meet");
INSERT INTO Type (type) VALUES ("Reunion");