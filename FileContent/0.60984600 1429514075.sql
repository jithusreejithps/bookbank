insert into student values('mca401','Amal','MCA15S1','amal@gmail.com','amal');
insert into student values('msw401','Anisha','MSW16S1','anisha@gmail.com','anisha');

insert into books values('bk1','DS and Algo','bala',6,'abc',5);
insert into books values('bk2','Business MIS','fouruzan',4,'abcdr',10);
insert into books values('bk3','C','four',3,'ab',5);
insert into books values('bk4','CPP','mani',2,'poi',12);
insert into books values('bk5','Mental Growth','sethu',6,'poi',9);
insert into books values('bk6','Algorithm','steffy',8,'point',15);
insert into books values('bk7','Data','divya',3,'poioo',17);
insert into books values('bk8','Graphics','meri',4,'salt',13);

insert into department values('D1','Computer');
insert into department values('D2','SocialWork');

insert into course values('C1','Data Structure','P1');
insert into course values('C2','MIS','P1');
insert into course values('C3','C','P1');
insert into course values('C4','CPP','P1');
insert into course values('C5','Psycology','P2');
insert into course values('C6','DM','P1');
insert into course values('C7','CG','P1');
insert into course values('C8','Comedy','P1');


insert into program values('P1','MCA','D1',6);
insert into program values('P2','MSW','D2',4);

insert into batch values('MCA15B1','P1','2012-09-26','2015-12-20','pursuing');
insert into batch values('MCA17B1','P1','2014-09-26','2017-12-20','pursuing');
insert into batch values('MSW16B2','P2','2014-09-26','2016-12-29','pursuing');


insert into semester values('MCA15S1','MCA15B1','Pursuing');
insert into semester values('MCA15S2','MCA15B1','Pursuing');
insert into semester values('MCA15S3','MCA15B1','Pursuing');
insert into semester values('MCA15S4','MCA15B1','Pursuing');
insert into semester values('MCA15S5','MCA15B1','Pursuing');
insert into semester values('MCA15S6','MCA15B1','Pursuing');
insert into semester values('MSW16S1','MSW16B2','Pursuing');
insert into semester values('MSW16S2','MSW16B2','Pursuing');
insert into semester values('MSW16S3','MSW16B2','Pursuing');
insert into semester values('MSW16S4','MSW16B2','Pursuing');

insert into SemCourse values('MCA15S1','C1');
insert into SemCourse values('MCA15S1','C2');
insert into SemCourse values('MCA15S1','C3');
insert into SemCourse values('MCA15S1','C4');
insert into SemCourse values('MSW16S1','C5');
insert into SemCourse values('MCA15S2','C6');
insert into SemCourse values('MCA15S3','C7');
insert into SemCourse values('MCA15S1','C8');

insert into bookassignment values('bk1','C1',5);
insert into bookassignment values('bk2','C2',10);
insert into bookassignment values('bk3','C3',5);
insert into bookassignment values('bk4','C4',12);
insert into bookassignment values('bk5','C5',9);
insert into bookassignment values('bk6','C1',15);
insert into bookassignment values('bk7','C6',17);
insert into bookassignment values('bk8','C7',13);
insert into bookassignment values('bk9','C8',20);
DELETE ORDER

1> bookassignment
2> sembooks
3> course
4> student
5> semester
6> batch
7> program
8> department
9> books(no prblm if deleted first)

INSERT ORDER

1> department//
2> program//
3> batch//
4> course//
5> books
6> semester//
7> bookassignment//
8> sembooks//
9> student//
