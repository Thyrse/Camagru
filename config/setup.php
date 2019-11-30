#!/usr/bin/php
<?php
include 'database.php';
// CREATE DATABASE
try {
        // Connect to Mysql server
        $dbh = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE `".$DB_NAME."`";
        $dbh->exec($sql);
        echo "Database created successfully\n";
    } catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }
// CREATE TABLE USERS
try {
        // Connect to DATABASE previously created
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` varchar(20) CHARACTER SET utf8 NOT NULL,
            `email` varchar(255) CHARACTER SET utf8 NOT NULL,
            `password` varchar(255) CHARACTER SET utf8 NOT NULL,
            `reset` varchar(255) CHARACTER SET utf8 NOT NULL,
            `newsletter` tinyint(1) NOT NULL DEFAULT '1',
            `token` varchar(255) CHARACTER SET utf8 NOT NULL,
            `valid` tinyint(1) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        $dbh->exec($sql);
        echo "Table users created successfully\n";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
    }
// CREATE TABLE PUBLICATION
try {
        // Connect to DATABASE previously created
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `publication` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `image` varchar(50) CHARACTER SET utf8 NOT NULL,
            `description` text CHARACTER SET utf8 NOT NULL,
            `id_user` int(11) NOT NULL,
            `nb_like` int(11) NOT NULL,
            `nb_commentaire` int(11) NOT NULL,
            FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        $dbh->exec($sql);
        echo "Table publication created successfully\n";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
    }
// CREATE TABLE OPINION
try {
        // Connect to DATABASE previously created
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `opinion` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `id_user` int(11) NOT NULL,
            `id_publication` int(11) NOT NULL,
            FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        $dbh->exec($sql);
        echo "Table opinion created successfully\n";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
    }
// CREATE TABLE COMMENTARY
try {
        // Connect to DATABASE previously created
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `commentary` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `content` text CHARACTER SET utf8 NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_publication` int(11) NOT NULL,
            FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        $dbh->exec($sql);
        echo "Table commentary created successfully\n";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
    }
?>