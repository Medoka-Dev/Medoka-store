CREATE SEQUENCE user_id_seq
    INCREMENT BY 3
    START WITH 10000000
    MINVALUE 10000000
    MAXVALUE 99999999
    CYCLE;
create table users (
    user_id int(8) primary key Default user_id_seq.NEXTVAL,
    username varchar(50) unique not null,
    password varchar(255) not null,
    email varchar(255) not null unique
);
