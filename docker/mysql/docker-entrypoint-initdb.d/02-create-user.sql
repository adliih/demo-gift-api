# create root user and grant rights
CREATE USER 'laravel'@'%' IDENTIFIED BY 'laravel';
GRANT ALL PRIVILEGES ON *.* TO 'laravel'@'%';
