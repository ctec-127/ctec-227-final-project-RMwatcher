SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";

CREATE TABLE `students`
(
    `student_id` INT
(100) UNSIGNED NOT NULL,
    `first_name` VARCHAR
(30)  NULL,
    `last-name` VARCHAR
(30)  NULL,
    `username` VARCHAR
(30)  NULL,
    `password` VARCHAR
(60) NULL,
    `major`VARCHAR
(30) NULL
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `students`
ADD PRIMARY KEY
(`student_id`) AUTO_INCREMENT, AUTO_INCREMENT=9;

CREATE TABLE `schools`
(
    `school_id` VARCHAR
(4) NOT NULL,
    `school_name` VARCHAR
(40) NULL,
    `address` VARCHAR
(30) NULL,
    `state` VARCHAR
(10) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `schools`
(`school_id`,`school_name`, `address`, `state`) VALUES
('CC63', 'Clark College', '1933 Fort Vancouver Way','Washington'),
('WSUV', 'Washington State University Vancouver','14204 NE Salmon Creek Ave', 'Washington'),
('PSU1', 'Portland State University', '724 SW Harrison', 'Oregon');

ALTER TABLE `schools`
ADD PRIMARY KEY
(`school_id`);

CREATE TABLE `instructor`
(
    `instructor_id` VARCHAR
(4) NOT NULL,
    `first_name` VARCHAR
(30) NULL,
    `last_name` VARCHAR
(30) NULL,
    `department_id` VARCHAR
(4) NULL,
    `school_id` VARCHAR
(4) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `instructor`
(`instructor_id`,`first_name`,`last_name`,`department_id`,`school_id`) VALUES
('bh01','Brody','Haney','ENGL','CC63'),
('we31','Winnie','Esparza','CHEM','WSUV'),
('gh95','Gino','Hagan','MATH','PSU1'),
('td96','Tala','Dupont','ACCT','PSU1'),
('sl32','Samah','Lees','ENGL','WSUV'),
('ng02','Nafisa','Gates','HIST','CC63'),
('um97','Uwais','McKinney','MATH','PSU1'),
('RM33','Rachel','Mcneil','ENGL','WSUV'),
('bs03','Bridie','Smith','CHEM','CC63');

ALTER TABLE `instructor`
ADD PRIMARY KEY
(`instructor_id`),  
ADD UNIQUE KEY `school`
(`school_id`),
ADD UNIQUE KEY `department`
(`department_id`);

CREATE TABLE `department`
(
    `department_id` VARCHAR
(4) NOT NULL,
    `department_name` VARCHAR
(40) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `department`
(`department_id`,`department_name`) VALUES
('MATH','Mathematics'),
('ENGL','English'),
('HIST','History'),
('ACCT','Accounting'),
('CHEM','Chemistry')
;

ALTER TABLE `department`
ADD PRIMARY KEY
(`department_id`);

CREATE TABLE `results`
(
    `results_id` VARCHAR
(4) NOT NULL,
    `student_name` VARCHAR
(40) NOT NULL,
    `instructor_id` VARCHAR
(4) NOT NULL,
    `school_id` VARCHAR
(4) NOT NULL,
    `results_1` TEXT,
    `results_2` TEXT,
    `results_3` TEXT,
    `results_4` TEXT,
    `results_5` TEXT,
    `results_6` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `results`
ADD PRIMARY KEY
(`results_id`) AUTO_INCREMENT, AUTO_INCREMENT=1, 
ADD UNIQUE KEY `students`
(`student_id`),
ADD UNIQUE KEY `instructor`
(`department_id`),
ADD UNIQUE KEY `schools`
(`school_id`);
COMMIT;