
USE doggytrip;



CREATE TABLE IF NOT EXISTS `DestinationAttr`
(
		`dest_id` INT NOT NULL AUTO_INCREMENT,
		`key` VARCHAR(128) NOT NULL,
		`val` BLOB,
		PRIMARY KEY(`dest_id`, `key`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE IF NOT EXISTS `DestinationQuestion`
(
		`question_id` INT NOT NULL AUTO_INCREMENT,
		`dest_id` INT NOT NULL ,
		`question_input_name` VARCHAR(128) NOT NULL,
		`question_title` BLOB,
		`question_type` ENUM('single_option', 'multi_option', 'text'),
		`question_option_json` BLOB,
		`question_description` BLOB,
		PRIMARY KEY(`question_id`),
		KEY(`dest_id`, `question_id`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;



CREATE TABLE IF NOT EXISTS `Request`
(
		`req_id` INT NOT NULL AUTO_INCREMENT,
		`user_id` INT NOT NULL,
		`real_name` VARCHAR(128) NOT NULL,
		`gender` ENUM('m','f') NOT NULL,
		`budget` INT NOT NULL,
		`trip_status` VARCHAR(128) NOT NULL,
		`have_date` ENUM('y','n') NOT NULL,
		`departure_date` VARCHAR(128),
		`trip_length` TINYINT,
		`num_adults` TINYINT NOT NULL,
		`num_children` TINYINT NOT NULL,
		`mobile_phone` VARCHAR(128) NOT NULL,
		`email` VARCHAR(128) NOT NULL,
		`extra_information` BLOB,
		PRIMARY KEY(`req_id`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE IF NOT EXISTS `RequestAttr`
(
		`req_id` INT NOT NULL AUTO_INCREMENT,
		`key` VARCHAR(128) NOT NULL,
		`val` BLOB,
		PRIMARY KEY(`req_id`, `key`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE IF NOT EXISTS `RequestAnswer`
(
		`answer_id` INT NOT NULL AUTO_INCREMENT,
		`req_id` INT NOT NULL,
		`question_id` INT NOT NULL,
		`question_title` BLOB,
		`question_answer_json` BLOB,
		PRIMARY KEY(`answer_id`),
		KEY(`req_id`, `question_id`, `answer_id`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


