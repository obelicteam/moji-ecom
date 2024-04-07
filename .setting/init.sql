DROP DATABASE IF EXISTS moji;
CREATE DATABASE moji;
USE moji;

CREATE TABLE tbl_account(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    usenrame    VARCHAR(30),
    password    VARCHAR(80)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE tbl_category(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE tbl_product(
    id              INTEGER PRIMARY KEY AUTO_INCREMENT,
    name            VARCHAR(100),
    description     VARCHAR(255),
    price           DOUBLE,
    url_image       VARCHAR(255),
    created_date    DATETIME DEFAULT NOW(),
    updated_date    DATETIME DEFAULT NOW(),
    category_id     INTEGER,
    FOREIGN KEY(category_id) REFERENCES tbl_category(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE tbl_order(
    id                  INTEGER PRIMARY KEY AUTO_INCREMENT,
    total_price         DOUBLE,
    customer_full_name  VARCHAR(255),
    customer_address    VARCHAR(255),
    customer_phone      VARCHAR(10),
    created_date        DATETIME DEFAULT NOW(),
    status              TINYINT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE tbl_order_detail(
    order_id            INTEGER NOT NULL,
    product_id          INTEGER NOT NULL,
    price               DOUBLE,
    qty                 INTEGER,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY(order_id) REFERENCES tbl_order(id),
    FOREIGN KEY(product_id) REFERENCES tbl_product(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_category (name)
VALUES  ('Set quà'), 
        ('Gấu bông & gối'), 
        ('Balo & Túi ví'), 
        ('Văn phòng phẩm'), 
        ('Phụ kiện & Thời trang'),
        ('Gia dụng'),
        ('Trang điểm'),
        ('Du lịch'),
        ('Đồ chơi'),
        ('Trang trí');


CREATE TRIGGER before_insert_trigger
BEFORE INSERT ON tbl_product
FOR EACH ROW
BEGIN
    IF NEW.url_image = '' OR NEW.url_image IS NULL THEN
        SET NEW.url_image = '/asset/uploads/default_product.png';
    END IF;
END;