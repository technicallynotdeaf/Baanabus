DROP TABLE IF EXISTS `#__com_baanabus_tasks`;

CREATE TABLE `#__com_baanabus_tasks` (
	`task_id`  INT(11)  NOT NULL AUTO_INCREMENT,
	`task_description` VARCHAR(200) UNIQUE NOT NULL,
	`context` VARCHAR(50),
	`person_id` INT(11),	
	PRIMARY KEY (`task_id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

INSERT INTO `#__com_baanabus_tasks` (`task_description`, `context`, `person_id`) VALUES
('Bake a Cake', 'home', NULL),
('Brush My Teeth', 'home', 1),
('Do Grocery Shopping', 'shops', NULL),  
('Buy Gift for Fred', 'shops', 3); 

DROP TABLE IF EXISTS `#__com_baanabus_people`;

CREATE TABLE `#__com_baanabus_people` (
	`person_id`  INT(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(200) UNIQUE NOT NULL,
	`avatar_img` VARCHAR(200) UNIQUE NOT NULL,	
	`context` VARCHAR(50),
	`DOB` INT(11),	
	`MOB` INT(11),		
	`YOB` INT(11),		
	`char1` VARCHAR(50),
	`char2` VARCHAR(50),	
	`char3` VARCHAR(50),
	`char_extended` VARCHAR(300),
	`interests` VARCHAR(300),
	`love_language` VARCHAR(100),	
	PRIMARY KEY (`person_id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

INSERT INTO `#__com_baanabus_people` (`name`, `avatar_img`, `char1`, `char2`) VALUES
('Me', 'me.png', 'smart', 'kind'),
('Mum', 'mum.png', 'caring', 'innovative'),
('Fred', 'fred.png', 'friendly', 'diplomatic'),
('Gertrude', 'gertrude.png', 'creative', 'giving'),  
('Grandma', 'grandma.png', 'resilient', 'inventive'); 

DROP TABLE IF EXISTS `#__com_baanabus_notes`;

CREATE TABLE `#__com_baanabus_notes` (
	`note_id`  INT(11)  NOT NULL AUTO_INCREMENT,
	`contents` VARCHAR(2000) NOT NULL,	
	`person_id` INT(11),	
	PRIMARY KEY (`note_id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

INSERT INTO `#__com_baanabus_notes` (`contents`, `person_id`) VALUES
('Do not forget you were going to call your mum', 2),
('Gertrude needs a new pair of socks for christmas', 4); 

