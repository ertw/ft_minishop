-- ----------------------------------------------------------------------------
-- set user permies
-- ----------------------------------------------------------------------------
grant create on database minishop_db to minishop_user;
-- ----------------------------------------------------------------------------
-- create schema camagru
-- ----------------------------------------------------------------------------
drop schema if exists minishop_db cascade;
create schema if not exists minishop_db;
set client_encoding to 'utf8';
-- ----------------------------------------------------------------------------
-- table camagru.test
-- ----------------------------------------------------------------------------
create table if not exists minishop_db.users (
  id serial primary key not null
, name varchar(255) not null
, password varchar(255) not null
, creation_date timestamp not null default current_timestamp
, email varchar(255) not null unique
, privilege varchar(255) not null default 'user'
);
-- ----------------------------------------------------------------------------
-- insert test users
-- ----------------------------------------------------------------------------
insert into minishop_db.users (name, password, email) values
-- password: myPass
  ('erik williamson', '$2y$10$cNq1pqJy7g.759cWvpOUM.lYkh5AcSEVDzkWWedzq0iaEYora2K2q', 'me@erik.tw')
-- password: festivus
, ('george costanza', '$2y$10$sTeO7dfHeAkG06PtP2PEhOU1VYpN.D4m/QmVRd0XAGp1kstM8rqjS', 'george.costanza69@yahoo.con')
;
