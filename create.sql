drop database if exists allAnnoucements;
create database allAnnoucements;
use allAnnoucements;

create table post (
    id integer auto_increment primary key,
    create_timestamp datetime,
    update_timestamp datetime,
    title varchar(100),
    author varchar(100),
    entry text,
);

insert into post (create_timestamp, update_timestamp, title, author, entry) values 
    ('2024-01-01 22:00:00', '2024-01-01 22:00:00', "Welcome to school", "Mr Ryan BANGRAS", "Welcome back to school, students. In this site, 
    all announcements will be posted here.");
insert into post (create_timestamp, update_timestamp, title, author, entry) values 
    ('2024-01-02 11:00:00', '2024-01-02 1:00:00', "Official letter from school", "Mr Ryan BANGRAS", "Do remember to bring in the official letter
    of enrollment tomorrow!");
