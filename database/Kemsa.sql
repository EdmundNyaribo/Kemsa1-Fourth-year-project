/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - kemsa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kemsa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kemsa`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(30) NOT NULL,
  `quantity` int(7) NOT NULL,
  `cost` int(10) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

insert  into `cart`(`cart_id`,`prod_name`,`quantity`,`cost`) values 
(1,'Rabies Vaccine',5000,7000000);

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `receipt_no` varchar(12) NOT NULL,
  `purchase_id` varchar(12) NOT NULL,
  `prod_name` varchar(30) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `due_amount` int(9) NOT NULL,
  `paid_amount` int(9) NOT NULL,
  `status` varchar(12) NOT NULL,
  PRIMARY KEY (`receipt_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `payment` */

insert  into `payment`(`receipt_no`,`purchase_id`,`prod_name`,`client_name`,`due_amount`,`paid_amount`,`status`) values 
('140121483064','166593560964','Silver Sulphadiazine Cream','Guru Nanak Hospital',1000000,1000000,'Approved'),
('146173315664','766634926643','Silver Sulphadiazine Cream','Matter Hospital',3999800,3999800,'Approved'),
('755835632643','628711951643','Silver Sulphadiazine Cream','Guru Nanak Hospital',6656600,6656600,'Approved');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL,
  `type` varchar(40) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_email` varchar(30) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`prod_id`,`prod_name`,`type`,`supplier_name`,`supplier_email`) values 
(1,'Folic Acid Tablets','Medicine','Biodeal Limited','biodeal@gmail.com'),
(2,'Halothane Inhalation','Medicine','Galaxy Pharmaceuticals Limited','galaxpharm@gmail.com'),
(3,'Rabies Vaccine','Vaccine','Sai Pharmaceuticals Limited','sai@gmail.com'),
(4,'Folic Acid Tablets','Medicine','Ely Chemical Industries Ltd. ','elychem@gmail.com'),
(5,'Normal Saline','Pharmaceutical equipment','Surgilinks Limited','surgilinks@gmail.com'),
(6,'Hyoscine Tablets','Medicine','Dawa Limited','dawa@gmail.com'),
(7,'Silver Sulphadiazine Cream','Ointment','Dawa Limited','dawa@gmail.com'),
(8,'Tetracycline Eye Ointment','Ointment','Sai Pharmaceuticals Limited','sai@gmail.com'),
(9,'Chloropromazine Tablets','Medicine','Ely Chemical Industries Ltd. ','elychem@gmail.com'),
(10,'Identification Band Baby','Non-pharmaceutical equipment','Sundales International','sundales@gmail.com'),
(11,'Fluphenazine decanoate Injection','Medicine','Medisel (K) Limited ','medisel@gmail.com'),
(12,'Sodium Chloride Infusion','Medicine','Surgilinks Limited','surgilinks@gmail.com'),
(13,'Glucose IV Infusion','Medicine','Surgilinks Limited','surgilinks@gmail.com'),
(14,'Ketoconazole Tablets','Medicine','Biodeal Limited','biodeal@gmail.com'),
(15,'Valacyclovir Tablets','Medicine','Tata Africa Holdings Limited','tatafrica@gmail.com'),
(16,'Atracurium besylate','Medicine','Omaera Pharmaceuticals ','omaera@gmail.com'),
(17,'ketamine injection','Medicine','Harleys Limited ','harley@gmail.com'),
(18,'Sodium Stibogluconate','Medicine','Omaera Pharmaceuticals ','omaera@gmail.com'),
(19,'Atenolol tablets','Medicine','Laboratory&Allied Limited','allied@gmail.com'),
(20,'Phenytoin Tablets','Medicine','Laboratory&Allied Limited','allied@gmail.com'),
(21,'Tinidazole Tablets','Medicine','Laboratory&Allied Limited','allied@gmail.com'),
(22,'Diclofenac Sodium Tablets','Medicine','Laboratory&Allied Limited','allied@gmail.com'),
(23,'Haloperidol Tablets','Medicine','Laboratory&Allied Limited','allied@gmail.com'),
(24,'Loperamide Tablets','Medicine','Laboratory&Allied Limited','allied@gmail.com'),
(25,'Clotrimazole cream','Ointment','Laboratory&Allied Limited','allied@gmail.com');

/*Table structure for table `purchases` */

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `purchase_id` varchar(12) NOT NULL,
  `prod_name` varchar(30) NOT NULL,
  `quantity` int(7) NOT NULL,
  `cost` int(10) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `DOP` date NOT NULL,
  `pay_status` varchar(8) NOT NULL,
  `pay_verify` varchar(12) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `purchases` */

insert  into `purchases`(`purchase_id`,`prod_name`,`quantity`,`cost`,`client_name`,`email`,`DOP`,`pay_status`,`pay_verify`) values 
('166593560964','Silver Sulphadiazine Cream',5000,1000000,'Guru Nanak Hospital','gurunanak@gamil.com','2023-04-19','Success','Success'),
('628711951643','Silver Sulphadiazine Cream',33283,6656600,'Guru Nanak Hospital','gurunanak@gamil.com','2023-04-19','Success','Success'),
('766634926643','Silver Sulphadiazine Cream',19999,3999800,'Matter Hospital','matterhos@gmail.com','2023-04-19','Success','Success');

/*Table structure for table `request` */

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `request` */

insert  into `request`(`request_id`,`prod_name`,`type`,`quantity`,`client_name`,`status`) values 
(1,'Tetracycline Eye Ointment','Ointment',1000,'Guru Nanak Hospital','Solved');

/*Table structure for table `stocks` */

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `stock_id` int(12) NOT NULL AUTO_INCREMENT,
  `batch_no` varchar(12) NOT NULL,
  `prod_name` varchar(40) NOT NULL,
  `type` varchar(50) NOT NULL,
  `quantity` int(7) NOT NULL,
  `unit_price` int(7) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stocks` */

insert  into `stocks`(`stock_id`,`batch_no`,`prod_name`,`type`,`quantity`,`unit_price`,`description`) values 
(1,'hyo001','Hyoscine Tablets','Medicine',5000,8000,'Relieves stomach cramps, with irritable bowel syndrome (IBS)'),
(2,'silvsul100 ','Silver Sulphadiazine Cream ','Ointment ',83282,200,'Treat wound infections with serious burns'),
(3,'tetra100','Tetracycline Eye Ointment','Ointment',1000,250,'Treat bacterial infections eg. pneumonia and tract infections'),
(4,'IDB112','Identification Band Baby','Medicine',90000,20,'Baby band identification'),
(5,'vala002','Valacyclovir Tablets','Medicine',3603,30,'Treat Herpes Zoster(Shingles) and Genital Herpes'),
(6,'keto231','Ketoconazole Tablets','Medicine',91690,70,'Treats fungal infections'),
(7,'gluc004','Glucose IV Infusion','Medicine',940000,45,'Nutrition support, treat low blood sugar and decrease high potassium levels'),
(8,'besylate001','Atracurium besylate','Medicine',3447,800,'Treatment for endotracheal intubation and provide skeletal muscle relaxation during surgery'),
(9,'ketamine001','ketamine injection','Medicine',21302,90,'used as an anesthetic to induce loss of consciousness'),
(10,'stibo123','Sodium Stibogluconate','Medicine',1778,10420,'Treat Leishmaniasis'),
(11,'atenolol001','Atenolol tablets','Medicine',4800,310,'Treat high blood pressure (hypertension) and Irregular heartbeats (arrhythmia)'),
(12,'pheny0023','Phenytoin Tablets','Medicine',2400,330,'Treat and prevent seizures'),
(13,'tinidazole25','Tinidazole Tablets','Medicine',11428,600,'Treat trichomoniasis, giardiasis, amebiasis'),
(14,'diclofenac24','Diclofenac Sodium Tablets','Medicine',17912,210,'Treat aches and pains and problems with joint muscles and bones'),
(15,'halo002','Haloperidol Tablets','Medicine',5901,810,'Used to manage positive symptoms of schizophrenia eg. hallucinations and delusions'),
(16,'lope001','Loperamide Tablets','Medicine',13379,80,'Treat diarrhoea'),
(17,' clot003 ','Clotrimazole cream  ','Ointment  ',513082,15,'Treat skin infections ');

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplier_id` varchar(20) NOT NULL,
  `supplier_email` varchar(20) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supplier_id`,`supplier_email`,`supplier_name`,`address`) values 
('allied009','allied@gmail.com','Laboratory&Allied Limited','Nairobi, Kenya'),
('alpamed','alphamed@gmail.com','Alpha Medical Manufacturers','Nairobi, Kenya'),
('bakpharm','bakpharm@gmail.com','Bakpharm Limited ','Nairobi, Kenya'),
('biodeal','biodeal@gmail.com','Biodeal Limited','Nairobi, Kenya'),
('Dawa','dawa@gmail.com','Dawa Limited','Nairobi, Kenya'),
('elychem','elychem@gmail.com ','Ely Chemical Industries Ltd. ','Nairobi, Kenya '),
('galaxyPharm','galaxpharm@gmail.com','Galaxy Pharmaceuticals Limited','Nairobi, Kenya'),
('har123','harley@gmail.com ','Harleys Limited ','Thika, Kenya '),
('medina','medina@gmail.com','Medina Chemicals Limited','Nairobi, Kenya'),
('medisel123','medisel@gmail.com ','Medisel (K) Limited ','Thika, Kenya '),
('oma001','omaera@gmail.com','Omaera Pharmaceuticals ','Nairobi, Kenya'),
('rupPharma','rupharma@gmail.com','Rup Pharmma Limited','Nairobi, Kenya'),
('saiPharm','sai@gmail.com','Sai Pharmaceuticals Limited','Nairobi, Kenya'),
('sony','sony@gmail.com','Sony Commercial Agencies','Nairobi, Kenya'),
('sundalesInt','sundales@gmail.com','Sundales International','Nairobi, Kenya'),
('surgilinks','surgilinks@gmail.com','Surgilinks Limited','Nairobi, Kenya'),
('TAfrica','tatafrica@gmail.com','Tata Africa Holdings Limited','Nairobi, Kenya');

/*Table structure for table `supplies` */

DROP TABLE IF EXISTS `supplies`;

CREATE TABLE `supplies` (
  `supply_id` int(12) NOT NULL AUTO_INCREMENT,
  `batch_no` varchar(12) NOT NULL,
  `prod_name` varchar(40) NOT NULL,
  `type` varchar(50) NOT NULL,
  `quantity` int(7) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `date_supplied` date NOT NULL,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`supply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `supplies` */

insert  into `supplies`(`supply_id`,`batch_no`,`prod_name`,`type`,`quantity`,`supplier_name`,`date_supplied`,`expiry_date`) values 
(1,'hyo001','Hyoscine Tablets','Medicine',5000,'Dawa','2027-03-15','2027-03-15'),
(2,'silvsul100 ','Silver Sulphadiazine Cream ','Ointment ',83282,'Dawa ','2023-03-15','2028-03-15'),
(3,'tetra100','Tetracycline Eye Ointment','Ointment',1000,'Sai','2023-03-15','2028-03-15'),
(4,'IDB112','Identification Band Baby','Medicine',90000,'Sundales','2023-04-19','2033-04-19'),
(5,'vala002','Valacyclovir Tablets','Medicine',3603,'Tata','2023-04-13','2027-04-13'),
(6,'keto231','Ketoconazole Tablets','Medicine',91690,'Biodeal','2023-04-15','2027-04-15'),
(7,'gluc004','Glucose IV Infusion','Medicine',940000,'Surgilinks','2023-04-19','2025-04-19'),
(8,'besylate001','Atracurium besylate','Medicine',3447,'Omaera','2023-04-19','2027-04-19'),
(9,'ketamine001','ketamine injection','Medicine',21302,'Harleys','2023-04-19','2026-04-19'),
(10,'stibo123','Sodium Stibogluconate','Medicine',1778,'Omaera','2023-04-19','2030-04-19'),
(11,'atenolol001','Atenolol tablets','Medicine',4800,'Laboratory&Allied','2023-04-19','2027-04-19'),
(12,'pheny0023','Phenytoin Tablets','Medicine',2400,'Laboratory&Allied','2023-04-19','2027-04-19'),
(13,'tinidazole25','Tinidazole Tablets','Medicine',11428,'Laboratory&Allied','2023-04-19','2033-04-19'),
(14,'diclofenac24','Diclofenac Sodium Tablets','Medicine',17912,'Laboratory&Allied','2023-04-19','2028-04-19'),
(15,'halo002','Haloperidol Tablets','Medicine',5901,'Laboratory&Allied','2023-04-19','2027-04-19'),
(16,'lope001','Loperamide Tablets','Medicine',13379,'Laboratory&Allied','2023-04-19','2026-04-19'),
(17,' clot003 ','Clotrimazole cream  ','Ointment  ',513082,'Laboratory&Allied  ','2023-04-19','2026-04-19');

/*Table structure for table `types` */

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `type_name` varchar(30) NOT NULL,
  `type_description` varchar(200) NOT NULL,
  PRIMARY KEY (`type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `types` */

insert  into `types`(`type_name`,`type_description`) values 
('Medicine','Medicine'),
('Non-pharmaceutical equipment','non-pharmaceutical'),
('Ointment','Creams'),
('Pharmaceutical equipment','Aid in pharmacy service delivery'),
('Vaccine','Vaccine');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=Client',
  `address` varchar(30) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`name`,`email`,`password`,`role`,`address`,`reg_date`) values 
(1,'Manager01     ','Elon Maina   ','elon@kemsa.com ','8cb2237d0679ca88db6464eac60da96345513964',1,'Nairobi,Westlands ','2023-02-06'),
(2,'Matter02','Matter Hospital','matterhos@gmail.com','348162101fc6f7e624681b7400b085eeac6df7bd',2,'Nairobi, TRM-Roysambu','2023-03-02'),
(3,'Gurunanak  ','Guru Nanak Hospital ','gurunanak@gamil.com ','1f74648e50a6a6708ec54ab327a163d5536b7ced',2,'Nairobi, Pangani         ','2023-03-13'),
(4,'kuhospital','Kenyatta University Hospital','kuhospital@gmail.com','3acd0be86de7dcccdbf91b20f94a68cea535922d',2,'Kiambu, Thika','2023-03-13');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
