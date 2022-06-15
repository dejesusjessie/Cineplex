CREATE TABLE if not exists `admin` (
  `a_email` varchar(50) NOT NULL unique,
  `a_usr` varchar(20) NOT NULL,
  `a_pwd` varchar(20) NOT NULL,
  `a_fname` varchar(30) NOT NULL,
  `a_lname` varchar(30) NOT NULL,
  `a_phone` varchar(10) NOT NULL,
  PRIMARY KEY (a_email)
) ENGINE=InnoDB;

CREATE TABLE if not exists `customer` (
  `c_email` varchar(50) NOT NULL unique,
  `c_usr` varchar(20) NOT NULL,
  `c_pwd` varchar(20) NOT NULL,
  `c_fname` varchar(30) NOT NULL,
  `c_lname` varchar(30) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_birth` date NOT NULL,
  PRIMARY KEY (c_email)
) ENGINE=InnoDB;

CREATE TABLE if not exists `state` (
  `state_id` varchar(3) NOT NULL unique,
  `state_name` varchar(20) NOT NULL,
  `state_abbr` varchar(5) NOT NULL,
  PRIMARY KEY (state_id)
) ENGINE=InnoDB;

CREATE TABLE if not exists `seat_type` (
  `type_id` varchar(1) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  `type_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (type_id)
) ENGINE=InnoDB;

CREATE TABLE if not exists `movie` (
  `movie_id` int(10) unsigned zerofill NOT NULL unique auto_increment,
  `movie_title` varchar(100) NOT NULL,
  `movie_info` varchar(1000) NOT NULL,
  `movie_poster` varchar(100) NOT NULL,
  `movie_vdo` varchar(100) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `duration` time NOT NULL,
  `a_email` varchar(50) NOT NULL default 'Admin',
  
	PRIMARY KEY (movie_id),
    FOREIGN KEY (a_email) REFERENCES admin (a_email)
		on delete restrict on update cascade
) ENGINE=InnoDB;

CREATE TABLE if not exists `booked` (
  `booked_id` int(10) unsigned zerofill NOT NULL unique auto_increment,
  `booked_price` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `booked_date` date NOT NULL,
  `c_email` varchar(50) NOT NULL default 'Customer',
  `booked_status` varchar(1) NOT NULL,
    PRIMARY KEY (booked_id),
    FOREIGN KEY (c_email) REFERENCES customer (c_email)
		on delete restrict on update cascade
) ENGINE=InnoDB;

CREATE TABLE if not exists `branch` (
  `branch_id` int(5) unsigned zerofill NOT NULL unique auto_increment,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `state_id` varchar(3) NOT NULL,
	PRIMARY KEY (branch_id),
    FOREIGN KEY (state_id) REFERENCES state (state_id)
		on delete cascade on update cascade
) ENGINE=InnoDB;

CREATE TABLE if not exists `theatre` (
  `theatre_id` int(5) unsigned zerofill NOT NULL unique auto_increment,
  `theatre_name` varchar(30) NOT NULL,
  `branch_id` int(5) unsigned zerofill NOT NULL,
    PRIMARY KEY (theatre_id),
    FOREIGN KEY (branch_id) REFERENCES branch (branch_id)
		on delete cascade on update cascade
) ENGINE=InnoDB;

CREATE TABLE if not exists `seat` (
  `seat_id` varchar(3) NOT NULL,
  `theatre_id` int(5) unsigned zerofill NOT NULL,
  `seat_status` varchar(1) NOT NULL,
  `type_id` varchar(1) NOT NULL default 'N',
    PRIMARY KEY (seat_id, theatre_id),
    FOREIGN KEY (type_id) REFERENCES seat_type (type_id)
		on delete restrict on update cascade,
    FOREIGN KEY (theatre_id) REFERENCES theatre (theatre_id)
		on delete cascade on update cascade
) ENGINE=InnoDB;

CREATE TABLE if not exists `showtime` (
  `showtime_id` int(5) unsigned zerofill NOT NULL unique auto_increment,
  `movie_id` int(10) unsigned zerofill NOT NULL,
  `theatre_id` int(5) unsigned zerofill NOT NULL,
  `showtime_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `a_email` varchar(50) NOT NULL default 'Admin',
    PRIMARY KEY (showtime_id),
    FOREIGN KEY (movie_id) REFERENCES movie (movie_id)
		on delete cascade on update cascade,
    FOREIGN KEY (theatre_id) REFERENCES theatre (theatre_id)
		on delete cascade on update cascade,
    FOREIGN KEY (a_email) REFERENCES admin (a_email)
		on delete restrict on update cascade
) ENGINE=InnoDB;

CREATE TABLE if not exists `ticket` (
  `ticket_id` int(10) unsigned zerofill NOT NULL unique auto_increment,
  `seat_id` varchar(3) NOT NULL,
  `showtime_id` int(5) unsigned zerofill NOT NULL,
  `booked_id` int(10) unsigned zerofill NOT NULL,
    PRIMARY KEY (ticket_id),
    FOREIGN KEY (seat_id) REFERENCES seat (seat_id)
		on delete cascade on update cascade,
	FOREIGN KEY (showtime_id) REFERENCES showtime (showtime_id)
		on delete cascade on update cascade,
    FOREIGN KEY (booked_id) REFERENCES booked (booked_id)
		on delete cascade on update cascade
) ENGINE=InnoDB;