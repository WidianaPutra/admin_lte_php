USE data_sekolah;

CREATE TABLE sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    session_token VARCHAR(255) NOT NULL,
    ip_address VARCHAR(45) DEFAULT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Menambahkan index pada `session_token` untuk mempercepat pencarian
CREATE UNIQUE INDEX idx_session_token ON sessions (session_token);