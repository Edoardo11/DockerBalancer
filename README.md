# DockerBalancer

# Docker-compose
version: '3'
services:
  alpha:
    container_name: alpha
    hostname: alpha
    build: 
      context: ./
      dockerfile: Dockerfile
    depends_on:
      - mariadb
    hostname: alpha
    ports:
      - "5001:80"
  beta:
    container_name: beta
    build: 
      context: ./beta
      dockerfile: Dockerfile
    depends_on:
      - mariadb
    hostname: beta
    ports:
      - "5002:80"
  nginx:
    build: ./nginx
    ports:
      - "8080:80"
    depends_on:
      - beta
      - alpha
  mariadb:
    image: mariadb
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: example
  adminer:
    image: adminer
    restart: always
    ports:
      - 8000:8080 


# Dockerfile
FROM php:7.0-apache
COPY alpha.php /var/www/html/index.php
EXPOSE 80 
