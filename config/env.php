<?php 

// Constante du mode de l'application
// dev : variables utilisées en local
// prod : pour le déploiement de l'api en production
define("MODE", "prod");

switch (MODE) {
    case "dev":
        // Configuration BD en local
        $_ENV['host'] = 'localhost';
        $_ENV['username'] = 'root';
        $_ENV['database'] = 'voitures';
        $_ENV['password'] = 'mysql';
        break;

    case "prod":
        // Configuration BD pour Heroku
        $_ENV['host'] = 'us-cdbr-east-05.cleardb.net';
        $_ENV['username'] = 'b05fb6439d9aa0';
        $_ENV['database'] = 'heroku_d9e9788dd0e2605';
        $_ENV['password'] = '1df8b643';
        break;
};