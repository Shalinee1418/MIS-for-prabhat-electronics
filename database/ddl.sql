CREATE TABLE user
(
user_id VARCHAR(50) PRIMARY KEY,
password VARCHAR(100)
);

CREATE TABLE supplier
(
supplier_id INT AUTO_INCREMENT PRIMARY KEY,
phone CHAR(10) UNIQUE NOT NULL,
email VARCHAR(255),
address CHAR(255)
);

CREATE TABLE purchase
(
    purchase_id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT  UNIQUE NOT NULL,
    purchase_date DATE NOT NULL,
    tax_amount DECIMAL NOT NULL,
    total_amount DECIMAL NOT NULL,
    date DATE NOT NULL,
    payment_status ENUM('paid', 'due', 'part'),
    unit_price DECIMAL NOT NULL
);

CREATE TABLE purchase_items
(
    purchase_item_id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_id INT AUTO_INCREMENT UNIQUE NOT NULL,
    stock_item_id INT AUTO_INCREMENT UNIQUE NOT NULL,
    quantity INT AUTO_INCREMENT NOT NULL,
);

CREATE TABLE category
(
category_id INT AUTO_INCREMENT PRIMARY KEY,
category_name VARCHAR(255) NOT NULL,
hsn_code INT NOT NULL,
descrption VARCHAR(255) NOT NULL
);

CREATE TABLE product
(
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT UNIQUE NOT NULL,
    name VARCHAR (255) NOT NULL,
    purchase_price DECIMAL NOT NULL,
    product_code VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    FOREIGN KEY(category_id) REFERENCES category(category_id)
);


CREATE TABLE sale
(
sale_id INT AUTO_INCREMENT PRIMARY KEY,
sale_date DATE NOT NULL,
discount DECIMAL NOT NULL,
invoice_number INT NOT NULL,
tax_amount DECIMAL NOT NULL,
unit_price DECIMAL NOT NULL,
total_amount DECIMAL NOT NULL
);

CREATE TABLE sales_items
(
sales_items_id INT AUTO_INCREMENT PRIMARY KEY,
stock_item_id INT NOT NULL,
sale_id INT NOT NULL,
category_id INT NOT NULL,
serial_number INT NOT NULL,
quantity INT NOT NULL,
discount DECIMAL NOT NULL,
unit_price DECIMAL NOT NULL,
tax_amount DECIMAL NOT NULL,
);


CREATE TABLE Transaction
(
transaction_id INT AUTO_INCREMENT PRIMARY KEY,
transaction_type VARCHAR(255) NOT NULL DESC Transaction
transaction_date DATE  NOT NULL,
debit_amount DECIMAL NOT NULL,
credit_amount DECIMAL NOT NULL,
narration VARCHAR(255),
);

CREATE TABLE customer
(
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    phone CHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gst_number VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    pincode CHAR(10) NOT NULL,
);

CREATE TABLE account_ledger
(
ledger_id INT AUTO_INCREMENT PRIMARY KEY,
account_name CHAR(50) NOT NULL,
account_type ENUM NOT NULL,
opening_balance DECIMAL NOT NULL,
closing_balance DECIMAL NOT NULL,
);

CREATE TABLE service_request
(
service_request_id INT AUTO_INCREMENT PRIMARY KEY,
stock_item_id INT NOT NULL,
customer_id INT NOT NULL,
delivery_date DATE NOT NULL,
warranty_status ENUM NOT NULL,
);

CREATE TABLE service_part_used
(
service_part_used_id INT AUTO_INCREMENT PRIMARY KEY,
service_request_id INT NOT NULL,
stock_item_id INT NOT NULL,
unit_price DECIMAL NOT NULL,
quantity INT NOT NULL,
charge_to_customer DECIMAL NOT NULL,

);
CREATE TABLE payment_status
(
payment_id INT AUTO_INCREMENT PRIMARY KEY,
sale_id INT NOT NULL,
service_request_id INT NOT NULL,
customer_id INT NOT NULL,
payment_date DATE NOT NULL,
tax_amount DECIMAL NOT NULL,
total_amount DECIMAL NOT NULL,
payment_mode ENUM NOT NULL,
payment_status ENUM NOT NULL,
);


