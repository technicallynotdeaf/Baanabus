DROP TABLE IF EXISTS `#__com_baanabus_tasks`;

CREATE TABLE `#__com_baanabus_tasks` (
	`task_id`  INT(11)  NOT NULL AUTO_INCREMENT,
	`task_description` VARCHAR(255) UNIQUE NOT NULL,
	`context` VARCHAR(50),
	`contact_id` INT(11),	
	PRIMARY KEY (`task_id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

INSERT INTO `#__com_baanabus_tasks` (`task_description`, `context`) VALUES
('Bake a Cake', 'home'),
('Brush My Teeth', 'home'),
('Do Grocery Shopping', 'shops'),  
('Buy Gift for Jack', 'shops'); 

