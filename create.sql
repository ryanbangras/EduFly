drop database if exists allAnnouncement;
create database allAnnouncement;
use allAnnouncement;

create table Announcement (
    id integer auto_increment primary key,
    create_timestamp datetime,
    update_timestamp datetime,
    title varchar(100),
    author varchar(100),
    message text
);

insert into Announcement (create_timestamp, update_timestamp, title, author, message) values 
    ('2019-01-23 22:00:00', '2019-01-23 22:00:00', "Term Starts Again", "Mr Ryan BANGRAS", 'Welcome back to school!');
