<?php

// Create DateTime object from ISO 8601 string
$date = new DateTime('2024-12-29T20:14:44+01:00');

// Format the date in various useful PHP formats
echo "Full ISO 8601: " . $date->format('c') . "\n";
echo "Date: " . $date->format('Y-m-d') . "\n";
echo "Time: " . $date->format('H:i:s') . "\n";
echo "Timezone: " . $date->format('P') . "\n";
echo "Timestamp: " . $date->getTimestamp() . "\n";

// You can also get individual components
echo "\nIndividual components:\n";
echo "Year: " . $date->format('Y') . "\n";
echo "Month: " . $date->format('m') . "\n";
echo "Day: " . $date->format('d') . "\n";
echo "Hour: " . $date->format('H') . "\n";
echo "Minute: " . $date->format('i') . "\n";
echo "Second: " . $date->format('s') . "\n";
