-- credits:     Bank System:_Data_Base_
--	------------------ 
--	- Rita Martinho -   up201709726
--	- Gonçalo Xavier -   up2016
--  	------------------

PRAGMA FOREIGN_KEY=ON;

.mode columns
.headers on

DROP TABLE IF EXISTS person;
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS employee;
DROP TABLE IF EXISTS relationship;
DROP TABLE IF EXISTS account;
DROP TABLE IF EXISTS trans;
DROP TABLE IF EXISTS card;
DROP TABLE IF EXISTS typeOfCard;
DROP TABLE IF EXISTS insurance;
DROP TABLE IF EXISTS insurer;
DROP TABLE IF EXISTS offers;
DROP TABLE IF EXISTS appointment;
DROP TABLE IF EXISTS rating;
DROP TABLE IF EXISTS room;
DROP TABLE IF EXISTS branch;



CREATE TABLE person(

    person_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    address TEXT
);

CREATE TABLE client(

    client_id INTEGER PRIMARY KEY REFERENCES person,
    birthdate TEXT, -- there's no date in sqlite
    tax_id NUMERIC,
    age INTEGER, -- HOW DO I DO THIS
    client_branch INTEGER REFERENCES branch
);

CREATE TABLE employee(

    employee_id INTEGER PRIMARY KEY REFERENCES person,
    phone_number INTEGER,
    employee_branch_id INTEGER NOT NULL REFERENCES branch
        ON DELETE SET NULL ON UPDATE CASCADE,
    employee_room_id INTEGER REFERENCES room
        ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE relationship(

    subordinate_id INTEGER PRIMARY KEY REFERENCES employee,
    chief_id INTEGER REFERENCES employee
);

CREATE TABLE account (

    account_id INTEGER PRIMARY KEY AUTOINCREMENT,
    balance INTEGER,
    type TEXT,
    n_cards_associated INTEGER,
    account_client INTEGER NOT NULL REFERENCES client
);

CREATE TABLE trans ( -- for some reason transaction throws an error

    transaction_id INTEGER PRIMARY KEY AUTOINCREMENT,
    money_exchanged INTEGER,
    origin_account_id INTEGER NOT NULL REFERENCES account,
    destiny_account_id INTEGER REFERENCES account
);

CREATE TABLE card(

    card_id INTEGER PRIMARY KEY AUTOINCREMENT,
    expiry_date DATE,
    cvv INTEGER, 
    associated_account INTEGER NOT NULL REFERENCES account,
    type_of_card INTEGER REFERENCES typeOfCard
);

CREATE TABLE typeOfCard(

    card_type_id INTEGER PRIMARY KEY AUTOINCREMENT,
    card_type TEXT
);

CREATE TABLE insurance(

    insurance_id INTEGER PRIMARY KEY AUTOINCREMENT,
    insurance_name text
);

CREATE TABLE insurer(

    insurer_id INTEGER PRIMARY KEY AUTOINCREMENT,
    insurer_name text
);

CREATE TABLE offers(

        insurer_id INTEGER REFERENCES insurer,
        insurance_id INTEGER REFERENCES insurance,
        card_type_id INTEGER REFERENCES typeOfCard,
        PRIMARY KEY (insurer_id, insurance_id, card_type_id)
);

CREATE TABLE appointment (

    appointment_id INTEGER PRIMARY KEY AUTOINCREMENT,
    --date TEXT,
    start_time TEXT,
    end_time TEXT,
    client INTEGER REFERENCES client,
    room INTEGER REFERENCES room,
    CONSTRAINT correct_time CHECK (strftime('%s', end_time)> strftime('%s', start_time))
);

CREATE TABLE rating(

    client INTEGER REFERENCES client,
    appointment INTEGER REFERENCES appointment,
    rating_score INTEGER,
    PRIMARY KEY(client, appointment)
);

CREATE TABLE room (

    room_id INTEGER PRIMARY KEY AUTOINCREMENT,
    room_branch INTEGER NOT NULL REFERENCES branch
);

CREATE TABLE branch (

    branch_id INTEGER PRIMARY KEY AUTOINCREMENT,
    address TEXT
   -- n_employees INTEGER, 
   -- n_clients INTEGER,
   --n_rooms INTEGER
);


