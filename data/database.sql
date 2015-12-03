DROP TABLE IF EXISTS User;
CREATE TABLE USER (
		idUser INTEGER PRIMARY KEY AUTOINCREMENT,
		username VARCHAR2(50),
		password VARCHAR2(250),
		registerDate DATE,
		gender VARCHAR2(10),
);

DROP TABLE IF EXISTS Event;
CREATE TABLE Event (
		idEvent INTEGER PRIMARY KEY AUTOINCREMENT,
		idUser INTEGER NOT NULL,
		isPublic INTEGER NOT NULL,		/* 1-publico 0-privado */
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