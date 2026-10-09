CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Plan the day', 'completed', CURDATE(), NOW()),
('Review project priorities', 'pending', CURDATE(), NOW()),
('Reply to important emails', 'pending', CURDATE(), NOW()),
('Take a proper lunch break', 'pending', CURDATE(), NOW()),
('Organize the workspace', 'completed', DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
('Read the monthly report', 'pending', DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
('Prepare tomorrow''s agenda', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW()),
('Schedule a team check-in', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW());

INSERT INTO users (username, full_name, email, created_at) VALUES
('demo', 'Demo User', 'demo@example.com', NOW());
