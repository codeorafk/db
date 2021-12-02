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

CREATE TABLE rxtw.branch (
  ID 	INT UNSIGNED 	NOT NULL 	AUTO_INCREMENT,
  BName	VARCHAR(255) 	NOT NULL,
  Address	VARCHAR(255)	NULL,
  Phone_num VARCHAR(255) 	NULL,
  PRIMARY KEY (ID),
  UNIQUE INDEX ID_UNIQUE (ID ASC) VISIBLE
);

CREATE TABLE rxtw.user (
    Username	VARCHAR(255)	NOT NULL,
    Pass	 	VARCHAR(255)	NOT NULL, 		-- password	-> pass
    IsAdmin TINYINT NULL,
    PRIMARY KEY (Username),
    UNIQUE INDEX Username_UNIQUE (Username ASC) VISIBLE
);
    
CREATE TABLE customer (
  ID	int unsigned	NOT NULL	AUTO_INCREMENT,
  CName varchar(255)	DEFAULT NULL,
  Phone_num varchar(10) DEFAULT NULL,
  Sex 		char(1) 	DEFAULT NULL,
  UserName varchar(255) DEFAULT NULL,
  PRIMARY KEY 	(ID),
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

insert into employee (FName , Email ,Sex ,	DoB ,	Address ,    Salary,    Bank_Id ,    Bank_Name ,    Bank_Branch ,    Degree ,    Mssn,    IdBranch,    Username )
values
('Francis Bao', 'bao@gmail.com','M', '1992-02-15','29 Nguyen Chinh Thang Ho Chi Minh', 40000000, 1,'OCB Banking', 'OCB', 'Đại học', 2, 2 , 'bao123'),
('Thomas Chi', 'a@gmail.com', 'F', '1994-03-13','29 Nguyen Chinh Thang Ho Chi Minh', 20000000, 2, 'ACB Banking', 'ACB','Cao học',2,2, 'a123');

insert into Phonenumber (Tssn, Phone_num)
values
(1, '0240284948'),
(1, '0381749928'),
(2, '0829472947'),
(2, '0917482020');

insert into Dependent (Essn, FDName, Relationship, Dob)
values
(1, 'Duc Phan', 'Daddy', '1935-10-15'),
(1, 'Ngoc Pham', 'Mommy', '1998-10-15'),
(2, 'Nam Nguyen', 'Daddy', '1980-10-15'),
(2, 'Hong Nguyen', 'Mommy', '1982-10-15');

insert into user (Username, Pass,IsAdmin)
values
('admin@gmail.com','123',1),
('rxtw','123',1),
('bao123','123',1),
('a123','123',1),
('customer','123',0),
('pvn','123',0),
('nht','123',0),
('tmc','123',0),
('lvt','123',0);

insert into customer (CName, Phone_num,Sex,UserName)
values
('Nguyen Huu Trong', '0369256472', 'M','nht'),
('Phan Van Nam', '0969256463', 'F','pvn'),
('Tran Manh Cuong', '0369256472', 'M','tmc'),
('Le Van Tam', '0969256463', 'F','lvt');


insert into Item(Name_,Desciption,Listed_price,Import_price)
values
('Rice Cake','Rice Cake',30000,30000),
('Bread','Bread',12000,12000),
('Apple Cake','Apple Cake',30000,30000),
('Donut','Donut',12000,12000),
('Coca Cola', 'Coca Cola', 10000,10000),
('Pepsi', 'Pepsi', 10000,10000),
('7Up', 'Coca Cola', 10000,10000),
('Sting', 'Sting', 10000,10000);

insert into Drink (ID_item,Ice_quantity,Sweetness, Size)
values
(5, 35, 70, 10),
(6, 35, 70, 10),
(7, 35, 70, 10),
(8, 35, 70, 10);

insert into Food (ID_item,Net_weight,Expired_date, Fat_content)
values
(1, 35, 6, 30),
(2, 35, 6, 30),
(3, 35, 7, 30),
(4, 35, 7, 30);


insert into VOUCHER (Applied_price,Max_discount,Discount_percent, Start_date,End_date)
values
(500000, 1000000, 10, '2021-01-09', '2021-02-09'),
(500000, 1000000, 10, '2021-03-14', '2021-04-14'),
(1000000, 2000000, 20, '2021-04-12', '2021-06-14'),
(1000000, 2000000, 15, '2021-08-13', '2021-10-25'),
(1000000, 2000000, 15, '2021-11-13', null);

insert into branch (BName, Address,Phone_num)
values
('Chi nhanh 1', '26 Le Van Tam, Binh Hoa, Binh Duong, Viet Nam', '0381749928'),
('Chi nhanh 2', '8 Le Trong Du, Ho Chi Minh, Viet Nam', '0981747928'),
('Chi nhanh 3', '48 Nguyen Chinh Thang, Ha Noi, Viet Nam', '0981747928');


insert into Import_order(IDate,Name_partner,Phone_partner,ID_branch)
values
('2021-01-09', 'KIDO Coperation', '0381749928',1),
('2020-12-19', 'Hai Ha Coperation', '0981747928',2),
('2021-05-20', 'A Chau Coperation', '0981747928',3);


insert into Have (ID_item,ID_branch,Quantity)
values
(1,1,10),
(2,1,10),
(3,1,10),
(4,1,10),
(1,2,15),
(2,2,15),
(3,2,15),
(4,2,15),
(1,3,15),
(2,3,15),
(3,3,15),
(4,3,15);


insert into Include (ID_item,ID_import,Quantity_Item,Price_Of_Item)
values
(1,1,10,200000),
(2,1,10,200000),
(3,1,10,200000),
(4,1,10,200000),

(5,2,10,200000),
(6,2,10,200000),
(7,2,10,200000),
(8,2,10,200000),

(3,3,10,200000);

insert into Cart (ID_customer,Clerk_SSN,Create_time,voucher_ID,State)
values
(1,1, '2021-05-20',null,'D'),
(2,2, '2021-05-20',null,'D'),
(3,1, '2021-05-20',null,'D'),
(4,1, '2021-05-20',null,'D');

insert into Cart_detail (ID_item,ID_Cart,Price,quantity)
values
(1,1, 50000,5),
(2,1, 50000,5),
(3,1, 50000,5),
(4,1, 50000,5),

(1,2, 50000,5),
(2,2, 50000,5),
(3,2, 50000,5),
(4,2, 50000,5),

(1,3, 50000,5),
(2,3, 50000,5),
(3,3, 50000,5),
(4,3, 50000,5),

(1,4, 50000,5),
(2,4, 50000,5),
(3,4, 50000,5),
(4,4, 50000,5);




####################################################################		alter to add FK
ALTER TABLE PhoneNumber ADD CONSTRAINT fk_PhoneNum FOREIGN KEY (Tssn) REFERENCES Employee(SSN);

ALTER TABLE dependent ADD CONSTRAINT fk_Dependent_Essn FOREIGN KEY (Essn) REFERENCES Employee(SSN);

ALTER TABLE Employee ADD CONSTRAINT fk_Employee_Mssn FOREIGN KEY (Mssn) REFERENCES Employee(SSN);

ALTER TABLE Employee ADD CONSTRAINT fk_Employee_idB FOREIGN KEY (IdBranch) REFERENCES Branch(ID);

ALTER TABLE Employee ADD CONSTRAINT fk_Employee_User FOREIGN KEY (Username) REFERENCES rxtw.User(Username);

ALTER TABLE Customer ADD CONSTRAINT fk_Customer_User FOREIGN KEY (Username) REFERENCES rxtw.User(Username);

ALTER TABLE Have ADD CONSTRAINT fk_Have_item FOREIGN KEY (ID_item) REFERENCES item(ID);

ALTER TABLE Have ADD CONSTRAINT fk_Have_branch FOREIGN KEY (ID_branch) REFERENCES branch(ID);

ALTER TABLE import_order ADD CONSTRAINT fk_IO_branch FOREIGN KEY (ID_branch) REFERENCES branch(ID);

ALTER TABLE Include ADD CONSTRAINT fk_Include_item FOREIGN KEY (ID_item) REFERENCES item(ID);

ALTER TABLE Include ADD CONSTRAINT fk_Include_import FOREIGN KEY (ID_import) REFERENCES import_order(ID);

ALTER TABLE Cart ADD CONSTRAINT fk_Cart_customer FOREIGN KEY (ID_customer) REFERENCES customer(ID);

ALTER TABLE Cart ADD CONSTRAINT fk_Cart_clerk FOREIGN KEY (Clerk_ssn) REFERENCES Employee(Ssn);

ALTER TABLE Cart ADD CONSTRAINT fk_Cart_voucher FOREIGN KEY (voucher_id) REFERENCES Voucher(ID);

ALTER TABLE Cart_detail ADD CONSTRAINT fk_CartDetail_item FOREIGN KEY (ID_item) REFERENCES item(ID);

ALTER TABLE Cart_detail ADD CONSTRAINT fk_CartDetail_cart FOREIGN KEY (ID_Cart) REFERENCES cart(ID);

ALTER TABLE Food ADD CONSTRAINT fk_food_item FOREIGN KEY (ID_Item) REFERENCES item(ID);

ALTER TABLE Drink ADD CONSTRAINT fk_drink_item FOREIGN KEY (ID_Item) REFERENCES item(ID); 


DROP PROCEDURE IF EXISTS insertPhoneNumber;
delimiter //
create procedure insertPhoneNumber(in Tssn int,in Phone_num varchar(200))
sp: BEGIN
	declare Essn int; 
    select count(*) from (Employee) where ssn = Tssn into Essn;
	
    if Essn != 1 then
		SELECT 'Đell có thằng nhân viên nào như thế cả, nhập lại dùm tao';
        LEAVE sp;
    end if ;
	
	if char_length(Phone_num) != 10 then
		select 'Số điện thoại khác 10 số ăn loz à ???';
        LEAVE sp;
    end if ;
	select char_length(Phone_num);
	-- insert into PhoneNumber VALUES (Tssn, Phone_num);
end//
delimiter ;

call insertPhoneNumber(2, '01234567892');


-- Trigger
-- Nếu nhân viên có 1 người thân nào trên 65 tuổi thì được tăng lương 10% 
/* 
DROP TRIGGER IF EXISTS before_dependent_update;
delimiter $$
create trigger before_dependent_update
after update on dependent
for each row
begin
	if year(curdate()) - year(old.Dob)  < 65 and year(curdate()) - year(new.Dob)  > 65 then
		update Employee set Salary = Salary*1.1 where ssn = old.Essn;
    end if;
end$$
delimiter ;
*/

-- Trước khi thêm 1 nhân viên thì tạo cho họ cái tài khoản mặc định là username với pass là 123
/*
DROP TRIGGER IF EXISTS before_employee_insert;
delimiter $$
create trigger before_employee_insert
before insert on employee
for each row
begin
	insert into user value (new.Username,'123',0);
end$$
delimiter ;
*/


-- Procedure
-- Truy vấn những nhân viên, có người thân trên 65 tuổi và tên người thân đó
-- /*

-- input (in idBranch int, in isFood BOOLEAN), in ra rank theo số lượng còn lại trong kho của từng food hoặc drink, isFood = 1 -> food, isFood = 0 -> drink
DROP PROCEDURE IF EXISTS printRankItem;
delimiter //
create procedure printRankItem(in idBranch int, in isFood BOOLEAN)
printRankItem:begin
	if (idBranch not  REGEXP '^-?[0-9]+$') then
		select 'vui lòng nhập Id branch là số giùm' as 'Message';
        LEAVE printRankItem;
    end if;
	if (isFood != true and isFood != false) then
		select 'vui lòng nhập type boolean nha mai phen' as 'Message';
        LEAVE printRankItem;
    end if;
	/*
	select employee.Fname, dependent.FDname, dependent.Relationship, (year(curdate()) - year(dependent.Dob)) as 'DependentAge'
	from  employee, dependent 
	where employee.SSn = dependent.Essn and employee.SSn = InputSsn
	group by  employee.Ssn
	having DependentAge> 65;
    */

	-- food
	if (isFood = true) then 
		select	h.ID_item, h.Quantity, i.name_
        from	Have as h, Food as f, Item as i
        where	i.ID = f.ID_item and h.ID_item = i.ID and h.ID_branch = idBranch
        order by 	h.Quantity;
	-- end if;
	elseif (isFood = false) then 
		select	h.ID_item, h.Quantity, i.name_
        from	Have as h, Drink as f, Item as i
        where	i.ID = f.ID_item and h.ID_item = i.ID and h.ID_branch = idBranch
        order by 	h.Quantity;
	end if;
    
end//
delimiter ;
call printRankItem(1, true);
-- ------------------------------------------------------------------------
-- input id branch, in ra rank theo số tiền nhập hàng của các ngày từ trước nay
DROP PROCEDURE IF EXISTS printRankDay;
delimiter //
create procedure printRankDay(in idBranch int)
printRankDay:begin
	if (idBranch not  REGEXP '^-?[0-9]+$') then
		select 'vui lòng nhập Id branch là số :)' as 'Message';
        LEAVE printRankDay;
    end if;
    
	-- food
	select ID, Idate, Name_partner, ID_branch, sum(i.Quantity_Item*Price_Of_Item) as 'sum_money'
    from 	Import_order as ip, Include as i
    where	idBranch = ip.ID_branch and ip.ID = i.ID_import
    group by	ip.IDate
--     having		sum(i.Quantity_Item*Price_Of_Item) > 5000000
    order by	sum(i.Quantity_Item*Price_Of_Item) desc;
    
end//
delimiter ;
call printRankDay(1);




select * from import_order;
select * from include;

insert into Import_order(IDate,Name_partner,Phone_partner,ID_branch)
values
('2021-06-09', 'KIDO Coperation', '0381749928',1),
('2020-12-19', 'Hai Ha Coperation', '0981747928',1),
('2021-05-20', 'A Chau Coperation', '0981747928',1);

insert into Include (ID_item,ID_import,Quantity_Item,Price_Of_Item)
values
-- (1,4,10,200000),
-- (2,5,10,200000),
-- (3,4,10,200000),
-- (4,5,10,200000),

(2,6,10,700000);
-- */


-- Truy vấn tên của Branch và tổng tiền đã bỏ ra để nhập hàng và sắp xếp thấp đến cao
/*
DROP PROCEDURE IF EXISTS sumMoneyOfBranch;
delimiter //
create procedure sumMoneyOfBranch()
begin
	select BName, sum(Quantity_Item * Price_Of_Item) as 'TotalMoney'
	from Import_order, Include, branch
	where Import_order.id = Include.ID_import and Import_order.id_branch = branch.id
	group by Id_branch
	order by TotalMoney;
end//
delimiter ;
call sumMoneyOfBranch;
*/



-- Function
-- Truyền vào mã một nhân viên, đếm số tiền hóa đơn mà nhân viên đó đã làm
/*
DROP FUNCTION IF EXISTS countInvoiceOfEmployee;
DELIMITER $$
CREATE FUNCTION countInvoiceOfEmployee(
	inputSsn blob
) 
RETURNS int
DETERMINISTIC
BEGIN
	declare totalInvoices int;
	
	if (InputSsn not  REGEXP '^-?[0-9]+$') then
        return 0;
    end if;
    
    
	set totalInvoices =  (select sum(Price * Quantity) from cart, Cart_detail where cart.id = Cart_detail.ID_Cart and Clerk_SSN = inputSsn);
	return totalInvoices;
END$$
DELIMITER ;
select countInvoiceOfEmployee(2);
*/



-- /*
-- Nhập vào id chi nhanhs, id item, xuất số lượng nhập từ trước đến nay của item
DROP FUNCTION IF EXISTS countInportItem;
DELIMITER $$
CREATE FUNCTION countInportItem(
	idBranch blob,
    idItem		blob
) 
RETURNS varchar(100)
DETERMINISTIC
BEGIN
	declare nImport int;
    declare totalItem int;
    declare re int;
    declare	valBranch	int;
    declare i int;
    
	set totalItem = (select count(*) from Item where id = idItem); -- check xem có nằm trong db ko
	set valBranch = (select count(*) from Branch where Branch.id = idBranch);
	-- set nImport = (select count(*) from Include); --  số import
    set nImport = (select count(*) 
						from Include as icl, Import_order as ip 
                        where id_item = idItem and ip.ID_branch = idBranch and ID_import = ip.ID); --  số import
    
    -- return nImport;

	if (idBranch not  REGEXP '^-?[0-9]+$' OR idItem not  REGEXP '^-?[0-9]+$') then
		SIGNAL SQLSTATE '45000'
			SET MESSAGE_TEXT = 'An error occurred: type must be int';
    end if;
	if (valBranch = 0 OR totalItem = 0) then
		SIGNAL SQLSTATE '45000'
			SET MESSAGE_TEXT = 'Không tìm thấy id branch hoặc id item';
    end if;
    
    set re = 0;
    set i =0;
    
    while i < nImport do
		set re = re + (	select icl.Quantity_Item 
						from Include as icl, Import_order as ip 
                        where id_item = idItem and ip.ID_branch = idBranch and ID_import = ip.ID limit i,1);
        set i =i +1;
    end while;
    
	return re;
END$$
DELIMITER ;
select countInportItem(1,2);

-- */


-- /*

-- input id item, xuất id branch có quantity nhiều nhất
DROP FUNCTION IF EXISTS findBranchMax;
DELIMITER $$
CREATE FUNCTION findBranchMax(
	-- idBranch 	blob,
    idItem		blob
) 
RETURNS varchar(100)
DETERMINISTIC
BEGIN
	declare nImport int;
    declare totalItem int;
    declare re int;
    declare	valBranch	int;
    declare i int;
    declare chooseBranch int;
    declare	maxQuantity	int;
    
	set totalItem = (select count(*) from Item where id = idItem); -- check xem có nằm trong db ko
	-- set valBranch = (select count(*) from Branch where Branch.id = idBranch);
	-- set nImport = (select count(*) from Include); --  số import
    set maxQuantity = (select count(Quantity) 
						from	Have as h
                        where	h.ID_item = idItem
                        group by	ID_branch
                        ); --  số import
    
    -- return nImport;

	if (idItem not  REGEXP '^-?[0-9]+$') then
		SIGNAL SQLSTATE '45000'
			SET MESSAGE_TEXT = 'An error occurred: type must be int';
    end if;
	if (totalItem = 0) then
		SIGNAL SQLSTATE '45000'
			SET MESSAGE_TEXT = 'Không tìm thấy id item';
    end if;
    
    
-- 	CREATE VIEW tmp AS
-- 	select 	max(Quantity), ID_branch
-- 	from	Have as h
-- 	where	h.ID_item = 3;

	set chooseBranch = (select n.ID_branch from (
    select 	max(h.Quantity), h.ID_branch
	from	Have as h
	where	h.ID_item = 3) as n
    );
--     set chooseBranch = 4;
	return chooseBranch;
    
    set re = 0;
    set i =0;
    
    while i < nImport do
		set re = re + (	select icl.Quantity_Item 
						from Include as icl, Import_order as ip 
                        where id_item = idItem and ip.ID_branch = idBranch and ID_import = ip.ID limit i,1);
        set i =i +1;
    end while;
    
	return re;
END$$
DELIMITER ;
findBranchMax(1);

-- */


--     select 	count(*)
--     from	Import_order
--     where	ID_branch = 1
--     group by	Name_partner

CREATE VIEW tmp AS
select 	max(Quantity), ID_branch
from	Have as h
where	h.ID_item = 3;

select ID_branch from tmp

select 	max(Quantity), ID_branch
from	Have as h
where	h.ID_item = 3;
-- group by	ID_branch
-- having		max(Quantity);

SELECT MAX(items) as max_items
FROM product;

select ID_branch from tmp;

-- ======================================================================================================================			TRIGGER
-- Import 1 món hàng (kèm theo id của lần import): tăng số lượng trong kho của hàng đó,
-- /*
DROP TRIGGER IF EXISTS after_CreateInludeIp_insert;
delimiter $$
create trigger after_CreateInludeIp_insert
after insert on Include
for each row
begin
	-- insert into user value (new.Username,'123',0);
--     UPDATE class SET NO_OF_STUDENTS = NO_OF_STUDENTS +1 
--     WHERE CLASS_NO = NEW.CLASS_NO;
    --
    declare	x int;
    declare	totalItem int;
    declare IDBranch int;
    
    set x = new.Quantity_Item;
    set IDBranch = (
        select  ID_branch
		from    Import_order as ip
		where   new.ID_import = ip.ID);
    
	set totalItem = (select count(*) from Have where ID_Item = new.ID_item); -- check xem có nằm trong db ko
    if (totalItem = 0) then
		insert into Have (ID_item,ID_branch,Quantity)
		values (new.ID_item, IDBranch ,new.Quantity_Item);
    else 
		UPDATE  rxtw.have 
		SET     have.Quantity = have.Quantity + x
		WHERE   have.ID_item = new.ID_item and ID_branch = IDBranch;
	end if;
--     (
--     select  ID_branch
--     from    Import_order as ip
--     where   new.ID_import = ip.ID
--     );
end$$
delimiter ;
-- */



insert into Include (ID_item,ID_import,Quantity_Item,Price_Of_Item)
values (8,4,15,200000);
SELECT * FROM rxtw.have;

-- 	"Luan" là đối tác VIP.
-- 	Khi nhập hàng của Luan vào tháng 12, auto tạo 1 voucher có:
-- 	apply_price là 500k, max_discount = 1tr, dis_percent = 10%; 
-- 	startdate: 24/12, end date: 25/12
-- 	(nếu trùng startdate và enddate của 1 voucher khác thì không cần tạo)

DROP TRIGGER IF EXISTS after_CreateVoucher_insert;
delimiter $$
create trigger after_CreateVoucher_insert
after insert on Import_order
for each row
cv:begin
	-- insert into user value (new.Username,'123',0);
--     UPDATE class SET NO_OF_STUDENTS = NO_OF_STUDENTS +1 
--     WHERE CLASS_NO = NEW.CLASS_NO;
    --
    declare	monthIP int;
    declare	dayIP int;
    declare	yearIP int;
    declare	totalItem int;
    declare IDBranch int;
    
    set monthIP = MONTH(new.IDate);
    set dayIP = DAY(new.IDate);
    set yearIP = YEAR(new.IDate);

	set totalItem = (
        select  count(*) from Voucher
        where   DAY(Start_date) = 24 and MONTH(Start_date) = 12 and YEAR(Start_date) = YEAR(CURDATE()));

    if (totalItem > 0 or dayIP > 20 or monthIP <> 12 or yearIP <> YEAR(CURDATE()) or new.Name_partner <> 'luan') then
        LEAVE cv;
    else 
        insert into VOUCHER (Applied_price,Max_discount,Discount_percent, Start_date,End_date)
        values
        (100000, 1000000, 10, '2021-12-24', '2021-12-25');
	end if;


end$$
delimiter ;
-- */
insert into Import_order(IDate,Name_partner,Phone_partner,ID_branch)
values
('2021-12-01', 'luan', '0381749928',1);

select * from VOUCHER;