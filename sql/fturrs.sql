
-- USERS TABLE --
CREATE TABLE users(
	users_Id INT(15) NOT NULL AUTO_INCREMENT,
   us_pass VARCHAR(255),
   us_name VARCHAR(255),
   us_sex VARCHAR(20),
   us_email VARCHAR(255),
   us_phone VARCHAR(15),
   us_profile VARCHAR(255),
   PRIMARY KEY(users_Id)
)ENGINE=INNODB AUTO_INCREMENT=100;

-- ADMIN TABLE --
CREATE TABLE Admin(
	admin_Id INT(15) NOT NULL AUTO_INCREMENT,
   ad_pass VARCHAR(255),
   ad_name VARCHAR(255),
   ad_sex VARCHAR(20),
   ad_email VARCHAR(255),
   ad_phone VARCHAR(15),
   ad_profile VARCHAR(255),
   PRIMARY KEY(admin_Id)
)ENGINE=INNODB AUTO_INCREMENT=1001;

-- BUILDING TABLE --
CREATE TABLE building(
	bd_Id INT(15) NOT NULL,
   bd_name VARCHAR(255),
   PRIMARY KEY(bd_Id)
)ENGINE=INNODB AUTO_INCREMENT=1;

-- STAFF TABLE --
CREATE TABLE staff(
	staff_Id INT(15) NOT NULL AUTO_INCREMENT,
   bd_Id INT(15) NOT NULL,
   st_pass VARCHAR(255),
   st_name VARCHAR(255),
   st_sex VARCHAR(20),
   st_email VARCHAR(255),
   st_phone VARCHAR(15),
   st_profile VARCHAR(255),
   PRIMARY KEY(staff_Id),
   FOREIGN KEY(bd_Id) REFERENCES building(bd_Id)
)ENGINE=INNODB AUTO_INCREMENT=501;

-- ROOM TABLE --
CREATE TABLE room(
	room_Id INT(15) NOT NULL AUTO_INCREMENT,
   bd_Id INT(15) NOT NULL,
   staff_Id INT(15) NOT NULL,
   r_name VARCHAR(255),
   r_capacity INT(100),
   r_img VARCHAR(255),
   r_status VARCHAR(50),
   r_code VARCHAR(100),
   r_equipment VARCHAR(255),
   PRIMARY KEY(room_Id),
   FOREIGN KEY(bd_Id) REFERENCES building(bd_Id),
   FOREIGN KEY(staff_Id) REFERENCES staff(staff_Id)
)ENGINE=INNODB AUTO_INCREMENT=101;

-- RESERVATION TABLE --
CREATE TABLE reservation(
	rserv_Id INT(15) NOT NULL AUTO_INCREMENT,
   bd_Id INT(15) NOT NULL,
   room_Id INT(15) NOT NULL,
   numpople INT(15),
   obj VARCHAR(500),
   startdate DATE,
   enddate DATE,
   starttime TIME,
   endtime TIME,
   rserv_status VARCHAR(255),
   PRIMARY KEY(rserv_Id),
   FOREIGN KEY(bd_Id) REFERENCES building(bd_Id),
   FOREIGN KEY(room_Id) REFERENCES room(room_Id)
)ENGINE=INNODB AUTO_INCREMENT=1;
