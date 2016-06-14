<?php
$wp_users = $this->db->users;

$this->tableDefinitions = array (
	"course"=> "(
		  id int(11) NOT NULL AUTO_INCREMENT,
		  course_number varchar(45) DEFAULT NULL,
		  last_update date DEFAULT NULL,
		  title varchar(255) NOT NULL,
		  description text,
		  url varchar(255) DEFAULT NULL,
		  image varchar(45) DEFAULT NULL,
		  certificate varchar(255) DEFAULT NULL,
		  credit decimal(3,2) DEFAULT NULL,
		  record_status tinyint(4) NOT NULL DEFAULT '1',
		 PRIMARY KEY  (id)
		) ENGINE=InnoDB",
	

	"user_course_registration"=> "(
		id int(11) NOT NULL AUTO_INCREMENT,
		 course_id int(11) NOT NULL DEFAULT '0',
		 user_id bigint(20) unsigned NOT NULL DEFAULT '0',
		 registration_date datetime DEFAULT NULL,
		 registration_type int(11) NOT NULL DEFAULT '1',
		 ec_item_id int(11) DEFAULT NULL,
		 expiration_date date DEFAULT NULL,
		 course_status varchar(45) DEFAULT NULL,
		 course_completion_date date DEFAULT NULL,
		 score int(11) DEFAULT NULL,
		 test_attempts int(11) NULL,
		 scormdata text,
		 record_status tinyint(4) NOT NULL DEFAULT '1',
		 PRIMARY KEY  (id),
		 UNIQUE KEY #unique_user_course# (course_id,user_id),
		 KEY #user_course_registration_course# (course_id),
		 KEY #user_id# (user_id),
		 KEY #ucr_ec_item_idx# (ec_item_id),
		 CONSTRAINT #user_course_registration_ibfk_1# FOREIGN KEY (user_id) REFERENCES $wp_users (ID) ON DELETE CASCADE ON UPDATE CASCADE,
		 CONSTRAINT #user_course_registration_course# FOREIGN KEY (course_id) REFERENCES #course# (id) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB",

	"user_course_assessment_response"=> "(
		id int(11) NOT NULL AUTO_INCREMENT,
		 user_id bigint(20) unsigned NOT NULL,
		 course_id int(11) NOT NULL,
		 name varchar(45) DEFAULT NULL,
		 attempt int(11) DEFAULT NULL,
		 score int(11) DEFAULT NULL,
		 result varchar(45) DEFAULT NULL,
		 response_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		 q1_response varchar(45) DEFAULT NULL,
		 q2_response varchar(45) DEFAULT NULL,
		 q3_response varchar(45) DEFAULT NULL,
		 q4_response varchar(45) DEFAULT NULL,
		 q5_response varchar(45) DEFAULT NULL,
		 q6_response varchar(45) DEFAULT NULL,
		 q7_response varchar(45) DEFAULT NULL,
		 q8_response varchar(45) DEFAULT NULL,
		 q9_response varchar(45) DEFAULT NULL,
		 q10_response varchar(45) DEFAULT NULL,
		 q11_response varchar(45) DEFAULT NULL,
		 q12_response varchar(45) DEFAULT NULL,
		 q13_response varchar(45) DEFAULT NULL,
		 q14_response varchar(45) DEFAULT NULL,
		 q15_response varchar(45) DEFAULT NULL,
		 q1_result tinyint(4) DEFAULT NULL,
		 q2_result tinyint(4) DEFAULT NULL,
		 q3_result tinyint(4) DEFAULT NULL,
		 q4_result tinyint(4) DEFAULT NULL,
		 q5_result tinyint(4) DEFAULT NULL,
		 q6_result tinyint(4) DEFAULT NULL,
		 q7_result tinyint(4) DEFAULT NULL,
		 q8_result tinyint(4) DEFAULT NULL,
		 q9_result tinyint(4) DEFAULT NULL,
		 q10_result tinyint(4) DEFAULT NULL,
		 q11_result tinyint(4) DEFAULT NULL,
		 q12_result tinyint(4) DEFAULT NULL,
		 q13_result tinyint(4) DEFAULT NULL,
		 q14_result tinyint(4) DEFAULT NULL,
		 q15_result tinyint(4) DEFAULT NULL,
		 PRIMARY KEY  (id),
		 UNIQUE KEY #user_course_assessment_attempt_unique# (user_id,course_id,name,attempt),
		 KEY #ucar_user# (user_id),
		 KEY #ucar_course# (course_id),
		 CONSTRAINT #ucar_course# FOREIGN KEY (course_id) REFERENCES #course# (id) ON DELETE CASCADE ON UPDATE CASCADE,
		 CONSTRAINT #ucar_user# FOREIGN KEY (user_id) REFERENCES $wp_users (id) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB",

	"user_course_event"=> "(
		id int(11) NOT NULL AUTO_INCREMENT,
		 user_id bigint(20) unsigned NOT NULL,
		 course_id int(11) NOT NULL,
		 event_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		 event_type varchar(45) NOT NULL,
		 PRIMARY KEY  (id),
		 KEY #uce_user# (user_id),
		 KEY #uce_course# (course_id),
		 KEY #uce_event_type# (event_type),
		 CONSTRAINT #uce_course# FOREIGN KEY (course_id) REFERENCES #course# (id) ON DELETE CASCADE ON UPDATE CASCADE,
		 CONSTRAINT #uce_user# FOREIGN KEY (user_id) REFERENCES $wp_users (id) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB",

	"course_assessment"=> "(
		id int(11) NOT NULL AUTO_INCREMENT,
		 course_id int(11) NOT NULL,
		 name varchar(45) NOT NULL,
		 PRIMARY KEY  (id),
		 KEY #ca_course# (course_id),
		 CONSTRAINT #ca_course# FOREIGN KEY (course_id) REFERENCES #course# (id) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB",

	"course_assessment_question"=> "(
		id int(11) NOT NULL AUTO_INCREMENT,
		 course_assessment_id int(11) NOT NULL,
		 sequence int(11) NOT NULL,
		 correct_answer int(11) NOT NULL,
		 text text NOT NULL,
		 PRIMARY KEY  (id),
		 UNIQUE KEY #u_caq_seq# (course_assessment_id,sequence),
		 KEY #question_assessment# (course_assessment_id),
		 CONSTRAINT #question_assessment# FOREIGN KEY (course_assessment_id) REFERENCES #course_assessment# (id) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB",

	"course_assessment_answer"=> "(
		id int(11) NOT NULL AUTO_INCREMENT,
		 question_id int(11) NOT NULL,
		 sequence int(11) NOT NULL,
		 text text NOT NULL,
		 PRIMARY KEY  (id),
		 UNIQUE KEY #u_qas_seq# (question_id,sequence),
		 KEY #aaq# (question_id),
		 CONSTRAINT #aaq# FOREIGN KEY (question_id) REFERENCES #course_assessment_question# (id) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB",

		
	"evaluation_response"=>"(
		  id int(11) NOT NULL AUTO_INCREMENT,
		  user_id bigint(20) unsigned NOT NULL,
		  course_id int(11) NOT NULL,
		  response_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  q1 text,
		  q2 text,
		  q3 text,
		  q4 text,
		  q5 text,
		  q6 text,
		  q7 text,
		  q8 text,
		  q9 text,
		  q10 text,
		  q11 text,
		  q12 text,
		  q13 text,
		  q14 text,
		  q15 text,
		  q16 text,
		  q17 text,
		  q18 text,
		  q19 text,
		  q20 text,
		  PRIMARY KEY (id),
		  UNIQUE KEY #e_unique# (user_id, course_id),
		  KEY e_user (user_id),
		  KEY e_course (course_id),
		  CONSTRAINT #e_course# FOREIGN KEY (course_id) REFERENCES #course# (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
		  CONSTRAINT #e_user# FOREIGN KEY (user_id) REFERENCES $wp_users (id) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB"
);
?>