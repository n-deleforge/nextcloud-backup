![Header](/docs/header.png)

<div align="center">

[![GitHub license](https://img.shields.io/github/license/n-deleforge/nextcloud-backup?style=for-the-badge)](https://github.com/n-deleforge/nextcloud-backup/blob/main/LICENSE)
![GitHub last commit](https://img.shields.io/github/last-commit/n-deleforge/nextcloud-backup?style=for-the-badge)
[![GitHub forks](https://img.shields.io/github/forks/n-deleforge/nextcloud-backup?style=for-the-badge)](https://github.com/n-deleforge/nextcloud-backup/network)
[![GitHub stars](https://img.shields.io/github/stars/n-deleforge/nextcloud-backup?style=for-the-badge)](https://github.com/n-deleforge/nextcloud-backup/stargazers)
[![Paypal](https://img.shields.io/badge/DONATE-PAYPAL.ME-lightgrey?style=for-the-badge)](https://www.paypal.com/paypalme/nicolasdeleforge)

</div>

# Features 

- Easy install, no dependencies needed.
- Can be automated by your computer or your server.

# Quick start

- Download the `backup.php`file.
- Edit the settings according your Nextcloud instance and your needs (see the configuration part below).
- Launch the script, either manually, either by automatisation.

## Configuration

### Basic settings

```PHP
$pathBackup = "/path/to/backup/folder"; // Path to the backup folder on the machine which uses the script
$nextcloudURL = "https://my-nextcloud.com"; // URL of your Nextcloud instance
$username = "John"; // Username of the Nextcloud account where the calendars and contact lists must be backup
$password = "12345"; // Password correspondind to the username
```

### Calendar and contacts list settings
For each calendar and each contact list, you have to add an array to the `$exports` array.

```PHP
[
    "type" => "contact", // calendar if it's a calendar, contact if it's a contact list
    "nextcloudName" => "my-contacts", // name of the calendar / contact list in your Nextcloud instance ~ it can be somethings like : my-contacts
    "backupName" => "My Contacts" // name of the generated file
],
```


# Changelog

- 0.1 : initial release.