USE worldwork;

CREATE TABLE users (
    userId int auto_increment not null primary key,
	email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    profile VARCHAR(50) NOT NULL,
    constraint unq_email unique (email)
)Engine=InnoDB;

