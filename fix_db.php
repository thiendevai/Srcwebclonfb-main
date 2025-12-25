<?php
define("IN_SITE", true);
require_once(__DIR__."/libs/db.php");
$CMSNT = new DB();

// Create spin_item table
$sql = "CREATE TABLE IF NOT EXISTS `spin_item` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `spinid` int(11) NOT NULL DEFAULT 0,
    `name` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$CMSNT->query($sql);

echo "Table spin_item created successfully.";

// Check if spin_option has data, if so, populate spin_item?
// For now, empty table stops the crash (loop over empty list).
?>
