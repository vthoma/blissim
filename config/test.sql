use blissim;

CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price INT(6) NOT NULL
);

CREATE TABLE comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    product_id INT UNSIGNED NOT NULL,
    comment VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users (name, email, password) VALUES ('John', 'john@email.fr', '$2y$10$LFFdXTVRNwFSqqwMjz5LoeVuHvWFJEfJ8Rp1SrvizPWfBpPhNnP2G');
INSERT INTO users (name, email, password) VALUES ('Jane', 'jane@email.fr', '$2y$10$LFFdXTVRNwFSqqwMjz5LoeVuHvWFJEfJ8Rp1SrvizPWfBpPhNnP2G');
INSERT INTO users (name, email, password) VALUES ('Jack', 'jack@email.fr', '$2y$10$LFFdXTVRNwFSqqwMjz5LoeVuHvWFJEfJ8Rp1SrvizPWfBpPhNnP2G');

INSERT INTO products(title, description, price) VALUES ('Product 1', 'Praesent id nulla in mauris placerat facilisis at et enim.', 100);
INSERT INTO products(title, description, price) VALUES ('Product 2', 'Pellentesque habitant morbi tristique senectus.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 3', 'Integer id libero tempus, placerat tellus vel, viverra lorem.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 4', 'Sed ut nunc nisl. Nam nec pretium arcu. Maecenas vel malesuada dui.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 5', 'Nunc iaculis bibendum congue. Suspendisse ut congue velit.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 6', 'Phasellus porta ligula neque, et pharetra orci molestie non.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 7', 'Nam pellentesque ipsum ligula, sit amet vehicula arcu vestibulum nec.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 8', 'Praesent id nulla in mauris placerat facilisis at et enim.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 9', 'Aenean vulputate libero at mi vehicula, non consectetur nunc finibus.', 16);
INSERT INTO products(title, description, price) VALUES ('Product 10', 'Integer interdum dui eu dignissim efficitur.', 16);


INSERT INTO comments(user_id, product_id, comment) VALUES (1, 1, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 3, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 2, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 8, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 1, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 8, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 3, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 8, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 3, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 1, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 7, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 2, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 6, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 4, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 1, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 5, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 2, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 2, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 4, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 8, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 5, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 2, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 1, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 3, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 2, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 8, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 1, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 8, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 3, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 8, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 3, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 1, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 7, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 2, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 6, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 4, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 1, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 5, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 2, 'Pretium arcu');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 2, 'Facilisis at et enim');
INSERT INTO comments(user_id, product_id, comment) VALUES (3, 4, 'Nunc praesent id nulla');
INSERT INTO comments(user_id, product_id, comment) VALUES (2, 8, 'Dignissim efficitur.');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 5, 'Aenean vulputate');
INSERT INTO comments(user_id, product_id, comment) VALUES (1, 2, 'Pretium arcu');