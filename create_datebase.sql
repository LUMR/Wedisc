create database discussion;
use discussion;

create table header
	(
	parent int not null,
	poster char(20) not null,
	title char(20) not null,
	children int default 0 not null,
	area int default 1 not null,
	posted datetime not null,
	postid int unsigned not null auto_increment primary key
	);

create table body
	(
	postid int unsigned not null primary key,
	message text
	);

-- 创建用户账号
	(
	password char(40) not null
	)

#grant select,insert,update,delete
#on discussion.*
#to webuse@localhost;