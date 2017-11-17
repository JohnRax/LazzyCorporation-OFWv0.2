/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.25-MariaDB : Database - lazycorporation-ofwdatabase
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lazycorporation-ofwdatabase` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lazycorporation-ofwdatabase`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_firstname` varchar(100) DEFAULT NULL,
  `a_lastname` varchar(100) DEFAULT NULL,
  `a_username` varchar(100) DEFAULT NULL,
  `a_password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`a_firstname`,`a_lastname`,`a_username`,`a_password`) values (1,'Johnray','Legaspi','johnray','123456'),(2,'Aj','Paradela','ajparadela','123456');

/*Table structure for table `job_description` */

DROP TABLE IF EXISTS `job_description`;

CREATE TABLE `job_description` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `j_jobtitle` varchar(100) NOT NULL,
  `j_employertype` varchar(100) NOT NULL,
  `j_country` varchar(100) NOT NULL,
  `j_districtlocation` varchar(100) NOT NULL,
  `j_type` varchar(100) NOT NULL,
  `j_category` varchar(100) NOT NULL,
  `j_description` text NOT NULL,
  `j_workingstatus` varchar(100) NOT NULL,
  `j_requiredlanguages` varchar(100) NOT NULL,
  `j_contact` int(11) NOT NULL,
  `j_mainduties` varchar(100) DEFAULT NULL,
  `j_cookingskill` varchar(100) DEFAULT NULL,
  `j_applicationemail` varchar(100) NOT NULL,
  `j_nationality` varchar(100) NOT NULL,
  `j_familytype` varchar(100) NOT NULL,
  `j_startdate` varchar(100) NOT NULL,
  `j_monthlysalary` varchar(100) NOT NULL,
  `j_status` varchar(100) NOT NULL,
  `j_dateposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `j_logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`j_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `job_description_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `job_description` */

insert  into `job_description`(`j_id`,`u_id`,`j_jobtitle`,`j_employertype`,`j_country`,`j_districtlocation`,`j_type`,`j_category`,`j_description`,`j_workingstatus`,`j_requiredlanguages`,`j_contact`,`j_mainduties`,`j_cookingskill`,`j_applicationemail`,`j_nationality`,`j_familytype`,`j_startdate`,`j_monthlysalary`,`j_status`,`j_dateposted`,`j_logo`) values (1,16,'Chinese family looking for helper','Direct Employer','Philippines','Taguig','Full Time','Domestic Helper','Looking for helper taking care of 1 year old boy. We are only 3 people in our family and both Working Parents.','Finished Contract','English,Filipino',980898373,'Baby Care,Child Care,Elder Care,Pet Care','none','Lazzy@gmail.com','Filipino Family','Large Family (> 6)','2017-11-25','PHP 25,000','Approved','2017-11-16 16:40:48','daddys_little_helper_infant_bodysuit.jpg'),(2,17,'British/Japanese family looking for a helper','Direct Employer','Hong Kong','wan chai','Full Time','Domestic Helper','We are British/Japanese family of 4, 2 adults, 2 kids(5 and 2 years old), living in Hung Hom area. Looking for someone who is available from January 2018.','Finished Contract','English',2147483647,'Child Care,Housekeeping','Western','jr@gmail.com','British Family','Couple + 2 kids','2018-01-03','PHP 20,000','Approved','2017-11-16 16:43:41','Family-of-4-western-1.jpg'),(3,16,'Looking for a kind and cheerful helper','Direct Employer','Hong Kong','Wan Chai','Part Time','Domestic Helper','We are a kind Hong Kong family living in Kennedy Town. We are looking for a trustful and friendly person who can start from November or December to work with us. Hereâ€™s my background briefly, see if you are interested.','Finished Contract','Cantonese,English,Filipino,Mandarin',2147483647,'Baby Care,Child Care,Groceries,Housekeeping','Chinese,Vegetarian,Western','Lazzy@tech.com','Chinese Family','Couple + 5 kids','2017-12-25','HKD 10,000','Approved','2017-11-16 16:44:49','s-l225.jpg'),(4,17,'Looking for helper with two dogs','Direct Employer','Hong Kong','wan chai','Full Time','Domestic Helper','Weâ€™re a professional couple with two dogs who are looking for a diligent helper who is experienced in western cooking, household shopping, house cleaning, gardening, pet care and fluent in English. Experience working with Australian families is pref.','Finished Contract','English',2147483647,'Groceries,Housekeeping,Pet Care','Western','jr@gmail.com','Australian Family','Couple','2017-11-25','hk $25,000','Approved','2017-11-16 16:55:30','Couple.jpg'),(5,16,'Driver Wanted','Agency','United Arab Emirates','Dubai','Part Time','Driver','We are a simple family of 4. We need a reliable Driver (Male or Female) to send our kids to school, activities and family functions. Routes mainly will be in Hong Kong Island e.g. Mid-Level to Central area.','Unemployed','English',2147483647,'Groceries,Pet Care,Professional Driver','none','Lazzy@tech.com','Canadian Family','Couple + 2 kids','2017-12-20','AED 10,000','Approved','2017-11-16 16:57:52','default.png'),(6,17,'Driver Wanted','Direct Employer','Hong Kong','wan chai','Full Time','Driver','We are a simple family of 4. We need a reliable Driver (Male or Female) to send our kids to school, activities and family functions. Routes mainly will be in Hong Kong Island e.g. Mid-Level to Central area. ','Finished Contract','English',2147483647,'Professional Driver','none','jr@gmail.com','Hong Kong Family','Couple + 1 kid','2017-12-31','HK $ 4500','Approved','2017-11-16 16:59:56','Driver.jpg'),(7,17,'Couple with baby looking for caring helper','Direct Employer','Hong Kong','SAI KUNG','Full Time','Babysitter','Hello, we are a couple with a baby boy looking for a helper with baby caring experience. Knowing how to keep a clean and tidy home for the baby would be great. We live in Sai Kung by the seaside and offer a helperâ€™s room. Please contact us.','Finished Contract','English',2147483647,'Baby Care,Housekeeping','Western','JR@GMAIL.COM','Hong Kong Family','Couple + 1 kid','2017-11-01','HK $ 5,500','Approved','2017-11-16 17:04:55','Couple-baby-helper.jpg'),(8,16,'British/Japanese family looking for a helper','Direct Employer','Taiwan','Taiwan','Full Time','Handyman','We are British/Japanese family of 4, 2 adults, 2 kids(5 and 2 years old), living in Hung Hom area.Looking for someone who is available from January 2018.Experience in taking care of toddler,Finished contract (with reference from previous employer).','Finished Contract','English',909099093,'none','none','Lazzy@tech.com','Indian Family','Large Family (> 6)','2018-01-01','Indian rupee 10,000','Approved','2017-11-16 17:06:07','hanging-t1-11.jpg'),(9,16,'I\'m looking for a Asian helper','Agency','Philippines','Manila','Part Time','Babysitter','We are a French family of 3 with a 12-year old boy. Our daughter is 23 and only back for occasional holiday. We live in Tin Hau. We are looking for a nice, clever and energetic live-in helper who loves cooking.','Unemployed','English,Filipino',2147483647,'Baby Care,Child Care,Housekeeping,Pet Care','Chinese,Indian,Western','Lazzy@tech.com','French Family','Couple + 1 kid','2017-12-24','PHP 50,000','Approved','2017-11-16 17:10:10','default.png'),(10,17,'Asian/Western Required Full Time Helper','Direct Employer','Hong Kong','SAI KUNG','Full Time','Domestic Helper','We are working couple with 2 independent teens. We live in Mid Level. Candidate must be honest, cheerful and tidy. Helper can cook independently or without much supervision. Can sign contract immediately.','Finished Contract','English',2147483647,'Groceries,Housekeeping,Teen Care','Western','JR@GMAIL.COM','Hong Kong Family','Couple + 2 kids','2017-12-31','HK $ 4,500','Approved','2017-11-16 17:10:33','Family-4-in-Hong-Kong.jpg'),(11,17,'Finished contract with baby experience','Direct Employer','Hong Kong','wan chai','Full Time','Domestic Helper','A Hongkongese family of 3, one couple + one baby, looking for Fluent-English speaking and child-loving domestic helper with newborn experience. We donâ€™t have any elderly, pets, cars or garden. Main duties are taking care of baby.','Finished Contract','English',2147483647,'Baby Care,Groceries,Housekeeping','Chinese,Western','jr@gmail.com','Hong Kong Family','Couple + 1 kid','2017-12-01','HK $5,000','Approved','2017-11-16 17:17:49','default.png');

/*Table structure for table `job_submitted` */

DROP TABLE IF EXISTS `job_submitted`;

CREATE TABLE `job_submitted` (
  `j_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `job_submitted` */

insert  into `job_submitted`(`j_id`,`u_id`) values (1,18),(5,18),(1,19),(5,19),(7,19),(11,20),(10,20),(7,20),(6,20),(4,20);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_password` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_mobile` varchar(25) DEFAULT NULL,
  `u_type` varchar(10) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`u_id`,`u_password`,`u_email`,`u_mobile`,`u_type`) values (1,'$2y$10$u6e16a.gbsqypNaw/r.9J..lOVHGU6RvNBwxkbImWMNASie5Z8q9e','bernadette@gmail.com','09123456789','candidate'),(2,'$2y$10$89PbO5jO4N804huuRrcB9ugYgdhX/zoNIYEygVNGsEU/vVrUooeIW','Cecila@gmail.com','09123456788','candidate'),(3,'$2y$10$9dBKU6btBR56vcv5tEMzJOpLl.J53UiaM5.p5hybYL/KOAOKgmzDK','jacobaristain@gmail.com','092690909090','employer'),(4,'$2y$10$6cuY1FCEXN9I6cQRMRM44.2Zp0vNWeFGhk9ROVBP9WVGcRne.9tju','Joecel@gmail.com','09123456787','candidate'),(5,'$2y$10$8SCkszlFxKshRi8gozAe8eyUc8IHaNh4MZn1JWTHHGcbecxl2i3d2','Rose@gmail.com','09123456786','candidate'),(6,'$2y$10$uvxuGAk9.qXO4IPSMJ.I5O5oo4/CcjjCLDTfl6MifNNuyrBHH42DW','aj@pogi.com','09091208090','candidate'),(7,'$2y$10$dPF40i411wNEm3t34aVY3eB9AOk0k8YCR3L6wkzYWl.oTxkqImx3y','Gilbert@gmail.com','09123456785','candidate'),(8,'$2y$10$LH2Wd8122FLazENRJoSFPecYHjI0IiTSm0aJ.HctLWs0ueJsNnOgu','aj@gmail.com','09218823748','employer'),(9,'$2y$10$xi3AMTzkYYJPxtytGtzNXu0azny6bI8J7qemXdMrWtwB35buyDjlS','Michael@gmail.com','09123456784','candidate'),(10,'$2y$10$/8bCeLOR6GabTxr5pBX1sO5SHUFCTQNGxTY0ZIhX2aqV33AKd0InK','Vhaibhav@gmail.com','09123456783','candidate'),(11,'$2y$10$h9oIJU5aWU1aH1i3GWW7I.WEJCrf002IfTBfNiK3iveH13Cg8Uz4G','awef@yahoo.com','3123123','candidate'),(12,'$2y$10$nAUC3OxhWBqi3vNwWhjxbu0cIkrqmApIrwh4FdOJWyBlUHKDrkbva','samp@yahoo.com','154213','candidate'),(13,'$2y$10$4TRNebPT3rlHdwqx012J/etSFLAJULJNSAJlQ3TuK32z5g7mvUK06','chi@lazzytechnologies.com','09274444051','candidate'),(14,'$2y$10$SteYSSdGYZBHfNVLIL.vLe5xM9PjafbzZMN6L5dfBTmogx.rELEAG','chito@lazzy.com','09274444052','employer'),(15,'$2y$10$524r26khQ19P52kv5htUP.ONuFU9lsxjSrt0am4FEM0yGGVTy88MG','lazzy@tech.com','0231235235','employer'),(16,'$2y$10$P5F.gnSMT4NvKh5niNt1n.wy93f8nE8LTt4.PEWgf1DIYGwTjn8Hq','jacobs@gmail.com','090909090','employer'),(17,'$2y$10$FXlQ6obrrf43x38lBh5sg.mrvS2Uu9AZksIxqGLdDuY96jUo0ZmfC','jr@gmail.com','09094405508','employer'),(18,'$2y$10$i5pr9bQGBsMoH/TeGUCSveqqSJilr.q36ALJ1umRmMnixSYnUdaCG','rosemary@gmail.com','09087675663','candidate'),(19,'$2y$10$4uHo7lbV0RIdtYeAw.1KPuybNlghSBJo1htHOWFthfgw1zx9fCAhK','Cruz@gmail.com','0984784638289','candidate'),(20,'$2y$10$Yf0gtQECB3t.mqhnetWgk.dU.iv9O.aAtkeOv159t.01z9yicNkKq','Sha@gmail.com','09480112241','candidate');

/*Table structure for table `user_details` */

DROP TABLE IF EXISTS `user_details`;

CREATE TABLE `user_details` (
  `u_id` int(11) NOT NULL,
  `u_lname` varchar(100) NOT NULL,
  `u_fname` varchar(100) NOT NULL,
  `u_gender` varchar(6) NOT NULL,
  KEY `u_id` (`u_id`),
  KEY `u_id_2` (`u_id`),
  CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_details` */

insert  into `user_details`(`u_id`,`u_lname`,`u_fname`,`u_gender`) values (1,'D.','Bernadette','female'),(2,'Cecila','S','female'),(3,'aristain','jacob','male'),(4,'Joecel','D','female'),(5,'Rose','O.','female'),(6,'Cruz','Ella','female'),(7,'Gilbert','L','male'),(8,'aristain','jacoibs','male'),(9,'Michael','N','male'),(10,'Vhaibhav','T','male'),(11,'awef','awef','male'),(12,'wefa','awef','male'),(13,'Wan','Chi','male'),(14,'Wan','Chi','male'),(15,'Lazzy','Paradels','male'),(16,'Lazzy','Tech','male'),(17,'legaspi','jr','male'),(18,'Cruz','Rose Mary','female'),(19,'Cruz','Cruz','female'),(20,'Sha-Sha','Sha-Sha','female');

/*Table structure for table `user_education` */

DROP TABLE IF EXISTS `user_education`;

CREATE TABLE `user_education` (
  `u_id` int(11) NOT NULL,
  `ued_college` varchar(100) DEFAULT NULL,
  `ued_highschool` varchar(100) DEFAULT NULL,
  `ued_elementary` varchar(100) DEFAULT NULL,
  `ued_startelem` int(4) DEFAULT NULL,
  `ued_endelem` int(4) DEFAULT NULL,
  `ued_starths` int(4) DEFAULT NULL,
  `ued_endhs` int(4) DEFAULT NULL,
  `ued_startc` int(4) DEFAULT NULL,
  `ued_endc` int(4) DEFAULT NULL,
  `ued_course` int(4) DEFAULT NULL,
  `ued_specialtraining` varchar(100) DEFAULT NULL,
  KEY `u_id` (`u_id`),
  KEY `u_id_2` (`u_id`),
  CONSTRAINT `user_education_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_education` */

/*Table structure for table `user_experience` */

DROP TABLE IF EXISTS `user_experience`;

CREATE TABLE `user_experience` (
  `u_id` int(11) NOT NULL,
  `ue_start` varchar(100) NOT NULL,
  `ue_end` varchar(100) NOT NULL,
  `ue_jobtitle` varchar(100) NOT NULL,
  `ue_workingplace` varchar(255) NOT NULL,
  `ue_familytype` varchar(100) NOT NULL,
  `ue_mainduties` varchar(255) NOT NULL,
  `ue_worksummary` varchar(255) NOT NULL,
  `ue_company` varchar(100) DEFAULT NULL,
  `ue_employername` varchar(100) DEFAULT NULL,
  `ue_salary` varchar(100) DEFAULT NULL,
  `ue_status` varchar(100) NOT NULL,
  KEY `u_id` (`u_id`),
  CONSTRAINT `user_experience_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_experience` */

/*Table structure for table `user_location` */

DROP TABLE IF EXISTS `user_location`;

CREATE TABLE `user_location` (
  `u_id` int(11) NOT NULL,
  `ul_country` varchar(100) NOT NULL,
  `ul_state` varchar(100) NOT NULL,
  `ul_city` varchar(100) NOT NULL,
  `ul_street` varchar(100) NOT NULL,
  KEY `u_id` (`u_id`),
  CONSTRAINT `user_location_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_location` */

/*Table structure for table `user_personal_information` */

DROP TABLE IF EXISTS `user_personal_information`;

CREATE TABLE `user_personal_information` (
  `u_id` int(11) NOT NULL,
  `up_picture` varchar(100) NOT NULL,
  `up_category` varchar(100) NOT NULL,
  `up_email` varchar(100) NOT NULL,
  `up_address` varchar(100) NOT NULL,
  `up_mobile` int(100) NOT NULL,
  `up_telephone` int(100) DEFAULT NULL,
  `up_nationality` varchar(100) NOT NULL,
  `up_religion` varchar(100) NOT NULL,
  `up_age` int(3) NOT NULL,
  `up_maritalstatus` varchar(100) NOT NULL,
  `up_education` varchar(100) DEFAULT NULL,
  `up_languages` varchar(100) NOT NULL,
  `up_status` varchar(100) NOT NULL,
  `up_dateposted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `u_id` (`u_id`),
  KEY `u_id_2` (`u_id`),
  KEY `u_id_3` (`u_id`),
  CONSTRAINT `user_personal_information_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_personal_information` */

insert  into `user_personal_information`(`u_id`,`up_picture`,`up_category`,`up_email`,`up_address`,`up_mobile`,`up_telephone`,`up_nationality`,`up_religion`,`up_age`,`up_maritalstatus`,`up_education`,`up_languages`,`up_status`,`up_dateposted`) values (7,'2017-07-27-stack-225x225.jpg','Helper','awef@yahoo.com','China',12312323,3123123,'Chinese','Single',23,'Married','High School','Arabic,English,Filipino,Japanese','Approved','2017-11-16 14:38:16'),(5,'Louise_Irwin_8-225x225.jpg','Driver','aefwaw@yahoo.comthdrthdrthdrt','Saudi Arabia',2147483647,1231312312,'Indonesian','Single',26,'Divorced','College','Arabic,Cantonese,Japanese,Mandarin','Approved','2017-11-16 14:38:16'),(12,'571d38a5c2e510969395613dd4db71fa--badge-logo-key-chains.jpg','Helper','acwef@yahoo.com','Saudi Arabia',3123123,312312312,'Indian','Single',23,'Married','College','Arabic,Cantonese,English,Japanese,Mandarin','Approved','2017-11-16 14:38:16'),(18,'profile-1-225x225.jpg','Helper','maryrose@gmail.com','Saudi Arabia',2147483647,9986881,'Filipino','Muslim',25,'Single','College','Arabic,English,Filipino','Approved','2017-11-17 10:07:40'),(19,'images (4).jpg','Helper','cruz@gmail.com','China',2147483647,83474843,'Indian','Baptist',18,'Single','High School','Arabic,English,Mandarin','Approved','2017-11-17 12:48:59'),(20,'5a042730e6540_20170827_131348.jpg','Helper','Sha@gmail.com','Philippines',2147483647,0,'Filipino','Roman Catholic',22,'Single','College','English,Filipino','Approved','2017-11-17 12:50:00');

/*Table structure for table `user_professional_information` */

DROP TABLE IF EXISTS `user_professional_information`;

CREATE TABLE `user_professional_information` (
  `u_id` int(11) NOT NULL,
  `upi_preferedworklocation` varchar(100) NOT NULL,
  `upi_yearsofexp` varchar(100) NOT NULL,
  `upi_expsummary` text NOT NULL,
  `upi_cookingskills` varchar(100) NOT NULL,
  `upi_skillsexp` varchar(100) NOT NULL,
  `upi_otherskills` varchar(100) NOT NULL,
  `upi_availability` varchar(100) NOT NULL,
  `upi_status` varchar(100) NOT NULL,
  KEY `u_id` (`u_id`),
  CONSTRAINT `user_professional_information_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_professional_information` */

insert  into `user_professional_information`(`u_id`,`upi_preferedworklocation`,`upi_yearsofexp`,`upi_expsummary`,`upi_cookingskills`,`upi_skillsexp`,`upi_otherskills`,`upi_availability`,`upi_status`) values (5,'Philippines','7','lolc aewfcwefawefawefawec aewfcwefaewfafewfeaafewafewafewafewfaewawefawefawec aewfcwefawefawefawec a','American,Arabic,French,Indian','Baby Care,Cooking,Housekeeping,Pet Care','Baking,Car Wash,Driving,First Aid Certificate','3233-03-23','Unapproved'),(7,'Thailand','6','cawefafwecawefawefawfawecawefafwecawefawefawfawecawefafwecawefawefawfawecawefafwecawefawefawfawecawe','Arabic,Chinese,Italian,Japanese,Western','Baby Care,Cooking,Pet Care','Baking,Computer,Gardening','3333-02-23','Unapproved'),(12,'India','7','lolollolollolollolollolollolollolollolollolollolollolollolollolollolollolollolollolollolollolollolol','American,Vegeterian','Baby Care,Housekeeping','Baking,Sewing','3333-02-23','Unapproved'),(18,'Philippines','6','fast learner and easy to get along with. I love cooking and willing to try various intenational cuisine. I love children, interact and play with them. I am God fearing can be relied on and trusted.','American,Arabic,Italian','Child Care,Elder Care,Pet Care','Baking,Car Wash,Handyman','2017-12-06','Unapproved'),(19,'China','1','My previous working experience are taking care of new born, twin girls and 85 years old eldery, but as of now Iâ€™m working for a German Couple with 2 girls ages 6 and 9, here in Discovery.','Chinese,Indian,Vegeterian,Western','Baby Care,Child Care,Professional Driver','Baking,Car Wash,Computer','2017-11-25','Unapproved'),(20,'China','2','I am the only maid they had in saudi arabia. Now i am soon finish my contract on january 14,2018. I am taking care of a 8 years old autism boy, taking and fetching him to school. I am doing the cleaning, cooking, laundry and ironing. I am trustworthy','Western','Baby Care,Child Care,Cooking,Housekeeping','First Aid Certificate,Gardening,Housework,Tutoring','2018-01-15','Unapproved');

/*Table structure for table `user_question` */

DROP TABLE IF EXISTS `user_question`;

CREATE TABLE `user_question` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `uq_1` varchar(3) NOT NULL,
  `uq_2` varchar(3) NOT NULL,
  `uq_3` varchar(3) NOT NULL,
  `uq_4` varchar(3) NOT NULL,
  `uq_5` varchar(3) NOT NULL,
  `uq_6` varchar(3) NOT NULL,
  `uq_7` varchar(3) NOT NULL,
  `uq_8` varchar(3) NOT NULL,
  `uq_9` varchar(3) NOT NULL,
  `uq_10` varchar(3) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `user_question` */

insert  into `user_question`(`u_id`,`uq_1`,`uq_2`,`uq_3`,`uq_4`,`uq_5`,`uq_6`,`uq_7`,`uq_8`,`uq_9`,`uq_10`) values (5,'No','No','Yes','Yes','Yes','No','Yes','No','Yes','No'),(7,'Yes','No','Yes','Yes','No','Yes','No','Yes','Yes','No'),(12,'Yes','No','Yes','Yes','Yes','No','Yes','No','Yes','Yes'),(18,'Yes','Yes','Yes','Yes','No','No','Yes','No','Yes','No'),(19,'Yes','Yes','Yes','No','No','Yes','Yes','No','Yes','Yes'),(20,'Yes','Yes','Yes','Yes','Yes','Yes','Yes','Yes','No','No');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
