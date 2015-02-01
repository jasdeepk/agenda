use test; -- change to DB if need be
drop table if exists Event; 
create table Event
	(dateE DateTime not null, -- DateTime instead? 2015-01-31 23:12:32 ? 
    typeE enum('work', 'play') not null,
	text varchar(200),
	id int unsigned not null
    PRIMARY KEY (dateE, typeE, id)
   );
   
drop table if exists aPerson;
create table aPerson
	(id int unsigned not null,
	name varchar(20) not null,
	password varchar(20) not null,
	PRIMARY KEY (id)
	);
	
ALTER TABLE Event
ADD FOREIGN KEY (id)
REFERENCES aPerson(id)
 on DELETE CASCADE
	on UPDATE CASCADE; 	
	
insert into aPerson(100, Boberto, password1);
insert into aPerson(101, Jane, password2);

insert into Event(2015-01-31 16:30:00, 'play', 'go bother whales', 100);
insert into Event(2015-01-31 16:45:00, 'work', 'go kill whales', 101);
insert into Event(2015-01-31 17:00:00, 'play', 'go laugh at Boberto', 101);
insert into Event(2015-01-31 17:15:00, 'work', 'get revenge on Jane', 100);

insert into Event(2015-01-01 8:00:00, 'work', null, 100);
insert into Event(2015-01-01 8:30:30, 'play', null, 101);
insert into Event(2015-01-01 9:30:00, 'work', null, 101);