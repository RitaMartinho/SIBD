--
-- File generated with SQLiteStudio v3.2.1 on Fri Dec 27 23:58:20 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: account
CREATE TABLE account (account_id INTEGER PRIMARY KEY AUTOINCREMENT, balance INTEGER, type TEXT, account_client INTEGER NOT NULL REFERENCES client (client_id) ON DELETE CASCADE);

-- Table: appointment
CREATE TABLE appointment (appointment_id INTEGER PRIMARY KEY AUTOINCREMENT, start_time TEXT, end_time TEXT, room INTEGER REFERENCES room (room_id) ON DELETE NO ACTION, client_1 INTEGER REFERENCES client (client_id) ON DELETE NO ACTION NOT NULL, client_2 INTEGER REFERENCES client (client_id) ON DELETE NO ACTION, CONSTRAINT correct_time CHECK (strftime('%s', end_time) > strftime('%s', start_time)));

-- Table: branch
CREATE TABLE branch (

    branch_id INTEGER PRIMARY KEY AUTOINCREMENT,
    address TEXT
   -- n_employees INTEGER, 
   -- n_clients INTEGER,
   --n_rooms INTEGER
);

-- Table: card
CREATE TABLE card (card_id INTEGER PRIMARY KEY AUTOINCREMENT, expiry_date DATE, cvv INTEGER, associated_account INTEGER NOT NULL REFERENCES account (account_id) ON DELETE CASCADE, type_of_card INTEGER REFERENCES typeOfCard (card_type_id) ON DELETE CASCADE);

-- Table: client
CREATE TABLE client (client_id INTEGER PRIMARY KEY REFERENCES person (person_id) ON DELETE CASCADE, birthdate TEXT, tax_id NUMERIC, client_branch INTEGER REFERENCES branch (branch_id) ON DELETE NO ACTION);

-- Table: employee
CREATE TABLE employee (employee_id INTEGER PRIMARY KEY REFERENCES person (person_id) ON DELETE CASCADE ON UPDATE NO ACTION, phone_number INTEGER, employee_branch_id INTEGER NOT NULL REFERENCES branch (branch_id) ON DELETE NO ACTION ON UPDATE NO ACTION, employee_room_id INTEGER REFERENCES room (room_id) ON DELETE SET NULL ON UPDATE NO ACTION);

-- Table: insurance
CREATE TABLE insurance(

    insurance_id INTEGER PRIMARY KEY AUTOINCREMENT,
    insurance_name text
);

-- Table: insurer
CREATE TABLE insurer(

    insurer_id INTEGER PRIMARY KEY AUTOINCREMENT,
    insurer_name text
);

-- Table: offers
CREATE TABLE offers (insurer_id INTEGER REFERENCES insurer (insurer_id) ON DELETE CASCADE NOT NULL, insurance_id INTEGER REFERENCES insurance (insurance_id) ON DELETE CASCADE NOT NULL, card_type_id INTEGER REFERENCES typeOfCard (card_type_id) ON DELETE CASCADE NOT NULL, PRIMARY KEY (insurer_id, insurance_id, card_type_id));

-- Table: person
CREATE TABLE person (person_id INTEGER PRIMARY KEY AUTOINCREMENT, first_name TEXT, last_name TEXT, address TEXT, username TEXT UNIQUE, password TEXT, admin BOOLEAN);

-- Table: rating
CREATE TABLE rating (client_1 INTEGER REFERENCES client (client_id) NOT NULL, appointment INTEGER REFERENCES appointment (appointment_id) NOT NULL, rating_score INTEGER NOT NULL, client_2 INTEGER REFERENCES client (client_id), rating_score_2 CHECK (0 <= rating_score_2 <= 10), PRIMARY KEY (client_1, appointment, client_2), CONSTRAINT correct_range CHECK (0 <= rating_score <= 10));

-- Table: relationship
CREATE TABLE relationship (chief_id INTEGER REFERENCES employee (employee_id));

-- Table: room
CREATE TABLE room (room_id INTEGER PRIMARY KEY AUTOINCREMENT, room_branch INTEGER NOT NULL REFERENCES branch (branch_id) ON DELETE CASCADE);

-- Table: trans
CREATE TABLE trans (transaction_id INTEGER PRIMARY KEY AUTOINCREMENT, money_exchanged INTEGER, origin_account_id INTEGER NOT NULL REFERENCES account, destiny_account_id INTEGER REFERENCES account, CONSTRAINT TransNotToSelf CHECK (destiny_account_id != origin_account_id));

-- Table: typeOfCard
CREATE TABLE typeOfCard(

    card_type_id INTEGER PRIMARY KEY AUTOINCREMENT,
    card_type TEXT
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
