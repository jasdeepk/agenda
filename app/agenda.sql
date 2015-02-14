use example; -- change to DB if need be
drop table if exists Event; 
create table Event
	(StartDate DateTime not null, -- DateTime instead? 2015-01-31 23:12:32 ? 
	EndDate DateTime not null,
    TypeE enum('work', 'play') not null,
	Text varchar(80) null,
	Id int unsigned not null,
	Title varchar(30) not null,
    PRIMARY KEY (StartDate, EndDate, TypeE, Id, Title)
   );
   
drop table if exists aPerson;
create table aPerson
	(Id int unsigned not null,
	Name varchar(20) not null,
	Password varchar(20) not null,
	PRIMARY KEY (id)
	);
	
ALTER TABLE Event
ADD FOREIGN KEY (Id)
REFERENCES aPerson(Id)
 on DELETE CASCADE
	on UPDATE CASCADE; 	
	
insert into aPerson values(100, 'Boberto','password1');
insert into aPerson values(101, 'Jane', 'password2');

insert into Event values('2015-01-31 16:30:00', '2015-01-31 16:35:00', 'play', 'go bother whales', 100, 'a');
insert into Event values('2015-01-31 16:45:00', '2015-01-31 16:55:00', 'work', 'go kill whales', 101, 'a');
insert into Event values('2015-01-31 17:00:00', '2015-01-31 17:05:00', 'play', 'go laugh at Boberto', 101, 'a');
insert into Event values('2015-01-31 17:15:00', '2015-01-31 17:35:00', 'work', 'get revenge on Jane', 100, 'a');

insert into Event values('2015-01-01 8:00:00', '2015-01-01 8:35:00', 'work', null, 100, 'b');
insert into Event values('2015-01-01 8:30:30', '2015-01-01 8:35:45', 'play', null, 101, 'b');
insert into Event values('2015-01-01 9:30:00', '2015-01-01 9:35:00', 'work', null, 101, 'b');