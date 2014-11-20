INSERT INTO login (user_name,  md5_pw1,    pw2)

           VALUES ('rob', MD5('qwe'), 'qwertyui'),
			('cust1', MD5('qwe'), 'qwertyui'),
			('cust2', MD5('qwe'), 'qwertyui'),
			('cust3', MD5('qwe'), 'qwertyui'),
			('cust4', MD5('qwe'), 'qwertyui');

INSERT INTO account (acc_type, min_balance, mgt_fee, interbank_trans_fee)
VALUES('saving account',1000,10,100),
      ('current account', 500, 10, 50);
			
INSERT INTO user_acct(acct_no, u_id, acct_type, balance)
	VALUES ('123456789000', '1', 'current account',6000),
	('234567890000', '1', 'saving account',800000),
	('12345678901', '2', 'current account',5000),
	('234567890001', '2', 'saving account',7000),
	('12345678902', '3', 'current account',3000),
    ('23456789002', '3', 'saving account',10000),
	('12345678903', '4', 'current account',2000),
    ('23456789003', '4', 'saving account',9000),
	('12345678904', '5', 'current account',4000),
    ('23456789004', '5', 'saving account',9000);

INSERT INTO customer(first_name, last_name, u_id, gender, dob, title)
	VALUES ('Robert', 'Parcus', '1', 'male', '1990-03-25', 'Mr'),
	('Carl', 'Tam', '2', 'male','1984-01-01', 'Mr'),
    ('Juan Juan', 'Lyu', '3', 'female', '1952-07-19', 'Ms'),
    ('Sandy', 'Chen', '4', 'female', '1999-01-01', 'Ms'),
    ('Smart', 'Luo', '5', 'male', '1990-03-25', 'Mr');

INSERT INTO addresses (address, u_id, date_add_info, status) 
     VALUES ('Some where in Brazil', '1', '2000-10-29', 'passive'),	
            ('Some where in Italy', '1', '2010-05-13', 'passive'),	
            ('Some where in Hong Kong', '1', '2014-08-20', 'active'),	
            ('Some where in Hong Kong', '2', '1999-04-20', 'active'),	
            ('Some where in Beijing', '3', '2011-06-15', 'passive'),	
            ('Some where in Guangdong', '3', '2014-03-08', 'passive'),	
            ('Some where in Hong Kong', '3', '2014-08-26', 'active'),	
            ('Some where in Hong Kong', '4', '2014-08-20', 'active'),	
            ('Some where in Hong Kong', '5', '2014-08-20', 'active');

INSERT INTO contact_info (contact, info_type, u_id, date_contact_info, status) 
     VALUES ('betoparcus@gmail.com', 'email', '1', '2000-10-29', 'active'),	
            ('juan2lv@gmail.com', 'email', '3', '2011-06-15', 'active'),	
            ('1234@gmail.com', 'email', '2', '2014-08-20', 'active'),	
            ('2234@gmail.com', 'email', '4', '2014-08-20', 'active'),
            ('3234@gmail.com', 'email', '5', '2014-08-20', 'active'),
            ('12345678', 'phone', '1', '2014-08-20', 'active'),
            ('12345678', 'phone', '2', '2014-08-20', 'active'),
            ('12345678', 'phone', '3', '2014-08-20', 'active'),
            ('12345678', 'phone', '4', '2014-08-20', 'active'),
            ('12345678', 'phone', '5', '2014-08-20', 'active');
          
INSERT INTO transaction_check (total_in, total_out, actual_amount, check_ok)
     SELECT 0, 0, SUM(balance), 1 FROM user_acct;
