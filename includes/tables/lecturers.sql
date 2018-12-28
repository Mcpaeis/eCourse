
/* lectures sql query*/
CREATE TABLE `ecourse`.`lecturers` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(60) NOT NULL , `last_name` VARCHAR(60) NOT NULL , `email` VARCHAR(60) NOT NULL , `password` VARCHAR(60) NOT NULL , 'suffix' VARCHAR(65) NULL, 'profile_picture' VARCHAR(65) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;

/* course materials sql query */
CREATE TABLE `ecourse`.`course_materials` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `file_name` VARCHAR(60) NOT NULL , `description` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

/* test sql*/
CREATE TABLE `ecourse`.`test` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `caption` VARCHAR(60) NOT NULL , `description` TEXT NOT NULL , `test_date` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
