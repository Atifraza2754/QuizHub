-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 03:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`question_id`, `answer_id`, `answer`) VALUES
(1, 1, 'Hypetext homepage'),
(1, 2, 'Hypertext preprocessor'),
(1, 3, 'Personal homepage'),
(2, 4, 'cascading style series'),
(2, 5, 'Set of style series'),
(2, 6, 'Cascading style sheet'),
(3, 7, 'Markup language'),
(3, 8, 'Animation language'),
(3, 9, 'Scripting language'),
(4, 10, 'PHP is open source programming language'),
(4, 11, 'PHP is server side scripting language'),
(4, 12, 'All of the above'),
(5, 13, 'Dark kolviki'),
(5, 14, 'Rasmus lerdorf'),
(5, 15, 'List barely'),
(6, 16, 'Objects are accessible only from the page in which they are created.'),
(6, 17, 'Objects are accessible only from the pages which are in same session.'),
(6, 18, 'Objects are accessible only from the pages which are processing the same request.'),
(7, 19, ' save_data'),
(7, 20, 'session.save'),
(7, 21, 'session.save_handler'),
(8, 22, 'PHPSESSID'),
(8, 23, 'PHPSESID'),
(8, 24, 'PHPSESSIONID'),
(9, 25, '3600 min'),
(9, 26, 'the browser is restarted'),
(9, 27, '3600 sec'),
(10, 28, '360'),
(10, 29, '180'),
(10, 30, '3600'),
(11, 33, 'An array is a type of function that performs calculations.'),
(11, 34, 'An array is a data structure that stores a collection of elements'),
(11, 35, 'An array is a single value stored in a variable.'),
(12, 36, 'A container for storing data'),
(12, 37, 'A variable is a fixed value that cannot be changed.'),
(12, 38, 'A variable is a special type of function that runs automatically.'),
(13, 39, 'False'),
(13, 40, 'True'),
(13, 41, 'None Of the Above'),
(14, 42, 'define myFunction() { // code }'),
(14, 43, 'function: myFunction() { // code }'),
(14, 44, 'function myFunction() { // code }'),
(15, 45, 'Inbuilt constants'),
(15, 46, 'Default constants'),
(15, 47, 'Magic constants'),
(16, 48, 'PHP event and application repository'),
(16, 49, 'PHP enhancement and application reduce'),
(16, 50, 'PHP extension and application repository'),
(17, 51, 'id()'),
(17, 52, 'uniqueid()'),
(17, 53, 'mdid()'),
(18, 54, 'The fopen() function is used to open files in PHP'),
(18, 55, 'The fopen() function is used to open remote server'),
(18, 56, 'The fopen() function is used to open folders in PHP'),
(19, 57, 'The isset() function is used to check whether the variable is string or not'),
(19, 58, 'The isset() function is used to check whether the variable is free or not'),
(19, 59, 'The isset() function is used to check whether variable is set or not'),
(20, 60, 'fopen(\"sample.txt\", \"r+\");'),
(20, 61, 'fopen(\"sample.txt\", \"r\");'),
(20, 62, 'fopen(\"sample.txt\", \"read\");');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `user_id` int(20) NOT NULL,
  `username` text NOT NULL,
  `gender` text NOT NULL,
  `mobile_no` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `role` text NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`user_id`, `username`, `gender`, `mobile_no`, `email`, `password`, `token`, `role`) VALUES
(1, 'Waheed', 'Male', '+923022324334', 'aatifraza2023@gmail.com', '$2y$10$jHqF/F.tSHcLJUKVxNUXAu0tdOPUITxNrsOEm/YRp9N.RhDIEQMQe', '8a64878eb798629ea02e64d3909adbde', 'Admin'),
(2, 'Atif Raza', 'Male', '+9230223243311', 'atifrazait@gmail.com', '$2y$10$A7ZcDk.C/IaYkXzXXFIbYec7ToR0hqaS2fMgsF6bqFhOgEqih1IA2', '', 'Admin'),
(4, 'Ashhad ahmed', 'male', '+9234423203622', 'atifraza1359@gmail.com', '$2y$10$k/MEWbWeNVDdViocjk5qWO5.aUj.rxr3sC7W.GI9RT31PNTCYHk4G', '0739c3cdf303e67b277b7e2242b4450b', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(20) NOT NULL,
  `question` text NOT NULL,
  `answer_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `answer_key`) VALUES
(1, 'PHP stands for__?', 'Hypertext preprocessor'),
(2, 'CSS stands for ___?', 'Cascading style sheet'),
(3, 'JavaScript is _____?', 'Scripting language'),
(4, 'What is PHP___?', 'All of the above'),
(5, 'Who is father of PHP__?', 'Rasmus lerdorf'),
(6, 'Which option is true about session scope__?', 'Objects are accessible only from the pages which are in same session.'),
(7, 'Which directive determines how the session information will be stored__?', 'session.save_handler'),
(8, 'Which one of the following is the default PHP session name__?', 'PHPSESSID'),
(9, ' If the directive session.cookie_lifetime is set to 3600, the cookie will live until__?', '3600 sec'),
(10, 'What is the default number of seconds that cached session pages are made available before the new pages are created__?', '180'),
(11, 'What is Array___?', 'An array is a data structure that stores a collection of elements'),
(12, 'What is a Variable__?', 'A container for storing data'),
(13, 'Echo returns nothing and print returns 1. Is it true or false__?', 'True'),
(14, 'How do you define a function in PHP?', 'function myFunction() { // code }'),
(15, 'Which of the following starts with __ (double underscore) in PHP?', 'Magic constants'),
(16, 'What does PEAR stands for?', 'PHP extension and application repository'),
(17, 'Which of the following PHP function is used to generate unique id?', 'uniqueid()'),
(18, 'What is the use of fopen() function in PHP?', 'The fopen() function is used to open files in PHP'),
(19, ' What is the use of isset() function in PHP?', 'The isset() function is used to check whether variable is set or not'),
(20, 'Which of the following is the correct way to open the file \"sample.txt\" as readable?', 'fopen(\"sample.txt\", \"r\");');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `total_question` int(15) NOT NULL,
  `correct_question` int(15) NOT NULL,
  `wrong_question` int(15) NOT NULL,
  `obtain_marks` int(15) NOT NULL,
  `total_marks` int(15) NOT NULL,
  `test_date` date NOT NULL,
  `result_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `user_id`, `total_question`, `correct_question`, `wrong_question`, `obtain_marks`, `total_marks`, `test_date`, `result_status`) VALUES
(4, 1, 20, 13, 7, 65, 100, '2010-08-24', 'Pass'),
(5, 1, 20, 13, 7, 65, 100, '2024-11-23', 'Pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `candidates` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
