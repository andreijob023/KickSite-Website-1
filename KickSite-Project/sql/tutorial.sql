CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Email varchar(200),
    Username varchar(200),
    Password varchar(200)
);

CREATE TABLE admin_table(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Email varchar(200),
    Password varchar(200)
);

INSERT INTO `admin_table` (`id`, `email`, `password`) VALUES
(1, 'pkldojo@gmail.com', 'pkldojobatangas');