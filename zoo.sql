
CREATE TABLE `attraction` (
  `AttractionName` char(40) NOT NULL,
  `ZooName` char(40) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`AttractionName` , `ZooName`)	
); 


CREATE TABLE `attractionhashours` (
  `StartTime` time NOT NULL DEFAULT '00:00:00',
  `EndTime` time NOT NULL DEFAULT '24:00:00',
  `AttractionName` char(40) NOT NULL,
  `ZooName` char(40) NOT NULL,
  PRIMARY KEY (`StartTime`, `EndTime`, `AttractionName`, `ZooName`)	
);


CREATE TABLE `exhibit` (
  `ExhibitName` char(40) NOT NULL,
  `ZooName` char(40) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ExhibitName`, `ZooName`)	
);


CREATE TABLE `exhibithasanimal` (
  `ExhibitName` char(40) NOT NULL,
  `AnimalName` char(40) NOT NULL,
  PRIMARY KEY (`AnimalName`)	
);



CREATE TABLE `open` (
  `DayName` char(20) NOT NULL,
  `ZooName` char(40) NOT NULL,
  `StartTime` time NOT NULL DEFAULT '00:00:00',
  `EndTime` time NOT NULL DEFAULT '24:00:00',
  PRIMARY KEY (`DayName`, `ZooName`, `StartTime`, `EndTime`)	
);


CREATE TABLE `ride` (
  `RideName` char(40) NOT NULL,
  `ZooName` char(40) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`RideName`, `ZooName`)
);


CREATE TABLE `show` (
  `ShowName` char(40) NOT NULL,
  `ZooName` char(40) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ShowName`, `ZooName`)
);


CREATE TABLE `showhasanimal` (
  `ShowName` char(40) NOT NULL,
  `AnimalName` char(40) NOT NULL,
  PRIMARY KEY (`ShowName`, `AnimalName`)
);


CREATE TABLE `zoo` (
  `ZooName` char(40) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ZooName`)
);


CREATE TABLE `zoohasaddress` (
  `ZooName` char(40) NOT NULL,
  `City` char(40) NOT NULL,
  `Zip` int(5) NOT NULL,
  `Street` char(40) NOT NULL,
  PRIMARY KEY (`ZooName`, `City`, `Zip`, `Street`)
);


CREATE TABLE `zoohasanimal` (
  `ZooName` char(40) NOT NULL,
  `AnimalName` char(40) NOT NULL,
  PRIMARY KEY (`ZooName`, `AnimalName`)
);


