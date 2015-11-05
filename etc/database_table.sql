create database gigei;

create table gigei.users (
  id INT auto_increment,
  name VARCHAR(20),
  updated_date TIMESTAMP,
  address VARCHAR(100),
  tel VARCHAR(13),
  sex SET('male', 'female', 'others'),
  nickname VARCHAR(20),
  work VARCHAR(20),
  hobby VARCHAR(100),
  primary key(id)
);
