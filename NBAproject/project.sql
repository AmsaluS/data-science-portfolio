CREATE DATABASE IF NOT EXISTS ll_aschmidt;
USE ll_aschmidt;

## Question 1: Write SQL statements to create tables for your database application.
## Pick suitable data types for each attribute. For each table, specify primary key
## and indicate foreign key if any.
-- Table: Division
CREATE TABLE Division (
DivisionID INT PRIMARY KEY,
DivisionName VARCHAR(50) NOT NULL,
ConferenceName VARCHAR(50) NOT NULL,
NumberOfTeams INT
);
-- Table: Team
CREATE TABLE Team (
TeamID INT PRIMARY KEY,
DivisionID INT,
TeamName VARCHAR(100) NOT NULL,
City VARCHAR(100) NOT NULL,
Arena VARCHAR(100),
RingsWon INT,
FOREIGN KEY (DivisionID) REFERENCES Division(DivisionID)
);
-- Table: Player
CREATE TABLE Player (
PlayerID INT PRIMARY KEY,
TeamID INT,
PlayerFName VARCHAR(50) NOT NULL,
PlayerLName VARCHAR(50) NOT NULL,
Position VARCHAR(50),
Height DECIMAL(5, 2),
Weight DECIMAL(5, 2),
DOB DATE,
ContractDetails TEXT,
FOREIGN KEY (TeamID) REFERENCES Team(TeamID)
);
-- Table: Coach
CREATE TABLE Coach (
CoachID INT PRIMARY KEY,
TeamID INT,
CoachFName VARCHAR(50) NOT NULL,
CoachLName VARCHAR(50) NOT NULL,
Role VARCHAR(50),
YearsExperience INT,
FOREIGN KEY (TeamID) REFERENCES Team(TeamID)
);
-- Table: Season
CREATE TABLE Season (
SeasonID INT PRIMARY KEY,
Year INT NOT NULL,
StartDate DATE,
EndDate DATE
);
-- Table: TeamSeason
CREATE TABLE TeamSeason (
TeamSeasonID INT PRIMARY KEY,
TeamID INT,
SeasonID INT,
Record VARCHAR(50),
PlayOffStanding VARCHAR(50),
FOREIGN KEY (TeamID) REFERENCES Team(TeamID),
FOREIGN KEY (SeasonID) REFERENCES Season(SeasonID)
);
-- Table: Game
CREATE TABLE Game (
GameID INT PRIMARY KEY,
HomeTeamID INT,
AwayTeamID INT,
Date DATE,
Arena VARCHAR(100),
FinalScore VARCHAR(50),
FOREIGN KEY (HomeTeamID) REFERENCES Team(TeamID),
FOREIGN KEY (AwayTeamID) REFERENCES Team(TeamID)
);
-- Table: PlayerGame
CREATE TABLE PlayerGame (
PlayerID INT,
GameID INT,
StatID INT,
Points INT,
Assists INT,
Rebounds INT,
Steals INT,
Blocks INT,
MinsPG DECIMAL(5, 2),
TurnOvers INT,
PRIMARY KEY (PlayerID, GameID, StatID),
FOREIGN KEY (PlayerID) REFERENCES Player(PlayerID),
FOREIGN KEY (GameID) REFERENCES Game(GameID)
);
## Question 2: Write SQL statements to populate each table in your database
## with at least 10 records.
-- Populate Division
INSERT INTO Division (DivisionID, DivisionName, ConferenceName, NumberOfTeams)
VALUES
(1, 'Atlantic', 'Eastern', 5),
(2, 'Central', 'Eastern', 5),
(3, 'Southeast', 'Eastern', 5),
(4, 'Northwest', 'Western', 5),
(5, 'Pacific', 'Western', 5),
(6, 'Southwest', 'Western', 5),
(7, 'Metropolitan', 'Eastern', 5),
(8, 'Midwest', 'Western', 5),
(9, 'Northeast', 'Eastern', 5),
(10, 'South', 'Western', 5);
-- Populate Team
INSERT INTO Team (TeamID, DivisionID, TeamName, City, Arena, RingsWon)
VALUES
(1, 1, 'Boston Celtics', 'Boston', 'TD Garden', 17),
(2, 1, 'Brooklyn Nets', 'Brooklyn', 'Barclays Center', 0),
(3, 2, 'Chicago Bulls', 'Chicago', 'United Center', 6),
(4, 3, 'Miami Heat', 'Miami', 'FTX Arena', 3),
(5, 4, 'Denver Nuggets', 'Denver', 'Ball Arena', 1),
(6, 5, 'Los Angeles Lakers', 'Los Angeles', 'Crypto.com Arena', 17),
(7, 6, 'Dallas Mavericks', 'Dallas', 'American Airlines Center', 1),
(8, 7, 'New York Knicks', 'New York', 'Madison Square Garden', 2),
(9, 8, 'Houston Rockets', 'Houston', 'Toyota Center', 2),
(10, 9, 'Philadelphia 76ers', 'Philadelphia', 'Wells Fargo Center', 3);
-- Populate Player
INSERT INTO Player (PlayerID, TeamID, PlayerFName, PlayerLName, Position, Height,
Weight, DOB, ContractDetails)
VALUES
(1, 1, 'Jayson', 'Tatum', 'Forward', 6.8, 210, '1998-03-03', '5-year, $163M'),
(2, 1, 'Jaylen', 'Brown', 'Forward', 6.6, 223, '1996-10-24', '4-year, $107M'),
(3, 3, 'Zach', 'LaVine', 'Guard', 6.5, 200, '1995-03-10', '4-year, $78M'),
(4, 4, 'Jimmy', 'Butler', 'Forward', 6.7, 230, '1989-09-14', '4-year, $140M'),
(5, 5, 'Nikola', 'Jokic', 'Center', 6.11, 284, '1995-02-19', '5-year, $147M'),
(6, 6, 'LeBron', 'James', 'Forward', 6.9, 250, '1984-12-30', '2-year, $85M'),
(7, 7, 'Luka', 'Doncic', 'Guard', 6.7, 230, '1999-02-28', '5-year, $207M'),
(8, 8, 'Julius', 'Randle', 'Forward', 6.8, 250, '1994-11-29', '4-year, $117M'),
(9, 9, 'Jalen', 'Green', 'Guard', 6.4, 186, '2002-02-09', '4-year, $40M'),
(10, 10, 'Joel', 'Embiid', 'Center', 7.0, 280, '1994-03-16', '4-year, $147M');
-- Populate Coach
INSERT INTO Coach (CoachID, TeamID, CoachFName, CoachLName, Role, YearsExperience)
VALUES
(1, 1, 'Joe', 'Mazzulla', 'Head Coach', 5),
(2, 3, 'Billy', 'Donovan', 'Head Coach', 10),
(3, 4, 'Erik', 'Spoelstra', 'Head Coach', 15),
(4, 5, 'Michael', 'Malone', 'Head Coach', 12),
(5, 6, 'Darvin', 'Ham', 'Head Coach', 3),
(6, 7, 'Jason', 'Kidd', 'Head Coach', 8),
(7, 8, 'Tom', 'Thibodeau', 'Head Coach', 20),
(8, 9, 'Stephen', 'Silas', 'Head Coach', 5),
(9, 10, 'Doc', 'Rivers', 'Head Coach', 25),
(10, 2, 'Jacque', 'Vaughn', 'Head Coach', 7);
-- Populate Season
INSERT INTO Season (SeasonID, Year, StartDate, EndDate)
VALUES
(1, 2022, '2022-10-18', '2023-04-10'),
(2, 2023, '2023-10-24', '2024-04-14'),
(3, 2021, '2021-10-19', '2022-04-10'),
(4, 2020, '2020-12-22', '2021-05-16'),
(5, 2019, '2019-10-22', '2020-04-15'),
(6, 2018, '2018-10-16', '2019-04-10'),
(7, 2017, '2017-10-17', '2018-04-11'),
(8, 2016, '2016-10-25', '2017-04-12'),
(9, 2015, '2015-10-27', '2016-04-13'),
(10, 2014, '2014-10-28', '2015-04-15');
-- Populate TeamSeason
INSERT INTO TeamSeason (TeamSeasonID, TeamID, SeasonID, Record, PlayOffStanding)
VALUES
(1, 1, 1, '55-27', 'Conference Finals'),
(2, 3, 1, '46-36', 'First Round'),
(3, 4, 1, '53-29', 'Finals'),
(4, 5, 1, '48-34', 'Second Round'),
(5, 6, 2, '50-32', 'Conference Finals'),
(6, 7, 2, '47-35', 'First Round'),
(7, 8, 2, '42-40', 'Second Round'),
(8, 9, 2, '20-62', 'Missed Playoffs'),
(9, 10, 2, '54-28', 'Conference Semifinals'),
(10, 2, 2, '45-37', 'First Round');
-- Populate Game
INSERT INTO Game (GameID, HomeTeamID, AwayTeamID, Date, Arena, FinalScore)
VALUES
(1, 1, 3, '2023-01-12', 'TD Garden', '112-108'),
(2, 4, 5, '2023-02-15', 'FTX Arena', '105-110'),
(3, 5, 1, '2023-03-20', 'Ball Arena', '118-120'),
(4, 6, 7, '2023-04-01', 'Crypto.com Arena', '115-110'),
(5, 8, 9, '2023-04-05', 'Madison Square Garden', '102-98'),
(6, 10, 2, '2023-04-10', 'Wells Fargo Center', '120-115'),
(7, 3, 4, '2023-04-15', 'United Center', '108-112'),
(8, 7, 8, '2023-04-20', 'American Airlines Center', '105-100'),
(9, 9, 10, '2023-04-25', 'Toyota Center', '98-102'),
(10, 2, 1, '2023-04-30', 'Barclays Center', '110-115');
-- Populate PlayerGame
INSERT INTO PlayerGame (PlayerID, GameID, StatID, Points, Assists, Rebounds,
Steals, Blocks, MinsPG, TurnOvers)
VALUES
(1, 1, 1, 32, 5, 8, 2, 1, 38.5, 3),
(2, 1, 2, 28, 6, 7, 1, 0, 36.0, 2),
(3, 1, 3, 25, 4, 5, 1, 0, 34.5, 4),
(4, 2, 4, 30, 7, 6, 2, 1, 37.0, 3),
(5, 2, 5, 27, 10, 12, 1, 2, 39.0, 2),
(6, 4, 6, 35, 8, 10, 2, 1, 40.0, 4),
(7, 4, 7, 28, 9, 7, 1, 0, 38.5, 3),
(8, 5, 8, 22, 5, 6, 1, 1, 35.0, 2),
(9, 6, 9, 30, 6, 8, 2, 1, 37.5, 3),
(10, 6, 10, 25, 7, 9, 1, 2, 36.0, 2);
## Question 3: SQL statement based on the five query questions.
## Query 1: Inner Join on Two or More Tables
-- Find the names of players, their teams, and the game dates where they scored more than 25 points.
SELECT p.PlayerFName, p.PlayerLName, t.TeamName, g.Date, pg.Points
FROM Player p
INNER JOIN Team t ON p.TeamID = t.TeamID
INNER JOIN PlayerGame pg ON p.PlayerID = pg.PlayerID
INNER JOIN Game g ON pg.GameID = g.GameID
WHERE pg.Points > 25;
## Query 2: Aggregate Function
-- Calculate the total points scored by each team in all games.
SELECT t.TeamName, SUM(pg.Points) AS TotalPoints
FROM Team t
INNER JOIN Player p ON t.TeamID = p.TeamID
INNER JOIN PlayerGame pg ON p.PlayerID = pg.PlayerID
GROUP BY t.TeamName;
## Query 3: Subquery
-- Find the players who are taller than the average height of all players.
SELECT PlayerFName, PlayerLName, Height
FROM Player
WHERE Height > (SELECT AVG(Height) FROM Player);
## Query 4: GROUP BY and HAVING Clause
-- Find teams that have won more than 2 rings.
SELECT TeamName, RingsWon
FROM Team
GROUP BY TeamName, RingsWon
HAVING RingsWon > 2;
## Query 5: Left Outer Join
-- List all teams and their coaches, including teams without a coach.
SELECT t.TeamName, c.CoachFName, c.CoachLName
FROM Team t
LEFT OUTER JOIN Coach c ON t.TeamID = c.TeamID;

