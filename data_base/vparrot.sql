USE parrot;
CREATE TABLE address (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(50) NOT NULL, 
  street_number INT NOT NULL,
  street_name VARCHAR(100) NOT NULL,
  zip_code INT(5) NOT NULL,
  city VARCHAR(70) NOT NULL
);

CREATE TABLE services (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  title VARCHAR(50) NOT NULL, 
  content JSON
);
CREATE TABLE openings (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  day VARCHAR(10) NOT NULL,
  am_opening TIME NOT NULL, 
  am_closure TIME NOT NULL, 
  pm_opening TIME NOT NULL, 
  pm_closure TIME NOT NULL
);

CREATE TABLE company (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  phone INT(10) NOT NULL,
  email VARCHAR(70),
  address_id INT,
  service_id INT,
  opening_id INT,
  FOREIGN KEY (address_id) REFERENCES address(id),
  FOREIGN KEY (service_id) REFERENCES services(id),
  FOREIGN KEY (opening_id) REFERENCES openings(id)
);


INSERT INTO company (phone, email, address_id)
VALUES ('0581234567', 'parrot@example.com', 1);


CREATE TABLE comments (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  user_id INT NOT NULL,
  note INT(1) NOT NULL,
  comment VARCHAR(255) NOT NULL,
  is_checked BOOLEAN,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

DROP TABLE messages;
CREATE TABLE messages (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  title VARCHAR(50) NULL, 
  content TEXT NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);


CREATE TABLE cars (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  brand VARCHAR(50) NOT NULL,
  model VARCHAR(100) NOT NULL,
  year DATE NOT NULL,
  price INT(7) NOT NULL,
  mileage INT(6) NOT NULL
);


CREATE TABLE images (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  filename VARCHAR(159) NOT NULL,
  is_main BOOLEAN NOT NULL, 
  car_id INT NOT NULL,
  FOREIGN KEY (car_id) REFERENCES cars(id)
);