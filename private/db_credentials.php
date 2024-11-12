<?php

// Keep database credentials in a separate file
// 1. Easy to exclude this file from source code managers
// 2. Unique credentials on development and production servers
// 3. Unique credentials if working with multiple developers

// localhost
define("DB_SERVER", "localhost");
define("DB_USER", "sabirdsUser");
define("DB_PASS", "cassowary");
define("DB_NAME", "sabirds");

// a2hosting
// define("DB_SERVER", "localhost");
// define("DB_USER", " charli12_chain_gang");
// define("DB_PASS", 'RF2"JfXC9^e5t.2');
// define("DB_NAME", "charli12_chain_gang");
