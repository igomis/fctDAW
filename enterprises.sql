CREATE TABLE `enterprises` (
  `cif` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `location` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `contact` varchar(150) NULL,
  `activity` varchar(100) NULL,
  `comments` text NULL,
  `places` tinyint(4) default 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `enterprises` ADD PRIMARY KEY (`cif`);
