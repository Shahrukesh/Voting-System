-- Create the database
CREATE DATABASE polltest;
USE polltest;

-- Create and define the `languages` table
CREATE TABLE `languages` (
  `lan_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(10) NOT NULL,
  `about` varchar(255) NOT NULL,
  `votecount` int NOT NULL,
  PRIMARY KEY (`lan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into `languages`
INSERT INTO `languages` (`lan_id`, `fullname`, `about`, `votecount`) VALUES
(1, 'JAVA', 'java is', 5),
(2, 'PYTHON', 'python is', 6),
(3, 'C++', 'c++ is', 21),
(4, 'PHP', 'php is', 17),
(5, '.NET', '.net is ', 4);

-- Set AUTO_INCREMENT for `languages`
ALTER TABLE `languages`
  MODIFY `lan_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- Create and define the `loginusers` table
CREATE TABLE `loginusers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(80) NOT NULL DEFAULT 'voter',
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into `loginusers`
INSERT INTO `loginusers` (`id`, `username`, `password`, `rank`, `status`) VALUES
(47, 'helllo', 'b373c043b854b0ebb97afe9b0ba47059', 'voter', 'ACTIVE'),
(46, 'jaha', 'e3df9353ab12391b79865f25a0d7068e', 'voter', 'ACTIVE'),
(45, 'action', '1ace9555f0aafb4fe1e75309e8f79e4d', 'voter', 'ACTIVE'),
(44, 'arjun', '451d3eb1573c7ebb70c08dfee9766509', 'voter', 'ACTIVE'),
(43, 'niku19', 'ac61ebbe84c06debaa78c0a832330164', 'voter', 'ACTIVE'),
(42, 'ejjhed', 'b3f70c0d1b269668e937741a5d5797ab', 'voter', 'ACTIVE'),
(41, 'Anirban', '9a7108cfaa7f51efb5fcda9e9d4b7a90', 'voter', 'ACTIVE'),
(40, 'dnddd', 'b5d165334b465a7fc42310750430b3f9', 'voter', 'ACTIVE');

-- Set AUTO_INCREMENT for `loginusers`
ALTER TABLE `loginusers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

-- Create and define the `voters` table with new `voter_id` AUTO_INCREMENT column
CREATE TABLE `voters` (
  `voter_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NOTVOTED',
  `voted` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`voter_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into `voters` with `voter_id`
INSERT INTO `voters` (`voter_id`, `firstname`, `lastname`, `username`, `status`, `voted`) VALUES
(1, 'sdjdjdj', 'djdjddjj', 'helllo', 'VOTED', 'python'),
(2, 'Anirban', 'oodoododo', 'jaha', 'NOTVOTED', NULL),
(3, 'Anirban', 'Dutta', 'action', 'VOTED', 'php'),
(4, 'Anirban', 'Dutta', 'arjun', 'NOTVotle', NULL),
(5, 'janemaan', 'lohiid', 'niku19', 'VOTED', 'c++'),
(6, 'asdhk', 'ddddnd', 'ejjhed', 'NOTVOTED', NULL),
(7, 'Anirban', 'Dutta', 'Anirban', 'VOTED', 'java'),
(8, 'ndndnd', 'dhbhdd', 'dnddd', 'NOTVOTED', NULL);

-- Set AUTO_INCREMENT for `voters`
ALTER TABLE `voters`
  MODIFY `voter_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
