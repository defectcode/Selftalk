CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    age INT,
    gender VARCHAR(10),
    city VARCHAR(50),
    country VARCHAR(50),
    occupation VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (first_name, last_name, email, age, gender, city, country, occupation)
VALUES
('John', 'Doe', 'john@example.com', 30, 'Male', 'New York', 'USA', 'Software Developer'),
('Jane', 'Doe', 'jane@example.com', 28, 'Female', 'Los Angeles', 'USA', 'Graphic Designer'),
('Alice', 'Smith', 'alice@example.com', 25, 'Female', 'London', 'UK', 'Student'),
('Bob', 'Johnson', 'bob@example.com', 35, 'Male', 'Toronto', 'Canada', 'Teacher'),
('Charlie', 'Brown', 'charlie@example.com', 40, 'Male', 'Sydney', 'Australia', 'Doctor'),
('Emma', 'Wilson', 'emma@example.com', 27, 'Female', 'Paris', 'France', 'Engineer'),
('Michael', 'Clark', 'michael@example.com', 33, 'Male', 'Berlin', 'Germany', 'Manager'),
('Olivia', 'Lee', 'olivia@example.com', 29, 'Female', 'Tokyo', 'Japan', 'Artist'),
('William', 'Liu', 'william@example.com', 32, 'Male', 'Shanghai', 'China', 'Entrepreneur'),
('Sophia', 'Garcia', 'sophia@example.com', 31, 'Female', 'Mexico City', 'Mexico', 'Lawyer');
