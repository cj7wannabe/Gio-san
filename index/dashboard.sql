USE gio_san;

-- 1. Add a role to users (everyone is a client by default)
ALTER TABLE users ADD COLUMN role VARCHAR(10) NOT NULL DEFAULT 'client';

-- 2. Make the owner an admin (change the email to the owner's real account)
UPDATE users SET role = 'admin' WHERE email = 'owner@example.com';