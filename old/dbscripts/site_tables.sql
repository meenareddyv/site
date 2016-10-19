CREATE TABLE tbl_cultural_registration(
 id int(10) unsigned NOT NULL auto_increment,
 name_of_event varchar(220) not null,
 owner_of_event varchar(120) not null,
 mobile_number int(10) NOT NULL,
 number_of_participants int(10) NOT NULL,
 type_of_event varchar(220) not null,
 duration_in_minutes int(6) not null,
 email_id varchar(150) NOT NULL,
 message text,
 date_created timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
 modified_date timestamp NULL default '0000-00-00 00:00:00',
 PRIMARY KEY  (id)
);


INSERT INTO tbl_cultural_registration
(id,
 name_of_event,
 owner_of_event,
 mobile_number,
 number_of_participants,
 type_of_event,
 duration_in_minutes,
 email_id,
 message,
 date_created
) VALUES(1,'Ugadi','Testing','1231231234',2,'Dancing',10,'test@test.com','Testing form',now());

CREATE TABLE tbl_contact_info(
   id int(10) unsigned NOT NULL auto_increment,
   name varchar(120) not null,
   email_id varchar(150) NOT NULL,
   subject varchar(220) null,
   message text,
   date_created timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
   PRIMARY KEY  (id)
);

INSERT INTO tbl_contact_info(id, name,email_id, subject,message, date_created) VALUES(1, 'MMK','test@test.com','TESTING','TESTING APP',now());

CREATE TABLE tbl_ads(
 id int(10) unsigned NOT NULL auto_increment,
 ad_image_name varchar(100) not null,
 ad_url text,
 date_created timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
 PRIMARY KEY  (id)
);

INSERT INTO tbl_ads(id, ad_image_name, ad_url,date_created) VALUES(1,'c-vision-logo.jpg','http://www.c-visionit.com', now());
INSERT INTO tbl_ads(ad_image_name, ad_url,date_created) VALUES('FamilyDentals_136x60-1.gif','http://www.smilecenters.us', now());
INSERT INTO tbl_ads(ad_image_name,ad_url,date_created) VALUES('MondrianPropertiesv2_136x60.gif','http://www.mondrianproperties.com', now());



CREATE TABLE tbl_volunteer_registration(
 id int(10) unsigned NOT NULL auto_increment,
 name varchar(220) not null,
 mobile_number int(10) NOT NULL,
 interested_in varchar(120) not null,
 email_id varchar(150) NOT NULL,
 message text,
 date_created timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
 modified_date timestamp NULL default '0000-00-00 00:00:00',
 PRIMARY KEY  (id)
);

INSERT INTO tbl_volunteer_registration
(id,
 name,
 mobile_number,
 interested_in,
 email_id,
 message,
 date_created
) VALUES(1,'MMK','1231231234','Food','test@test.com','Testing',now());

