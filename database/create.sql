drop database if exists allAnnouncements;
create database allAnnouncements;
use allAnnouncements;

create table announcement(
	id integer auto_increment primary key,
    create_timestamp datetime,
    title varchar(100),
    author varchar(100),
    message text
);

insert into announcement (create_timestamp, title, author, message) values
	('2019-01-23 22:00:00', 'title1', 'Mr Ryan BANGRAS', 'text1');
insert into announcement (create_timestamp, title, author, message) values
	('2019-01-23 22:00:00', 'title2', 'Mr Ryan BANGRAS', 'text2');
insert into announcement (create_timestamp, title, author, message) values
	('2019-01-23 22:00:00', 'title3', 'Mr Ryan BANGRAS', 'text3');
insert into announcement (create_timestamp, title, author, message) values
	('2019-01-23 22:00:00', 'title4', 'Mr Ryan BANGRAS', 'text4');