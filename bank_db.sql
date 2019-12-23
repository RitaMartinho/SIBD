--
-- File generated with SQLiteStudio v3.2.1 on sábado dez 7 21:52:40 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: account
DROP TABLE IF EXISTS account;

CREATE TABLE account (
    account_id     INTEGER PRIMARY KEY AUTOINCREMENT,
    balance        INTEGER,
    type           TEXT,
    account_client INTEGER NOT NULL
                           REFERENCES client (client_id) 
);


-- Table: appointment
DROP TABLE IF EXISTS appointment;

CREATE TABLE appointment (
    appointment_id INTEGER PRIMARY KEY AUTOINCREMENT,
    start_time     TEXT,
    end_time       TEXT,
    room           INTEGER REFERENCES room (room_id),
    client_1       INTEGER REFERENCES client (client_id) 
                           NOT NULL,
    client_2       INTEGER REFERENCES client (client_id),
    CONSTRAINT correct_time CHECK (strftime('%s', end_time) > strftime('%s', start_time) ) 
);


-- Table: branch
DROP TABLE IF EXISTS branch;

CREATE TABLE branch (
    branch_id INTEGER PRIMARY KEY AUTOINCREMENT,
    address   TEXT-- n_employees INTEGER,
/* n_clients INTEGER, */);
-- n_rooms INTEGER

-- Table: card
DROP TABLE IF EXISTS card;

CREATE TABLE card (
    card_id            INTEGER PRIMARY KEY AUTOINCREMENT,
    expiry_date        DATE,
    cvv                INTEGER,
    associated_account INTEGER NOT NULL
                               REFERENCES account,
    type_of_card       INTEGER REFERENCES typeOfCard
);


-- Table: client
DROP TABLE IF EXISTS client;

CREATE TABLE client (
    client_id     INTEGER PRIMARY KEY
                          REFERENCES person,
    birthdate     TEXT,-- there's no date in sqlite
    tax_id        NUMERIC,-- age INTEGER, -- HOW DO I DO THIS - A: PHP
    client_branch INTEGER REFERENCES branch
);


-- Table: employee
DROP TABLE IF EXISTS employee;

CREATE TABLE employee (
    employee_id        INTEGER PRIMARY KEY
                               REFERENCES person,
    phone_number       INTEGER,
    employee_branch_id INTEGER NOT NULL
                               REFERENCES branch ON DELETE SET NULL
                                                 ON UPDATE CASCADE,
    employee_room_id   INTEGER REFERENCES room ON DELETE SET NULL
                                               ON UPDATE CASCADE
);


-- Table: insurance
DROP TABLE IF EXISTS insurance;

CREATE TABLE insurance (
    insurance_id   INTEGER PRIMARY KEY AUTOINCREMENT,
    insurance_name TEXT
);


-- Table: insurer
DROP TABLE IF EXISTS insurer;

CREATE TABLE insurer (
    insurer_id   INTEGER PRIMARY KEY AUTOINCREMENT,
    insurer_name TEXT
);


-- Table: offers
DROP TABLE IF EXISTS offers;

CREATE TABLE offers (
    insurer_id   INTEGER REFERENCES insurer
                         NOT NULL,
    insurance_id INTEGER REFERENCES insurance
                         NOT NULL,
    card_type_id INTEGER REFERENCES typeOfCard
                         NOT NULL,
    PRIMARY KEY (
        insurer_id,
        insurance_id,
        card_type_id
    )
);


-- Table: person
DROP TABLE IF EXISTS person;

CREATE TABLE person (
    person_id  INTEGER PRIMARY KEY AUTOINCREMENT,
    first_name TEXT,
    last_name  TEXT,
    address    TEXT,
    username   TEXT,
    password   TEXT,
    admin      BOOLEAN
);


-- Table: rating
DROP TABLE IF EXISTS rating;

CREATE TABLE rating (
    client_1       INTEGER REFERENCES client (client_id) 
                           NOT NULL,
    appointment    INTEGER REFERENCES appointment (appointment_id) 
                           NOT NULL,
    rating_score   INTEGER NOT NULL,
    client_2       INTEGER REFERENCES client (client_id),
    rating_score_2         CHECK (0 <= rating_score_2 <= 10),
    PRIMARY KEY (
        client_1,
        appointment,
        client_2
    ),
    CONSTRAINT correct_range CHECK (0 <= rating_score <= 10) 
);


-- Table: relationship
DROP TABLE IF EXISTS relationship;

CREATE TABLE relationship (
    chief_id INTEGER REFERENCES employee (employee_id) 
);


-- Table: room
DROP TABLE IF EXISTS room;

CREATE TABLE room (
    room_id     INTEGER PRIMARY KEY AUTOINCREMENT,
    room_branch INTEGER NOT NULL
                        REFERENCES branch
);


-- Table: trans
DROP TABLE IF EXISTS trans;

CREATE TABLE trans (
    transaction_id     INTEGER PRIMARY KEY AUTOINCREMENT,
    money_exchanged    INTEGER,
    origin_account_id  INTEGER NOT NULL
                               REFERENCES account,
    destiny_account_id INTEGER REFERENCES account,
    CONSTRAINT TransNotToSelf CHECK (destiny_account_id != origin_account_id) 
);


-- Table: typeOfCard
DROP TABLE IF EXISTS typeOfCard;

CREATE TABLE typeOfCard (
    card_type_id INTEGER PRIMARY KEY AUTOINCREMENT,
    card_type    TEXT
);


-- View: get _id_by_username
DROP VIEW IF EXISTS "get _id_by_username";
CREATE VIEW [get _id_by_username] AS
    SELECT client_id
      FROM person
           JOIN
           client ON client_id = person_id
     WHERE username LIKE "nata";


-- View: get_accountid_by_clientid
DROP VIEW IF EXISTS get_accountid_by_clientid;
CREATE VIEW get_accountid_by_clientid AS
    SELECT account_id
      FROM account
     WHERE account_client = '43';


-- View: get_avg_ratings
DROP VIEW IF EXISTS get_avg_ratings;
CREATE VIEW get_avg_ratings AS
    SELECT avg( (rating_score + rating_score) / 2) 
      FROM rating;


-- View: get_branch_addresss
DROP VIEW IF EXISTS get_branch_addresss;
CREATE VIEW get_branch_addresss AS
    SELECT address
      FROM branch
     WHERE branch_id = "2";


-- View: get_card_info_by_accountid
DROP VIEW IF EXISTS get_card_info_by_accountid;
CREATE VIEW get_card_info_by_accountid AS
    SELECT card_type,
           cvv,
           expiry_date
      FROM card
           JOIN
           typeOfCard ON type_of_card = card_type_id
     WHERE associated_account = '19';


-- View: get_chief_name_by_employeeid
DROP VIEW IF EXISTS get_chief_name_by_employeeid;
CREATE VIEW get_chief_name_by_employeeid AS
    SELECT first_name,
           last_name
      FROM person
           JOIN
           employee ON person_id = employee_id
     WHERE employee_id = '8';


-- View: get_chief_with_client_branch_known
DROP VIEW IF EXISTS get_chief_with_client_branch_known;
CREATE VIEW get_chief_with_client_branch_known AS
    SELECT employee_id
      FROM (
               SELECT employee_id,
                      employee_branch_id
                 FROM employee
                      JOIN
                      relationship ON employee_id = chief_id
           )
     WHERE employee_branch_id = '2';


-- View: get_clientbranch
DROP VIEW IF EXISTS get_clientbranch;
CREATE VIEW get_clientbranch AS
    SELECT client_branch
      FROM client
     WHERE client_id = "27";


-- View: get_id_balance_type_ofaccount
DROP VIEW IF EXISTS get_id_balance_type_ofaccount;
CREATE VIEW get_id_balance_type_ofaccount AS
    SELECT account_id,
           balance,
           type
      FROM account
     WHERE account_client = '43';


-- View: get_insuranceandinsurer_name_by_client_id
DROP VIEW IF EXISTS get_insuranceandinsurer_name_by_client_id;
CREATE VIEW get_insuranceandinsurer_name_by_client_id AS
    SELECT DISTINCT insurance_name,
                    insurer_name
      FROM insurance,
           insurer
           INNER JOIN
           (
               SELECT insurer_id AS insurer,
                      insurance_id AS insurance
                 FROM offers
                      INNER JOIN
                      card ON (card_type_id = type_of_card) 
                      INNER JOIN
                      account ON (associated_account = account_id) 
                WHERE account_client = '28'
           )
           ON (insurance = insurance_id AND 
               insurer = insurer_id);


-- View: get_list_of_employees_by_clientbranch/employee
DROP VIEW IF EXISTS "get_list_of_employees_by_clientbranch/employee";
CREATE VIEW [get_list_of_employees_by_clientbranch/employee] AS
    SELECT first_name,
           last_name
      FROM person
           JOIN
           (
               SELECT employee_id
                 FROM employee
                WHERE employee_branch_id = '3'
           )
           ON employee_id = person_id;


-- View: get_number_of_cards
DROP VIEW IF EXISTS get_number_of_cards;
CREATE VIEW get_number_of_cards AS
    SELECT count( * ) 
      FROM card
     WHERE associated_account = '23';


-- View: get_number_of_clientsperbranch
DROP VIEW IF EXISTS get_number_of_clientsperbranch;
CREATE VIEW get_number_of_clientsperbranch AS
    SELECT count( * ) AS number_of_clients,
           client_branch
      FROM client
     GROUP BY client_branch
     ORDER BY number_of_clients ASC;


-- View: get_number_of_employees
DROP VIEW IF EXISTS get_number_of_employees;
CREATE VIEW get_number_of_employees AS
    SELECT count( * ) 
      FROM employee
     WHERE employee_branch_id = "2";


-- View: get_number_of_offers
DROP VIEW IF EXISTS get_number_of_offers;
CREATE VIEW get_number_of_offers AS
    SELECT count( * ) 
      FROM offers
           INNER JOIN
           card ON (card_type_id = type_of_card) 
           INNER JOIN
           account ON (associated_account = account_id) 
     WHERE account_client = '47';


-- View: rating_view
DROP VIEW IF EXISTS rating_view;
CREATE VIEW rating_view AS
    SELECT appointment_id,
           start_time,
           appointment.client_1,
           appointment.client_2,
           rating_score,
           rating_score_2,
           first_name,
           last_name
      FROM appointment
           JOIN
           rating ON appointment_id = appointment
           JOIN
           (
               SELECT *
                 FROM employee
                      JOIN
                      person ON employee_id = person_id
           )
           ON room = employee_room_id;


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
