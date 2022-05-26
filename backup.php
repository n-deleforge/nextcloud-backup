<?php
// ===========================
// ================== SETTINGS

// Variables
$pathBackup = "/path/to/backup/folder"; // Path to the backup folder on the machine which uses the script
$nextcloudURL = "https://my-nextcloud.com"; // URL of your Nextcloud instance
$username = "John"; // Username of the Nextcloud account where the calendars and contact lists must be backup
$password = "12345"; // Password correspondind to the username

// Calendars and contact lists to backup
$exports = [
    // Create as much arrays as needed, one for each calendar or contact list
    [
        "type" => "", // calendar if it's a calendar, contact if it's a contact list
        "nextcloudName" => "", // name of the calendar / contact list in your Nextcloud instance ~ it can be somethings like : my-contacts
        "backupName" => "" // name of the generated file
    ],
];

// ===========================
// ==================== EXPORT

foreach ($exports as $export) {
    // Check if it's a calendar or a contact list
	if ($export["type"] === "calendar") {
		$extension = "ics";
		$pathFile = "calendars";
	}
	else {
		$extension = "vcf";
		$pathFile = "addressbooks/users";
	}

    // Open file for the backup
    $file = fopen($pathBackup . $export["backupName"] . "." . $extension, "w");

    // Curl request with options
    $request = curl_init();
    $options = [
        CURLOPT_URL => $nextcloudURL . 'remote.php/dav/' . $pathFile . '/' . $username . '/' . $export["nextcloudName"] . '/?export',
        CURLOPT_USERNAME => $username,
        CURLOPT_PASSWORD => $password,
        CURLOPT_TIMEOUT => 5,
        CURLOPT_FILE => $file
    ];

    // Execution of the curl request
    curl_setopt_array($request, $options);
    curl_exec($request);

    // Debug info
    $statusCode = curl_getinfo($request, CURLINFO_HTTP_CODE);
    echo $export["backupName"] . " - code status : " . $statusCode . "\n";
    echo $nextcloudURL . 'remote.php/dav/' . $file_path . '/' . $username . '/' . $export["nextcloudName"] . '/?export' . "\n\n";

    // Close request
    curl_close($request);
};