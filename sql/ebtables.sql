CREATE TABLE IF NOT EXISTS login (
  user_name varchar(32),
  u_id int auto_increment NOT NULL,
  md5_pw1 varchar(32),
  pw2 varchar(32),
  facial_user_TID varchar(32),
  PRIMARY KEY (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS login_records (
  time timestamp,
  user_name varchar(32),
  u_id varchar(32),
  login_method varchar(32),
  success boolean
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS account (
  acc_type varchar(32),
  min_balance float,
  mgt_fee float,
  interbank_trans_fee float,
  PRIMARY KEY (acc_type)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
CREATE TABLE IF NOT EXISTS user_acct (
acct_no char(12),
u_id int,
acct_type varchar(32),
balance float,
PRIMARY KEY (acct_no),
FOREIGN KEY (u_id) REFERENCES login (u_id),
FOREIGN KEY (acct_type) REFERENCES account (acc_type)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS customer (
first_name varchar(32),
last_name varchar(32),
gender char(12),
title char(12),
dob date,
u_id int,
FOREIGN KEY (u_id) REFERENCES login (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS transactions (
  transaction_id int auto_increment,
  tt_id integer,
  t_timestamp timestamp,
  account_1_num char(12),
  account_2_num char(12),
  transaction_type varchar(32),
  amount float,
  t_status varchar(32),
  remarks varchar(500),
  t_fees float,
  current_balance float,
  t_interbank boolean,
  PRIMARY KEY (transaction_id),
--  FOREIGN KEY (tt_id) REFERENCES timed_transfer,
  FOREIGN KEY (account_1_num) REFERENCES user_acct(acct_no)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS timed_transfers (
  t_id int auto_increment NOT NULL,
  t_type varchar(32),
  from_account char(12),
  to_account char(12),
  t_amount float,
  starting_time timestamp,
  t_interval varchar(32),
  interbank boolean,
  remark varchar(500),
  active boolean,
  PRIMARY KEY (t_id),
  FOREIGN KEY (from_account) REFERENCES user_acct(acct_no),
  FOREIGN KEY (to_account) REFERENCES user_acct(acct_no)

  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS transaction_check (
  check_time timestamp,
  total_in float,
  total_out float,
  actual_amount float,
  check_ok boolean
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;






  
CREATE TABLE IF NOT EXISTS interest(
  acc_type varchar(32),
  rate float,
  interbank_trans_fee float,
  FOREIGN KEY (acc_type) REFERENCES account(acc_type)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  

CREATE TABLE IF NOT EXISTS addresses(
  address varchar(600),
  u_id int,
  date_add_info date,
  status varchar(32),
  FOREIGN KEY (u_id) REFERENCES login(u_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
CREATE TABLE IF NOT EXISTS contact_info(
  contact varchar(100),
  info_type varchar(100),
  u_id int,
  date_contact_info date,
  status varchar(32),
  FOREIGN KEY (u_id) REFERENCES login(u_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE IF NOT EXISTS Prime_Rate(
  eff_date date,
  HS_prime_rate  float
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS HIBOR(
  tenor varchar(32),
  interest  float
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS HKD_savings_deposit(
  acct_balance varchar(32),
  rate  float
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS time_deposits(
  tenor varchar(32),
  interest_rate  varchar(32),
  tenK_to_99K float,
  hundredK_to_499K float,
  fivehundredK_to_999K float,
  above1000K float
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS loans_clerk(
  staff_id int auto_increment,
  staff_name varchar(32),
  branch_code varchar(32),
  primary key (staff_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS loans(
  loan_id int,
  title varchar(4),
  address varchar(600),
  tel_no varchar(12),
  mobile varchar(12),
  e_mail varchar(100), 
  clerk_id int,
  u_id int,
  FOREIGN KEY (clerk_id) REFERENCES loans_clerk(staff_id),
   FOREIGN KEY (u_id) REFERENCES login(u_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO loans_clerk(staff_name, branch_code)
  VALUES('Bob Wong', 'MK Kln'),
  ('John Lee', 'TST Kln'),
  ('Anna Chan', 'CT HK'),
  ('Denise Cheung', 'ST NT');


INSERT INTO Prime_Rate(eff_date , HS_prime_rate)
VALUES ('2014-1-1', 0.05),('2013-1-1', 0.06), ('2012-1-1', 0.055);
INSERT INTO HIBOR(tenor, interest)
VALUES ('overnight', 0.005),('1 week', 0.002), ('1 month', 0.001);
INSERT INTO HKD_savings_deposit(acct_balance, rate)
VALUES ('Below $5000 HKD', 0.000),('$5000 - 149999 HKD', 0.001), ('Above $150000 HKD', 0.002);
INSERT INTO time_deposits(tenor,  interest_rate,  tenK_to_99K,  hundredK_to_499K,  fivehundredK_to_999K,  above1000K)
VALUES ('1 week', 'broad rate', 0.001,0.001,0.001,0.001), ('1 week', 'e-deposit rate', 0.001,0.001,0.001,0.001),
('1 month', 'broad rate', 0.001,0.001,0.001,0.001), ('1 month', 'e-deposit rate', 0.001,0.001,0.001,0.001),
('6 months', 'broad rate', 0.005,0.005,0.005,0.005),('6 months', 'e-deposit rate', 0.005,0.005,0.005,0.005),
('12 months', 'broad rate', 0.015,0.015,0.015,0.015),('6 months', 'e-deposit rate', 0.015,0.015,0.015,0.015),
('24 months', 'broad rate', 0.025,0.025,0.025,0.025),('24 months', 'e-deposit rate', 0.025,0.025,0.025,0.025);
