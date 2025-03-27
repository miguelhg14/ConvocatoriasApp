<?php

$environmet = "local";
define('INACTIVE_TIME', value: 1);
define("MAIN_APP_ROUTE", value: __DIR__ . "/../app/");

if ($environmet == "local") {
    define("DRIVER", "mysql");
    define("HOST", "localhost");
    define("DATABASE", "convocatoriasbd");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("CHARSET", "uft8mb4");
    define("COLLATION", "utf8mb4_unicode_ci");
} else {
    define("DRIVER", "mysql");
    define("HOST", "sql303.infinityfree.com");
    define("DATABASE", "if0_38454422_gym_sena");
    define("USERNAME", "if0_38454422");
    define("PASSWORD", "dcD95PSfFEnHA6p");
    define("CHARSET", "uft8mb4");
    define("COLLATION", "utf8mb4_unicode_ci");
}
