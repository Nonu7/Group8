CREATE TABLE `users` (
  `user_id` integer PRIMARY KEY,
  `user_name` varchar(255),
  `email` varchar(255),
  `pass` varchar(255),
  `phone` integer,
  `address` varchar(255)
);

CREATE TABLE `book_issue` (
  `id` integer PRIMARY KEY,
  `user_id` integer,
  `book_id` integer,
  `date_issued` date,
  `due_date` date
);

CREATE TABLE `books` (
  `book_id` integer PRIMARY KEY,
  `ISBN` varchar(255),
  `title` varchar(255),
  `author` varchar(255),
  `publisher` varchar(255),
  `category` varchar(255),
  `availability` varchar(255),
  `quantity` varchar(255)
);

CREATE TABLE `admin` (
  `admin_id` integer PRIMARY KEY,
  `user_id` integer,
  `role` varchar(255),
  `admin_name` varchar(255),
  `pass` varchar(255)
);

CREATE TABLE `book_return` (
  `book_issue_id` integer PRIMARY KEY,
  `user_id` integer,
  `book_id` integer,
  `date_returned` date,
  `due_date` date,
  `fine` integer
);

CREATE TABLE `catagory` (
  `name` varchar(255),
  `details` varchar(255)
);

CREATE TABLE `book_inventory` (
  `book_id` integer,
  `shelf_no` integer,
  `floor` integer
);

CREATE TABLE `notification` (
  `id` integer PRIMARY KEY,
  `admin_id` integer,
  `user_id` integer,
  `message` varchar(255)
);

ALTER TABLE `admin` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `book_issue` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `book_return` ADD FOREIGN KEY (`book_issue_id`) REFERENCES `book_issue` (`id`);

ALTER TABLE `books` ADD FOREIGN KEY (`book_id`) REFERENCES `book_issue` (`book_id`);

ALTER TABLE `catagory` ADD FOREIGN KEY (`name`) REFERENCES `books` (`category`);

ALTER TABLE `book_inventory` ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

ALTER TABLE `notification` ADD FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

ALTER TABLE `notification` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
