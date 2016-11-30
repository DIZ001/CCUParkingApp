
CREATE USER 'parkingApp'@'localhost' IDENTIFIED BY 'ccupark1';

GRANT ALL PRIVILEGES ON * . * TO 'parkingApp'@'localhost';

FLUSH PRIVILEGES;