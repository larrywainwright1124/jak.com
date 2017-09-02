CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


insert into users (user_name, user_pass) values ('jwainwright', md5('jwainwright'));
insert into users (user_name, user_pass) values ('lwainwright', md5('lwainwright'));

