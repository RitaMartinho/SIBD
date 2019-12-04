--
-- File generated with SQLiteStudio v3.2.1 on terça dez 3 21:10:46 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: account
DROP TABLE IF EXISTS account;
CREATE TABLE account (account_id INTEGER PRIMARY KEY AUTOINCREMENT, balance INTEGER, type TEXT, account_client INTEGER NOT NULL REFERENCES client);
INSERT INTO account (account_id, balance, type, account_client) VALUES (1, 300, 'term', 25);

-- Table: appointment
DROP TABLE IF EXISTS appointment;
CREATE TABLE appointment (

    appointment_id INTEGER PRIMARY KEY AUTOINCREMENT,
    --date TEXT,
    start_time TEXT,
    end_time TEXT,
    client INTEGER REFERENCES client,
    room INTEGER REFERENCES room,
    CONSTRAINT correct_time CHECK (strftime('%s', end_time)> strftime('%s', start_time))
);

-- Table: branch
DROP TABLE IF EXISTS branch;
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
DROP TABLE IF EXISTS card;
CREATE TABLE card(

    card_id INTEGER PRIMARY KEY AUTOINCREMENT,
    expiry_date DATE,
    cvv INTEGER, 
    associated_account INTEGER NOT NULL REFERENCES account,
    type_of_card INTEGER REFERENCES typeOfCard
);

-- Table: client
DROP TABLE IF EXISTS client;
CREATE TABLE client(

    client_id INTEGER PRIMARY KEY REFERENCES person,
    birthdate TEXT, -- there's no date in sqlite
    tax_id NUMERIC,
   -- age INTEGER, -- HOW DO I DO THIS - A: PHP 
    client_branch INTEGER REFERENCES branch
);
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
DROP TABLE IF EXISTS employee;
CREATE TABLE employee(

    employee_id INTEGER PRIMARY KEY REFERENCES person,
    phone_number INTEGER,
    employee_branch_id INTEGER NOT NULL REFERENCES branch
        ON DELETE SET NULL ON UPDATE CASCADE,
    employee_room_id INTEGER REFERENCES room
        ON DELETE SET NULL ON UPDATE CASCADE
);
INSERT INTO employee (employee_id, phone_number, employee_branch_id, employee_room_id) VALUES (1, '202-555-0129', 1, 1);
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

-- Table: insurance
DROP TABLE IF EXISTS insurance;
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
DROP TABLE IF EXISTS insurer;
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
DROP TABLE IF EXISTS offers;
CREATE TABLE offers (insurer_id INTEGER REFERENCES insurer NOT NULL, insurance_id INTEGER REFERENCES insurance NOT NULL, card_type_id INTEGER REFERENCES typeOfCard NOT NULL, PRIMARY KEY (insurer_id, insurance_id, card_type_id));
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
DROP TABLE IF EXISTS person;
CREATE TABLE person (person_id INTEGER PRIMARY KEY AUTOINCREMENT, first_name TEXT, last_name TEXT, address TEXT);
INSERT INTO person (person_id, first_name, last_name, address) VALUES (1, 'Theresa', 'Campbell', '2805  Harley Vincent Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (2, 'Robert', 'Dickens', '3677  Quarry Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (3, 'Nicola', 'Russell', '317  Meadow Lane');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (4, 'Felicity', 'Tucker', '4066  Oakway Lane');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (5, 'Wanda', 'Miller', '1736  Broadcast Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (6, 'Natalie', 'Jones', '3390  Elliott Street');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (7, 'Lauren', 'Skinner', '3862  Johnson Street');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (8, 'Paul', 'Campbell', '424  Coulter Lane');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (9, 'Lauren', 'Lee', '460  Willow Greene Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (10, 'Harry', 'Butler', '5004  Tully Street');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (11, 'Megan', 'Wilkins', '1602  James Martin Circle');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (12, 'Paul', 'Harris', '1333  Sigley Road');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (13, 'Kimberly', 'Mackenzie', NULL);
INSERT INTO person (person_id, first_name, last_name, address) VALUES (14, 'Stephanie', 'Stewart', '1173  Nicholas Street');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (15, 'Felicity', 'Gray', NULL);
INSERT INTO person (person_id, first_name, last_name, address) VALUES (16, 'Keith', 'Allan', '1458  Michigan Avenue');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (17, 'Dorothy', 'MacDonald', '3053  Hampton Meadows');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (18, 'Dan', 'Peters', '4249  Hewes Avenue');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (19, 'Emma', 'Lambert', '1903  Young Road');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (20, 'Christopher', 'Paterson', '1209  Franklin Avenue');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (21, 'Boris', 'Simpson', '2567  Arron Smith Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (22, 'Ruth', 'Walker', '2867  Chardonnay Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (23, 'Owen', 'Vance', NULL);
INSERT INTO person (person_id, first_name, last_name, address) VALUES (24, 'Julian', 'Miller', '634  Kessla Way');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (25, 'Charles', 'Newman', '565  Nixon Avenue');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (26, 'Una', 'Langdon', '4537  Virginia Street');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (27, 'Joanne', 'Oliver', '1743  Cantebury Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (28, 'Fiona', 'North', '2990  Poe Road');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (29, 'Felicity', 'Tucker', '1868  Oakmound Road');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (30, 'Wanda', 'Miller', NULL);
INSERT INTO person (person_id, first_name, last_name, address) VALUES (31, 'Natalie', 'Jones', '644  Jennifer Lane');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (32, 'Lauren', 'Skinner', '2931  Mcwhorter Road');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (33, 'Paul', 'Campbell', '3086  Freshour Circle');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (34, 'Lauren', 'Lee', '1998  Sunrise Road');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (35, 'Harry', 'Butler', '3227  Spadafore Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (36, 'Megan', 'Wilkins', '3971  Poplar Lane');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (37, 'Paul', 'Harris', '2709  Scheuvront Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (38, 'Kimberly', 'Mackenzie', '996  Creekside Lane');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (39, 'Stephanie', 'Stewart', '4576  Broadway Avenue');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (40, 'Edward', 'Ogden', '1222  Grant View Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (41, 'William', 'Hemmings', '3013  Reeves Street');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (42, 'Heather', 'Slater', '1111  Levy Court');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (43, 'Liam', 'Black', '61  Ray Court');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (44, 'Leonard', 'Greene', '4809  Joseph Street');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (45, 'Cameron', 'Abraham', NULL);
INSERT INTO person (person_id, first_name, last_name, address) VALUES (46, 'Ava', 'Burgess', '372  Catherine Drive');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (47, 'Max', 'Nash', '4688  Roane Avenue');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (48, 'Alexandra', 'Mitchell', '1622  Saint Marys Avenue');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (49, 'Audrey', 'Jackson', '3503  Douglas Dairy Road');
INSERT INTO person (person_id, first_name, last_name, address) VALUES (50, 'Dylan', 'Knox', NULL);

-- Table: rating
DROP TABLE IF EXISTS rating;
CREATE TABLE rating(

    client INTEGER REFERENCES client,
    appointment INTEGER REFERENCES appointment,
    rating_score INTEGER,
    PRIMARY KEY(client, appointment)
);

-- Table: relationship
DROP TABLE IF EXISTS relationship;
CREATE TABLE relationship (chief_id INTEGER REFERENCES employee);
INSERT INTO relationship (chief_id) VALUES (5);
INSERT INTO relationship (chief_id) VALUES (24);
INSERT INTO relationship (chief_id) VALUES (19);
INSERT INTO relationship (chief_id) VALUES (12);
INSERT INTO relationship (chief_id) VALUES (8);

-- Table: room
DROP TABLE IF EXISTS room;
CREATE TABLE room (

    room_id INTEGER PRIMARY KEY AUTOINCREMENT,
    room_branch INTEGER NOT NULL REFERENCES branch
);
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
DROP TABLE IF EXISTS trans;
CREATE TABLE trans ( -- for some reason transaction throws an error

    transaction_id INTEGER PRIMARY KEY AUTOINCREMENT,
    money_exchanged INTEGER,
    origin_account_id INTEGER NOT NULL REFERENCES account,
    destiny_account_id INTEGER REFERENCES account
);

-- Table: typeOfCard
DROP TABLE IF EXISTS typeOfCard;
CREATE TABLE typeOfCard(

    card_type_id INTEGER PRIMARY KEY AUTOINCREMENT,
    card_type TEXT
);
INSERT INTO typeOfCard (card_type_id, card_type) VALUES (1, 'debit');
INSERT INTO typeOfCard (card_type_id, card_type) VALUES (2, 'credit');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
