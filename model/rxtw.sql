drop database if exists rxTW;
create database rxTW;
use rxTW;

-- Phong
create TABLE EMPLOYEE(
	Ssn 	int unsigned	not null 	auto_increment,
	FName 	VARCHAR(50)	not null,
	Email 	VARCHAR(50)	DEFAULT NULL,
	Sex 	char			DEFAULT NULL,
	DoB 	DATE			DEFAULT NULL,
	Address VARCHAR(200) 	DEFAULT NULL,
    Salary 	int 			DEFAULT NULL,
    Bank_Id varchar(16)		DEFAULT NULL,
    Bank_Name 	VARCHAR(50) 	DEFAULT NULL,
    Bank_Branch VARCHAR(50)	DEFAULT NULL,
    Degree 		VARCHAR(50)	DEFAULT NULL,
    Mssn 		int unsigned,
    IdBranch	int	unsigned	DEFAULT NULL,
    Username 	VARCHAR(50)	DEFAULT NULL,
    primary key (Ssn)    
);

create table PhoneNumber(
	Tssn 		int unsigned	not null,
    Phone_num 	VARCHAR(10)	NOT NULL,
    primary key (Tssn, Phone_num)
);

create table Dependent(
	Essn	int	unsigned		not null,
    FDName	VARCHAR(50)	not null,
    Relationship	VARCHAR(50)	DEFAULT NULL,
    Dob				date 			DEFAULT NULL,
    primary key	(Essn, FDName)
);

-- Uy

CREATE TABLE branch (
  ID 	INT UNSIGNED 	NOT NULL 	AUTO_INCREMENT,
  BName	VARCHAR(255) 	NOT NULL,
  Address	VARCHAR(255)	NULL,
  Phone_num VARCHAR(255) 	NULL,
  PRIMARY KEY (ID)
-- UNIQUE INDEX ID_UNIQUE (ID ASC) VISIBLE
);

CREATE TABLE user (
    username	VARCHAR(255)	NOT NULL,           -- Username -> username
    password	 	VARCHAR(255)	NOT NULL, 		-- pass->password
    IsAdmin TINYINT NULL,
    PRIMARY KEY (Username)
    -- UNIQUE INDEX Username_UNIQUE (Username ASC) VISIBLE
);
    
CREATE TABLE customer (
  id	int unsigned	NOT NULL	AUTO_INCREMENT,       -- fasdf
  full_name varchar(255)	DEFAULT NULL,             --
  phone varchar(10) DEFAULT NULL,                   -- phone
  Sex 		char(1) 	DEFAULT NULL,
  userName varchar(255) DEFAULT NULL,               -- username
  address varchar(255),                             -- them vao
  email varchar(150),                               -- them vao
  status varchar(10),
  PRIMARY KEY 	(id), -- them vao
  UNIQUE KEY 	ID_UNIQUE (ID)
);
    
 -- Luan
CREATE TABLE Import_order
(
	ID 	int unsigned	auto_increment	NOT NULL,
    IDate 			date 			DEFAULT NULL,
    Name_partner	varchar(30) 	NOT NULL,
    Phone_partner	CHAR(10) 		DEFAULT NULL,
    ID_branch 		int unsigned 	DEFAULT NULL,
    PRIMARY KEY (ID)
);

create table Have
(
	ID_item		int unsigned	NOT NULL, -- auto_increment,
    ID_branch	int unsigned	NOT NULL, -- auto_increment,
    Quantity 	int unsigned	DEFAULT NULL,
    primary key (ID_item, ID_branch)
);

create table Include
(
	ID_item			int unsigned	NOT NULL, -- auto_increment,
    ID_import		int unsigned	NOT NULL, -- auto_increment,
    Quantity_Item	int unsigned	DEFAULT NULL,
	Price_Of_Item	int unsigned	DEFAULT NULL,
    primary key (ID_item, ID_import)
);

-- Lwu
CREATE TABLE Cart(
    ID			int	unsigned 	NOT NULL	auto_increment,
    ID_customer int unsigned 	NOT NULL,
    Clerk_SSN 	int unsigned	NOT NULL,
    Create_time	date			default null,
    voucher_ID	int	unsigned 	DEFAULT NULL,
    State 		CHAR 			default null,
    primary key(ID)
);
CREATE TABLE Cart_detail(
    ID_item		int unsigned 	NOT NULL,
    ID_Cart 	int unsigned 	NOT NULL,
    Price 		int unsigned	default null,
    quantity	int unsigned	default null,
    primary key(ID_item,ID_Cart)
);

CREATE TABLE Food(
	Id int unsigned	NOT NULL auto_increment,
    ID_item			int unsigned	NOT NULL,
    Net_weight 		int unsigned 	default null,
    Expired_date	int default 	null,
    Fat_content 	int unsigned 	default null,
    primary key(Id)
);

-- Khoa
CREATE TABLE Item
(
    ID 				int unsigned 	NOT NULL	auto_increment,
    Name_ 			VARCHAR(50) 	NOT NULL,
    Desciption		VARCHAR(50) 	DEFAULT NULL,		-- fix
    Listed_price 	INT UNSIGNED	DEFAULT NULL,
	Import_price 	INT unsigned	DEFAULT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE VOUCHER
(
    ID int unsigned NOT NULL auto_increment,
    Applied_price Int		DEFAULT NULL,
    Max_discount Int		DEFAULT NULL,
    Discount_percent Int	DEFAULT NULL,
	Start_date DATE			DEFAULT NULL,
    End_date DATE			DEFAULT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE DRINK
(
	Id int unsigned	NOT NULL auto_increment,
    ID_item int unsigned NOT NULL ,
    Ice_quantity int	DEFAULT NULL,
    Sweetness int		DEFAULT NULL,
    Size INT UNSIGNED	DEFAULT NULL,
    PRIMARY KEY (Id)
);

DROP PROCEDURE IF EXISTS insertUser;
delimiter //
create procedure insertUser(in inputUsername varchar(255), in inputPass VARCHAR(255), in inputIsAdmin TINYINT)
usernef: BEGIN
	declare ct int; 
    select count(*) from (user) where username = inputUsername into ct;
    if ct = 1 then
		SELECT 'Có thằng hay con gì đó xài username này rồi bạn, đổi lại đi bạn ơi' as message;
        leave usernef;
	end if ;
		select 'oke roi do' as message;
		insert into user VALUES (inputUsername, inputPass, inputIsAdmin);
end//
delimiter ;