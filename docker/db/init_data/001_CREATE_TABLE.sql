CREATE TABLE IF NOT EXISTS articles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS php_session (
    session_id VARCHAR(255) UNIQUE,
    session_data TEXT,
    last_activity INT
) COLLATE = utf8mb4_unicode_ci;
