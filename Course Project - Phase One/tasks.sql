CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    priority ENUM('High', 'Medium', 'Low'),
    due_date DATE,
    time INT
);
