CREATE TABLE tbl_account(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    usenrame    VARCHAR(30),
    password    VARCHAR(80)
);


CREATE TABLE tbl_category(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(100)
);


CREATE TABLE tbl_product(
    id              INTEGER PRIMARY KEY AUTO_INCREMENT,
    name            VARCHAR(100),
    description     VARCHAR(255),
    price           DOUBLE,
    created_date    DATETIME DEFAULT NOW(),
    category_id     INTEGER,
    FOREIGN KEY(category_id) REFERENCES tbl_category(id)
);


CREATE TABLE tbl_order(
    id                  INTEGER PRIMARY KEY AUTO_INCREMENT,
    total_price         DOUBLE,
    customer_full_name  VARCHAR(255),
    customer_address    VARCHAR(255),
    customer_phone      VARCHAR(10),
    created_date        DATETIME DEFAULT NOW(),
    status              TINYINT
);


CREATE TABLE tbl_order_detail(
    order_id            INTEGER NOT NULL,
    product_id          INTEGER NOT NULL,
    price               DOUBLE,
    qty                 INTEGER,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY(order_id) REFERENCES tbl_order(id),
    FOREIGN KEY(product_id) REFERENCES tbl_product(id)
);