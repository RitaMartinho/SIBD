--
-- File generated with SQLiteStudio v3.2.1 on Sun Dec 15 14:55:49 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: account
CREATE TABLE account (account_id INTEGER PRIMARY KEY AUTOINCREMENT, balance INTEGER, type TEXT, account_client INTEGER NOT NULL REFERENCES client (client_id) ON DELETE CASCADE);
INSERT INTO account (account_id, balance, type, account_client) VALUES (1, 300, 'term', 25);
INSERT INTO account (account_id, balance, type, account_client) VALUES (2, -40, 'current', 26);
INSERT INTO account (account_id, balance, type, account_client) VALUES (3, 10001, 'current', 27);
INSERT INTO account (account_id, balance, type, account_client) VALUES (4, 1224, 'term', 28);
INSERT INTO account (account_id, balance, type, account_client) VALUES (5, 140, 'term', 29);
INSERT INTO account (account_id, balance, type, account_client) VALUES (6, 2040, 'current', 30);
INSERT INTO account (account_id, balance, type, account_client) VALUES (7, 16, 'term', 31);
INSERT INTO account (account_id, balance, type, account_client) VALUES (8, -1000, 'current', 32);
INSERT INTO account (account_id, balance, type, account_client) VALUES (9, 12243, 'current', 33);
INSERT INTO account (account_id, balance, type, account_client) VALUES (10, 23, 'current', 34);
INSERT INTO account (account_id, balance, type, account_client) VALUES (11, 2300, 'term', 35);
INSERT INTO account (account_id, balance, type, account_client) VALUES (12, 4567, 'term', 36);
INSERT INTO account (account_id, balance, type, account_client) VALUES (13, 1346, 'current', 37);
INSERT INTO account (account_id, balance, type, account_client) VALUES (14, 900, 'term', 38);
INSERT INTO account (account_id, balance, type, account_client) VALUES (15, 1268, 'current', 39);
INSERT INTO account (account_id, balance, type, account_client) VALUES (16, -54, 'current', 40);
INSERT INTO account (account_id, balance, type, account_client) VALUES (17, 134, 'current', 41);
INSERT INTO account (account_id, balance, type, account_client) VALUES (18, 9654, 'term', 42);
INSERT INTO account (account_id, balance, type, account_client) VALUES (19, 1908, 'term', 43);
INSERT INTO account (account_id, balance, type, account_client) VALUES (20, 560, 'current', 44);
INSERT INTO account (account_id, balance, type, account_client) VALUES (21, -5, 'term', 45);
INSERT INTO account (account_id, balance, type, account_client) VALUES (22, 890, 'current', 46);
INSERT INTO account (account_id, balance, type, account_client) VALUES (23, 1600, 'term', 47);
INSERT INTO account (account_id, balance, type, account_client) VALUES (24, 3456, 'current', 48);
INSERT INTO account (account_id, balance, type, account_client) VALUES (25, 8777, 'current', 49);
INSERT INTO account (account_id, balance, type, account_client) VALUES (26, 12000, 'term', 50);

-- Table: appointment
CREATE TABLE appointment (appointment_id INTEGER PRIMARY KEY AUTOINCREMENT, start_time TEXT, end_time TEXT, room INTEGER REFERENCES room (room_id) ON DELETE NO ACTION, client_1 INTEGER REFERENCES client (client_id) ON DELETE NO ACTION NOT NULL, client_2 INTEGER REFERENCES client (client_id) ON DELETE NO ACTION, CONSTRAINT correct_time CHECK (strftime('%s', end_time) > strftime('%s', start_time)));
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (1, '2018/09/27 15:30', '2018/09/27 16:00', 26, 45, 43);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (2, '2018/07/01 12:35', '2018/07/01 13:05', 23, 44, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (3, '2018/04/19 10:00', '2018/04/19 10:30', 8, 34, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (4, '2018/05/24 11:05', '2018/05/24 11:35', 1, 27, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (5, '2018/03/15 14:10', '2018/03/15 14:40', 5, 25, 32);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (6, '2019/02/03 18:30', '2019/02/03 19:00', 9, 34, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (7, '2019/07/08 15:15', '2019/07/08 15:45', 14, 40, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (8, '2018/01/01 09:00', '2018/01/01 09:30', 25, 45, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (9, '2019/06/14 09:30', '2019/06/14 10:00', 7, 37, 33);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (10, '2019/08/08 13:25', '2019/08/08 13:55', 27, 50, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (11, '2018/05/26 16:00', '2018/05/26 16:30', 3, 29, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (12, '2019/09/15 17:30', '2019/09/15 18:00', 4, 31, 29);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (13, '2018/11/14 15:45', '2018/11/14 16:15', 24, 44, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (14, '2019/11/29 14:00', '2019/11/29 14:30', 10, 37, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (15, '2018/10/19 16:45', '2018/10/19 17:15', 19, 48, 50);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (16, '2019/05/19 15:00', '2019/05/19 15:30', 1, 31, NULL);
INSERT INTO appointment (appointment_id, start_time, end_time, room, client_1, client_2) VALUES (17, '2019/05/19 15:30', '2019/05/19 16:00', 1, 31, NULL);

-- Table: branch
CREATE TABLE branch (

    branch_id INTEGER PRIMARY KEY AUTOINCREMENT,
    address TEXT
   -- n_employees INTEGER, 
   -- n_clients INTEGER,
   --n_rooms INTEGER
);
INSERT INTO branch (branch_id, address) VALUES (1, '74 Belmont Ave, Belleville, New Jersey');
INSERT INTO branch (branch_id, address) VALUES (2, '258 N 7th St, Newark');
INSERT INTO branch (branch_id, address) VALUES (3, '9821 State Rte 1019, Kempton');
INSERT INTO branch (branch_id, address) VALUES (4, '118 Belmont Ave, Belleville');
INSERT INTO branch (branch_id, address) VALUES (5, '215 Alienta Ln, Ladera Ranch, California');

-- Table: card
CREATE TABLE card (card_id INTEGER PRIMARY KEY AUTOINCREMENT, expiry_date DATE, cvv INTEGER, associated_account INTEGER NOT NULL REFERENCES account (account_id) ON DELETE CASCADE, type_of_card INTEGER REFERENCES typeOfCard (card_type_id) ON DELETE CASCADE);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (1, '2020-02-08', 659, 1, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (2, '2020-06-07', 614, 2, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (3, '2020-10-25', 861, 3, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (4, '2021-02-27', 408, 4, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (5, '2021-10-17', 386, 5, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (6, '2022-01-15', 257, 6, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (7, '2022-04-23', 220, 7, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (8, '2022-05-14', 421, 8, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (9, '2022-05-29', 188, 9, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (10, '2023-01-08', 243, 10, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (11, '2023-03-18', 443, 11, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (12, '2024-01-07', 269, 12, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (13, '2024-08-10', 953, 13, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (14, '2024-11-24', 747, 14, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (15, '2025-01-19', 782, 15, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (16, '2025-08-23', 648, 16, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (17, '2026-05-02', 249, 17, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (18, '2027-06-13', 597, 18, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (19, '2028-08-27', 119, 19, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (20, '2029-06-23', 254, 20, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (21, '2029-07-14', 633, 21, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (22, '2029-08-19', 298, 22, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (23, '2030-03-24', 920, 23, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (24, '2030-08-18', 545, 24, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (25, '2030-08-25', 273, 25, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (26, '2029-05-10', 115, 26, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (27, '2020-08-02', 750, 19, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (28, '2020-10-24', 182, 24, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (29, '2021-01-10', 609, 4, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (30, '2021-07-04', 962, 7, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (31, '2021-07-18', 121, 12, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (32, '2022-01-22', 812, 20, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (33, '2022-08-21', 888, 20, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (34, '2023-01-07', 788, 14, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (35, '2024-03-30', 475, 17, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (36, '2024-07-20', 588, 3, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (37, '2024-07-21', 326, 4, 1);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (38, '2025-01-12', 601, 8, 2);
INSERT INTO card (card_id, expiry_date, cvv, associated_account, type_of_card) VALUES (39, '2025-02-02', 460, 11, 1);

-- Table: client
CREATE TABLE client (client_id INTEGER PRIMARY KEY REFERENCES person (person_id) ON DELETE CASCADE, birthdate TEXT, tax_id NUMERIC, client_branch INTEGER REFERENCES branch (branch_id) ON DELETE NO ACTION);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (25, '1972-03-07', NULL, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (26, '1972-09-15', 602188, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (27, '1972-11-28', 888262, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (28, '1973-10-04', 44345, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (29, '1974-05-11', 109581, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (30, '1974-08-20', 244932, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (31, '1974-11-17', 222990, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (32, '1976-05-23', 623881, 1);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (33, '1976-07-27', 806009, 2);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (34, '1976-08-30', 304878, 2);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (35, '1979-04-08', 422472, 2);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (36, '1980-03-27', NULL, 2);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (37, '1980-04-10', NULL, 2);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (38, '1981-05-02', NULL, 3);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (39, '1981-05-29', 264809, 3);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (40, '1982-11-24', 536539, 3);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (41, '1987-04-24', 437596, 3);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (42, '1989-08-15', 819672, 3);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (43, '1992-09-24', 422370, 5);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (44, '1993-05-09', 489986, 5);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (45, '1997-07-15', 447849, 5);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (46, '1997-08-03', 351855, 4);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (47, '2000-11-30', 966352, 4);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (48, '2001-02-09', 217549, 4);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (49, '2001-11-06', NULL, 4);
INSERT INTO client (client_id, birthdate, tax_id, client_branch) VALUES (50, '1998-04-19', NULL, 4);

-- Table: employee
CREATE TABLE employee (employee_id INTEGER PRIMARY KEY REFERENCES person (person_id) ON DELETE CASCADE, phone_number INTEGER, employee_branch_id INTEGER NOT NULL REFERENCES branch (branch_id) ON DELETE NO ACTION ON UPDATE NO ACTION, employee_room_id INTEGER REFERENCES room (room_id) ON DELETE SET NULL ON UPDATE NO ACTION);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (1, '202-555-0234', 1, 1);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (2, '202-555-0115', 1, 2);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (3, '202-555-0124', 1, 3);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (4, '202-555-0173', 1, 4);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (5, '202-555-0186', 1, 5);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (6, '202-555-0155', 2, 7);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (7, '202-555-0146', 2, 8);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (8, '202-555-0195', 2, 9);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (9, NULL, 2, 10);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (10, NULL, 3, 11);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (11, '202-555-0146', 3, 12);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (12, '202-555-0195', 3, 13);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (13, '202-555-0167', 3, 14);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (14, '202-555-0133', 3, 15);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (15, NULL, 4, 16);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (16, NULL, 4, 17);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (17, '202-555-0171', 4, 18);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (18, '202-555-0106', 4, 19);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (19, NULL, 4, 20);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (20, NULL, 5, 23);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (21, '202-555-0133', 5, 24);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (22, '202-555-0136', 5, 25);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (23, '202-555-0190', 5, 26);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (24, '202-555-0116', 5, 27);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (64, 123, 4, 21);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (65, 123, 4, 21);

-- Table: insurance
CREATE TABLE insurance(

    insurance_id INTEGER PRIMARY KEY AUTOINCREMENT,
    insurance_name text
);
INSERT INTO insurance (insurance_id, insurance_name) VALUES (1, '10% on accident insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (2, '20% on home insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (3, '1 year free life insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (4, '5% on total permanent disability insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (5, '6 months free pension insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (6, '50% on dental health insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (7, '15% on kidnap and ransom insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (8, '2 years free labor insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (9, '4 months free legal expenses insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (10, '35% on boiler insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (11, '1 month free property insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (12, '1 year free shipping insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (13, '7 months free terrorism insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (14, '25% on trade credit insurance');
INSERT INTO insurance (insurance_id, insurance_name) VALUES (15, '1 year free war risk insurance');

-- Table: insurer
CREATE TABLE insurer(

    insurer_id INTEGER PRIMARY KEY AUTOINCREMENT,
    insurer_name text
);
INSERT INTO insurer (insurer_id, insurer_name) VALUES (1, 'Allianz');
INSERT INTO insurer (insurer_id, insurer_name) VALUES (2, 'HealthPartners');
INSERT INTO insurer (insurer_id, insurer_name) VALUES (3, 'American Family Insurance');
INSERT INTO insurer (insurer_id, insurer_name) VALUES (4, 'Liberty');
INSERT INTO insurer (insurer_id, insurer_name) VALUES (5, 'CareSource');
INSERT INTO insurer (insurer_id, insurer_name) VALUES (6, '21st Century');

-- Table: offers
CREATE TABLE offers (insurer_id INTEGER REFERENCES insurer (insurer_id) ON DELETE CASCADE NOT NULL, insurance_id INTEGER REFERENCES insurance (insurance_id) ON DELETE CASCADE NOT NULL, card_type_id INTEGER REFERENCES typeOfCard (card_type_id) ON DELETE CASCADE NOT NULL, PRIMARY KEY (insurer_id, insurance_id, card_type_id));
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (5, 1, 1);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (2, 4, 1);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (5, 7, 1);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (4, 14, 1);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (3, 10, 1);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (6, 2, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (2, 3, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (1, 5, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (2, 6, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (3, 8, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (4, 9, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (6, 11, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (1, 12, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (5, 13, 2);
INSERT INTO offers (insurer_id, insurance_id, card_type_id) VALUES (3, 15, 2);

-- Table: person
CREATE TABLE person (person_id INTEGER PRIMARY KEY ASC AUTOINCREMENT, first_name TEXT, last_name TEXT, address TEXT, username TEXT, password TEXT, admin BOOLEAN);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (1, 'Theresa', 'Campbell', '27 St Express', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (2, 'Robert', 'Dickens', '3677  Quarry Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (3, 'Nicola', 'Russell', '317  Meadow Lane', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (4, 'Felicity', 'Tucker', '4066  Oakway Lane', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (5, 'Wanda', 'Miller', '1736  Broadcast Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (6, 'Natalie', 'Jones', '3390  Elliott Street', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (7, 'Lauren', 'Skinner', '3862  Johnson Street', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (8, 'Paul', 'Campbell', '424  Coulter Lane', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (9, 'Lauren', 'Lee', '460  Willow Greene Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (10, 'Harry', 'Butler', '5004  Tully Street', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (11, 'Megan', 'Wilkins', '1602  James Martin Circle', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (12, 'Paul', 'Harris', '1333  Sigley Road', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (13, 'Kimberly', 'Mackenzie', NULL, NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (14, 'Stephanie', 'Stewart', '1173  Nicholas Street', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (15, 'Felicity', 'Gray', NULL, NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (16, 'Keith', 'Allan', '1458  Michigan Avenue', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (17, 'Dorothy', 'MacDonald', '3053  Hampton Meadows', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (18, 'Dan', 'Peters', '4249  Hewes Avenue', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (19, 'Emma', 'Lambert', '1903  Young Road', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (20, 'Christopher', 'Paterson', '1209  Franklin Avenue', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (21, 'Boris', 'Simpson', '2567  Arron Smith Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (22, 'Ruth', 'Walker', '2867  Chardonnay Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (23, 'Owen', 'Vance', NULL, NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (24, 'Julian', 'Miller', '634  Kessla Way', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (25, 'Charles', 'Newman', '565  Nixon Avenue', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (26, 'Una', 'Langdon', '4537  Virginia Street', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (27, 'Joanne', 'Oliver', '1743  Cantebury Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (28, 'Fiona', 'North', '2990  Poe Road', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (29, 'Felicity', 'Tucker', '1868  Oakmound Road', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (30, 'Wanda', 'Miller', NULL, NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (31, 'Natalie', 'Jones', '644  Jennifer Lane', 'nata', NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (32, 'Lauren', 'Skinner', '2931  Mcwhorter Road', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (33, 'Paul', 'Campbell', '3086  Freshour Circle', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (34, 'Lauren', 'Lee', '1998  Sunrise Road', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (35, 'Harry', 'Butler', '3227  Spadafore Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (36, 'Megan', 'Wilkins', '3971  Poplar Lane', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (37, 'Paul', 'Harris', '2709  Scheuvront Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (38, 'Kimberly', 'Mackenzie', '996  Creekside Lane', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (39, 'Stephanie', 'Stewart', '4576  Broadway Avenue', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (40, 'Edward', 'Ogden', '1222  Grant View Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (41, 'William', 'Hemmings', '3013  Reeves Street', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (42, 'Heather', 'Slater', '1111  Levy Court', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (43, 'Liam', 'Black', '61  Ray Court', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (44, 'Leonard', 'Greene', '4809  Joseph Street', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (45, 'Cameron', 'Abraham', NULL, NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (46, 'Ava', 'Burgess', '372  Catherine Drive', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (47, 'Max', 'Nash', '4688  Roane Avenue', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (48, 'Alexandra', 'Mitchell', '1622  Saint Marys Avenue', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (49, 'Audrey', 'Jackson', '3503  Douglas Dairy Road', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (50, 'Dylan', 'Knox', NULL, NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (51, 'Admin', 'Admin', 'Admin place', 'admin', 'adminspace', 1);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (64, 'rita', 'martinho', 'odf', NULL, NULL, 0);
INSERT INTO person (person_id, first_name, last_name, address, username, password, admin) VALUES (65, 'rita', 'martinho', 'odf', NULL, NULL, 0);

-- Table: rating
CREATE TABLE rating (client_1 INTEGER REFERENCES client (client_id) NOT NULL, appointment INTEGER REFERENCES appointment (appointment_id) NOT NULL, rating_score INTEGER NOT NULL, client_2 INTEGER REFERENCES client (client_id), rating_score_2 CHECK (0 <= rating_score_2 <= 10), PRIMARY KEY (client_1, appointment, client_2), CONSTRAINT correct_range CHECK (0 <= rating_score <= 10));
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (45, 1, 7, 43, 8);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (44, 2, 6, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (34, 3, 9, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (27, 4, 8, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (25, 5, 4, 32, 5);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (34, 6, 3, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (40, 7, 7, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (45, 8, 8, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (37, 9, 6, 33, 7);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (50, 10, 9, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (29, 11, 10, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (31, 12, 5, 29, 8);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (44, 13, 1, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (37, 14, 2, NULL, NULL);
INSERT INTO rating (client_1, appointment, rating_score, client_2, rating_score_2) VALUES (48, 15, 8, 50, 7);

-- Table: relationship
CREATE TABLE relationship (chief_id INTEGER REFERENCES employee (employee_id));
INSERT INTO relationship (chief_id) VALUES (5);
INSERT INTO relationship (chief_id) VALUES (24);
INSERT INTO relationship (chief_id) VALUES (19);
INSERT INTO relationship (chief_id) VALUES (12);
INSERT INTO relationship (chief_id) VALUES (8);

-- Table: room
CREATE TABLE room (room_id INTEGER PRIMARY KEY AUTOINCREMENT, room_branch INTEGER NOT NULL REFERENCES branch (branch_id) ON DELETE CASCADE);
INSERT INTO room (room_id, room_branch) VALUES (1, 1);
INSERT INTO room (room_id, room_branch) VALUES (2, 1);
INSERT INTO room (room_id, room_branch) VALUES (3, 1);
INSERT INTO room (room_id, room_branch) VALUES (4, 1);
INSERT INTO room (room_id, room_branch) VALUES (5, 1);
INSERT INTO room (room_id, room_branch) VALUES (6, 1);
INSERT INTO room (room_id, room_branch) VALUES (7, 2);
INSERT INTO room (room_id, room_branch) VALUES (8, 2);
INSERT INTO room (room_id, room_branch) VALUES (9, 2);
INSERT INTO room (room_id, room_branch) VALUES (10, 2);
INSERT INTO room (room_id, room_branch) VALUES (11, 3);
INSERT INTO room (room_id, room_branch) VALUES (12, 3);
INSERT INTO room (room_id, room_branch) VALUES (13, 3);
INSERT INTO room (room_id, room_branch) VALUES (14, 3);
INSERT INTO room (room_id, room_branch) VALUES (15, 3);
INSERT INTO room (room_id, room_branch) VALUES (16, 4);
INSERT INTO room (room_id, room_branch) VALUES (17, 4);
INSERT INTO room (room_id, room_branch) VALUES (18, 4);
INSERT INTO room (room_id, room_branch) VALUES (19, 4);
INSERT INTO room (room_id, room_branch) VALUES (20, 4);
INSERT INTO room (room_id, room_branch) VALUES (21, 4);
INSERT INTO room (room_id, room_branch) VALUES (22, 4);
INSERT INTO room (room_id, room_branch) VALUES (23, 5);
INSERT INTO room (room_id, room_branch) VALUES (24, 5);
INSERT INTO room (room_id, room_branch) VALUES (25, 5);
INSERT INTO room (room_id, room_branch) VALUES (26, 5);
INSERT INTO room (room_id, room_branch) VALUES (27, 5);

-- Table: trans
CREATE TABLE trans (transaction_id INTEGER PRIMARY KEY AUTOINCREMENT, money_exchanged INTEGER, origin_account_id INTEGER NOT NULL REFERENCES account, destiny_account_id INTEGER REFERENCES account, CONSTRAINT TransNotToSelf CHECK (destiny_account_id != origin_account_id));
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (1, 122, 1, 24);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (2, 140, 5, 16);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (3, 45, 4, 6);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (4, 78, 7, 20);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (5, 24, 13, NULL);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (6, 1111, 14, 17);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (7, 500, 2, 22);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (8, 63, 6, 5);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (9, 1, 8, 18);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (10, 70, 12, NULL);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (11, 200, 3, 25);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (12, 876, 7, 26);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (13, 1700, 9, 1);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (14, 12, 2, 4);
INSERT INTO trans (transaction_id, money_exchanged, origin_account_id, destiny_account_id) VALUES (15, 60, 5, 15);

-- Table: typeOfCard
CREATE TABLE typeOfCard(

    card_type_id INTEGER PRIMARY KEY AUTOINCREMENT,
    card_type TEXT
);
INSERT INTO typeOfCard (card_type_id, card_type) VALUES (1, 'debit');
INSERT INTO typeOfCard (card_type_id, card_type) VALUES (2, 'credit');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
