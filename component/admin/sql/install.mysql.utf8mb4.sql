DROP TABLE IF EXISTS `#__com_baanabus_tasks`;

CREATE TABLE `#__com_baanabus_tasks` (
	`task_id`  INT(11)  NOT NULL AUTO_INCREMENT,
	`completed` BOOLEAN DEFAULT 0,
	`task_title` VARCHAR(100) UNIQUE NOT NULL,
	`task_description` VARCHAR(600) UNIQUE NOT NULL,
	`task_type` VARCHAR(50),
	`context` VARCHAR(50),
	`project` VARCHAR(50),
	`person_id` INT(11),	
	`show_after` DATETIME default CURRENT_TIMESTAMP,
	`deadline` DATETIME default CURRENT_TIMESTAMP,
	`conditions` VARCHAR(500),
	PRIMARY KEY (`task_id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

INSERT INTO `#__com_baanabus_tasks` (`task_title`, `task_description`, `context`, `person_id`) VALUES
('Drink Water', 'trust me, you will have more energy', 'home', NULL),
('Brush My Teeth', 'its quicker than fillings!', 'home', 1),
('Do Grocery Shopping', 'you were going to buy milk', 'shops', NULL),  
('Buy Gift for Fred', 'Fred likes cats, dogs, and sports', 'shops', 3); 

DROP TABLE IF EXISTS `#__com_baanabus_people`;

CREATE TABLE `#__com_baanabus_people` (
	`person_id`  INT(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(200) UNIQUE NOT NULL,
	`avatar_img` VARCHAR(200) UNIQUE NOT NULL,	
	`is_org` BOOLEAN,	
	`context` VARCHAR(50),
	`circles` VARCHAR(250),
	`next_review` DATE,
	`review_freq` INT(11),
	`DOB` INT(11),	
	`MOB` INT(11),		
	`YOB` INT(11),		
	`char1` VARCHAR(50),
	`char2` VARCHAR(50),	
	`char3` VARCHAR(50),
	`char_extended` VARCHAR(300),
	`interests` VARCHAR(300),
	`love_language` VARCHAR(100),	
	`brain` VARCHAR(100),	
	`christian` BOOLEAN,	
	`vax_greenpass` BOOLEAN,	
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
	`date_added` DATETIME default CURRENT_TIMESTAMP,
	`person_id` INT(11),	
	PRIMARY KEY (`note_id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

INSERT INTO `#__com_baanabus_notes` (`contents`, `person_id`) VALUES
('Do not forget you were going to call your mum', 2),
('Gertrude needs a new pair of socks for christmas', 4); 

DROP TABLE IF EXISTS `#__com_baanabus_events`;

CREATE TABLE `#__com_baanabus_events` (
	`event_id`  INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(200) NOT NULL,	
	`description` VARCHAR(1000),	
	`context` VARCHAR(50),
	`date_added` DATETIME default CURRENT_TIMESTAMP,
	`event_start` DATETIME default CURRENT_TIMESTAMP,
	`event_end` DATETIME default CURRENT_TIMESTAMP,
	`person_id` INT(11),	
	PRIMARY KEY (`event_id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;



