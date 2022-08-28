CREATE TABLE refresh_token (
    token_hash VARCHAR(64) NOT NULL,
    expires_at INT UNSIGNED NOT NULL,
    PRIMARY KEY (token_hash),
    INDEX (expires_at)
);
