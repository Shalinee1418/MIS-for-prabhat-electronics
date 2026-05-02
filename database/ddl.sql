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
tax_amount DECIMAL NOT NULL
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
payment_status ENUM NOT NULL
);


SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE table_name;
SET FOREIGN_KEY_CHECKS = 1;


SELECT CONCAT('TRUNCATE TABLE `', table_schema, '`.`', table_name, '`;') 
FROM information_schema.TABLES 
WHERE table_schema = 'db_name';


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(10,2),
    gst_rate DECIMAL(5,2) 
);

CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(50),
    total DECIMAL(10,2),
    gst_total DECIMAL(10,2),
    grand_total DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10,2),
    gst_rate DECIMAL(5,2),
    gst_amount DECIMAL(10,2),
    total DECIMAL(10,2)
);



-- CREATE TABLE users (
--     user_id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50) UNIQUE NOT NULL,
--     password_hash VARCHAR(255) NOT NULL,
--     role VARCHAR(30)
-- );

-- CREATE TABLE suppliers (
--    supplier_id INT AUTO_INCREMENT PRIMARY KEY,
--    supplier_name VARCHAR(100) NOT NULL,
--    phone VARCHAR(15) UNIQUE,
--    email VARCHAR(120),
--    address TEXT
-- );

-- CREATE TABLE categories (
--    category_id INT AUTO_INCREMENT PRIMARY KEY,
--    category_name VARCHAR(100) NOT NULL,
--    hsn_code VARCHAR(30),
--    description TEXT
-- );

-- CREATE TABLE products (
--    product_id INT AUTO_INCREMENT PRIMARY KEY,
--    category_id INT NOT NULL,
--    product_name VARCHAR(150) NOT NULL,
--    product_code VARCHAR(50) UNIQUE,
--    brand VARCHAR(100),
--    purchase_price DECIMAL(12,2),
--    sale_price DECIMAL(12,2),

--    FOREIGN KEY (category_id)
--    REFERENCES categories(category_id)
-- );
-- CREATE TABLE stock (
--    stock_id INT AUTO_INCREMENT PRIMARY KEY,
--    product_id INT NOT NULL,
--    serial_number VARCHAR(100),
--    quantity INT DEFAULT 0,
--    reorder_level INT,

--    FOREIGN KEY(product_id)
--    REFERENCES products(product_id)
-- );

-- CREATE TABLE purchases (
--    purchase_id INT AUTO_INCREMENT PRIMARY KEY,
--    supplier_id INT NOT NULL,
--    purchase_date DATE,
--    tax_amount DECIMAL(12,2),
--    total_amount DECIMAL(12,2),
--    payment_status VARCHAR(20),

--    FOREIGN KEY (supplier_id)
--    REFERENCES suppliers(supplier_id)
-- );


-- CREATE TABLE purchase_items (
--    purchase_item_id INT AUTO_INCREMENT PRIMARY KEY,
--    purchase_id INT NOT NULL,
--    product_id INT NOT NULL,
--    quantity INT NOT NULL,
--    unit_price DECIMAL(12,2),
--    tax_amount DECIMAL(12,2),

--    FOREIGN KEY (purchase_id)
--    REFERENCES purchases(purchase_id),

--    FOREIGN KEY (product_id)
--    REFERENCES products(product_id)
-- );

-- CREATE TABLE customers (
--    customer_id INT AUTO_INCREMENT PRIMARY KEY,
--    customer_name VARCHAR(100),
--    phone VARCHAR(15),
--    email VARCHAR(120),
--    gst_number VARCHAR(30),
--    city VARCHAR(50),
--    pincode VARCHAR(10)
-- );

-- CREATE TABLE sales (
--    sale_id INT AUTO_INCREMENT PRIMARY KEY,
--    customer_id INT,
--    sale_date DATE,
--    invoice_number VARCHAR(50) UNIQUE,
--    discount DECIMAL(12,2),
--    tax_amount DECIMAL(12,2),
--    total_amount DECIMAL(12,2),

--    FOREIGN KEY(customer_id)
--    REFERENCES customers(customer_id)
-- );

-- CREATE TABLE sale_items (
--    sale_item_id INT AUTO_INCREMENT PRIMARY KEY,
--    sale_id INT NOT NULL,
--    product_id INT NOT NULL,
--    quantity INT,
--    unit_price DECIMAL(12,2),
--    discount DECIMAL(12,2),
--    tax_amount DECIMAL(12,2),

--    FOREIGN KEY(sale_id)
--    REFERENCES sales(sale_id),

--    FOREIGN KEY(product_id)
--    REFERENCES products(product_id)
-- );

-- CREATE TABLE service_requests (
--    service_request_id INT AUTO_INCREMENT PRIMARY KEY,
--    customer_id INT,
--    product_id INT,
--    complaint TEXT,
--    delivery_date DATE,
--    warranty_status VARCHAR(30),

--    FOREIGN KEY(customer_id)
--    REFERENCES customers(customer_id),

--    FOREIGN KEY(product_id)
--    REFERENCES products(product_id)
-- );

-- CREATE TABLE service_parts_used (
--    part_used_id INT AUTO_INCREMENT PRIMARY KEY,
--    service_request_id INT,
--    product_id INT,
--    quantity INT,
--    unit_price DECIMAL(12,2),
--    charge_to_customer DECIMAL(12,2),

--    FOREIGN KEY(service_request_id)
--    REFERENCES service_requests(service_request_id),

--    FOREIGN KEY(product_id)
--    REFERENCES products(product_id)
-- );


-- CREATE TABLE payments (
--    payment_id INT AUTO_INCREMENT PRIMARY KEY,

--    sale_id INT NULL,
--    purchase_id INT NULL,
--    service_request_id INT NULL,

--    payment_date DATE,
--    amount DECIMAL(12,2),
--    payment_mode VARCHAR(30),
--    status VARCHAR(20),

--    FOREIGN KEY(sale_id)
--    REFERENCES sales(sale_id),

--    FOREIGN KEY(purchase_id)
--    REFERENCES purchases(purchase_id),

--    FOREIGN KEY(service_request_id)
--    REFERENCES service_requests(service_request_id)
-- );

-- CREATE TABLE ledger_accounts (
--    ledger_id INT AUTO_INCREMENT PRIMARY KEY,
--    account_name VARCHAR(100),
--    account_type VARCHAR(30),
--    opening_balance DECIMAL(12,2)
-- );
-- CREATE TABLE journal_entries (
--    journal_id INT AUTO_INCREMENT PRIMARY KEY,
--    transaction_date DATE,
--    narration TEXT
-- );

-- CREATE TABLE journal_lines (
--    line_id INT AUTO_INCREMENT PRIMARY KEY,
--    journal_id INT,
--    ledger_id INT,
--    debit DECIMAL(12,2) DEFAULT 0,
--    credit DECIMAL(12,2) DEFAULT 0,

--    FOREIGN KEY(journal_id)
--    REFERENCES journal_entries(journal_id),

--    FOREIGN KEY(ledger_id)
--    REFERENCES ledger_accounts(ledger_id)
-- );



