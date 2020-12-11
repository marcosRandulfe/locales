DROP DATABASE IF EXISTS admin_locales;
CREATE DATABASE admin_locales;
use admin_locales;

CREATE TABLE categories(
	name VARCHAR(20) PRIMARY KEY
);

INSERT INTO categories VALUES ('general');

CREATE TABLE locales(name VARCHAR(20) PRIMARY KEY, 
			address VARCHAR(20),
			opening_hours VARCHAR(200),
			take_away BOOLEAN,
			deliverys BOOLEAN,
			restaurant_menu VARCHAR(200),
			whatsapp VARCHAR(12),
			web VARCHAR(200),
			email VARCHAR(200),
			url_foto VARCHAR(200),
			validated BOOLEAN,
			category VARCHAR(40),
			CONSTRAINT fk_locales_categoria FOREIGN KEY(category) REFERENCES categories(name)
		);
	
CREATE TABLE phones(
		     name VARCHAR(20),
			 phone VARCHAR(12),
			 CONSTRAINT pk_phones PRIMARY KEY(name,phone),
			 CONSTRAINT fk_phones_locales FOREIGN KEY(name) REFERENCES locales(name)
			);
             
			 
