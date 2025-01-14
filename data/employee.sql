CREATE TABLE employee (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL
);
