create database rssFeedsApi;
create table rssFeedStore
(
    id          int(255) auto_increment
        primary key,
    title       varchar(255) not null,
    link        varchar(255) not null,
    description text         not null,
    pubDate     varchar(255) not null,
    category    varchar(255) not null,
    updated_at  datetime     null,
    created_at  datetime     null
);

create table urlStore
(
    id         int(255) auto_increment
        primary key,
    url        varchar(255) not null,
    website    varchar(255) not null,
    updated_at datetime     null,
    created_at datetime     null
);

