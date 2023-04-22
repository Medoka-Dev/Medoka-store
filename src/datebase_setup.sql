CREATE SEQUENCE user_id_seq
    INCREMENT BY 3
    START WITH 10000000
    MINVALUE 10000000
    MAXVALUE 99999999
    CYCLE;
CREATE SEQUENCE game_id_seq
    INCREMENT BY 3
    START WITH 10000000
    MINVALUE 10000000
    MAXVALUE 99999999
    CYCLE;
create table users (
    user_id int(8) primary key Default (NEXT VALUE FOR user_id_seq),
    username varchar(50) unique not null,
    password varchar(255) not null,
    email varchar(255) not null unique
);
create table games (
    game_id int(8) primary key Default (NEXT VALUE FOR game_id_seq),
    label varchar(50) unique not null,
    genre varchar(50) not null,
    release_date Date not null,
    image varchar(50) not null,
    company varchar(50) not null,
    description varchar(600) ,
    price int(4) not null
);
create table likes (
    user_id int(8) not null,
    game_id int(8) not null,
    primary key (game_id,user_id),
    constraint fk_users foreign key(user_id) references users(user_id),
    constraint fk_games foreign key(game_id) references games(game_id)
);
