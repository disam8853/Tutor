-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2020 年 05 月 28 日 09:05
-- 伺服器版本: 5.7.30-0ubuntu0.16.04.1
-- PHP 版本： 7.0.33-0ubuntu0.16.04.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mydb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `case_table`
--

CREATE TABLE `case_table` (
  `SID` int(11) NOT NULL,
  `TID` int(11) NOT NULL,
  `Time` text NOT NULL,
  `Region` text NOT NULL,
  `Subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `case_table`
--

INSERT INTO `case_table` (`SID`, `TID`, `Time`, `Region`, `Subject`) VALUES
(1, 1, 'night', 'Taipei', 'jizz');

-- --------------------------------------------------------

--
-- 資料表結構 `click_table`
--

CREATE TABLE `click_table` (
  `SID` int(11) NOT NULL,
  `TID` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Period` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `click_table`
--

INSERT INTO `click_table` (`SID`, `TID`, `Date`, `Period`) VALUES
(1, 1, '2020/05/28', '09:04:37');

-- --------------------------------------------------------

--
-- 資料表結構 `member_table`
--

CREATE TABLE `member_table` (
  `uid` varchar(16) NOT NULL,
  `username` text NOT NULL,
  `sex` text NOT NULL,
  `age` int(11) NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `member_table`
--

INSERT INTO `member_table` (`uid`, `username`, `sex`, `age`, `mail`, `password`) VALUES
('root', 'root', 'M', 20, '4gpeanut@gmail.com', '1230'),
('root', 'root', 'male', 20, 'b06705058@gmail.com', 'root');

-- --------------------------------------------------------

--
-- 資料表結構 `student_table`
--

CREATE TABLE `student_table` (
  `SID` int(11) NOT NULL,
  `school` text NOT NULL,
  `UID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `student_table`
--

INSERT INTO `student_table` (`SID`, `school`, `UID`) VALUES
(1, 'NTU', 'root');

-- --------------------------------------------------------

--
-- 資料表結構 `S_case_table`
--

CREATE TABLE `S_case_table` (
  `SCID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `Region` text NOT NULL,
  `Subject` text NOT NULL,
  `Timee` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `S_case_table`
--

INSERT INTO `S_case_table` (`SCID`, `SID`, `Region`, `Subject`, `Timee`) VALUES
(1, 1, 'Taipei', 'jizz', 'night');

-- --------------------------------------------------------

--
-- 資料表結構 `teacher_table`
--

CREATE TABLE `teacher_table` (
  `TID` int(11) NOT NULL,
  `Seniority` int(11) NOT NULL,
  `Education` text NOT NULL,
  `UID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `teacher_table`
--

INSERT INTO `teacher_table` (`TID`, `Seniority`, `Education`, `UID`) VALUES
(1, 2, 'college', 'root');

-- --------------------------------------------------------

--
-- 資料表結構 `T_case_table`
--

CREATE TABLE `T_case_table` (
  `TCID` int(11) NOT NULL,
  `TID` int(11) NOT NULL,
  `Region` text NOT NULL,
  `Subject` text NOT NULL,
  `Time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`SID`);

--
-- 資料表索引 `S_case_table`
--
ALTER TABLE `S_case_table`
  ADD PRIMARY KEY (`SCID`);

--
-- 資料表索引 `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`TID`);

--
-- 資料表索引 `T_case_table`
--
ALTER TABLE `T_case_table`
  ADD PRIMARY KEY (`TCID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `student_table`
--
ALTER TABLE `student_table`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `S_case_table`
--
ALTER TABLE `S_case_table`
  MODIFY `SCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `T_case_table`
--
ALTER TABLE `T_case_table`
  MODIFY `TCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
