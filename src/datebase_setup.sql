create table users (
    user_id int primary key AUTO_INCREMENT,
    username varchar(50) unique not null,
    password varchar(255) not null,
    email varchar(255) not null unique
) ;
