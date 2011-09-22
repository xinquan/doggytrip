
USE doggytrip;



CREATE TABLE IF NOT EXISTS `DestinationAttr`
(
		`dest_id` VARCHAR(128) NOT NULL,
		`key` VARCHAR(128) NOT NULL,
		`val` BLOB,
		PRIMARY KEY(`dest_id`, `key`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE IF NOT EXISTS `DestinationQuestion`
(
		`dest_id` VARCHAR(128) NOT NULL,
		`question_id` VARCHAR(128) NOT NULL,
		`question_title` BLOB,
		`question_type` ENUM('single_option', 'multi_option', 'text'),
		`question_option_json` BLOB,
		`question_description` BLOB,
		PRIMARY KEY(`dest_id`, `question_id`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;



CREATE TABLE IF NOT EXISTS `Request`
(
		`req_id` VARCHAR(128) NOT NULL,
		`user_id` VARCHAR(128) NOT NULL,
		`real_name` VARCHAR(128) NOT NULL,
		`gender` ENUM('m','f') NOT NULL,
		`budget` INT NOT NULL,
		`have_date` ENUM('y','n') NOT NULL,
		`departure_date` VARCHAR(128),
		`trip_length` TINYINT,
		`num_travellers` TINYINT NOT NULL,
		`phone_number` VARCHAR(128) NOT NULL,
		`email` VARCHAR(128) NOT NULL,
		PRIMARY KEY(`req_id`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE IF NOT EXISTS `RequestAttr`
(
		`req_id` VARCHAR(128) NOT NULL,
		`key` VARCHAR(128) NOT NULL,
		`val` BLOB,
		PRIMARY KEY(`req_id`, `key`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE IF NOT EXISTS `RequestAnswer`
(
		`req_id` VARCHAR(128) NOT NULL,
		`question_id` VARCHAR(128) NOT NULL,
		`question_title` BLOB,
		`question_answer_json` BLOB,
		PRIMARY KEY(`req_id`, `question_id`)
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin;


