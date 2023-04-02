# Php-API-In-and-Out
<i>Daily News Scraper</i>

This is a PHP script that scrapes the latest news from the MediaStack API, saves it to a MySQL database, and retrieves the latest news as a JSON response.
## Requirements

To use this script, you'll need:

    PHP 7.0 or higher
    MySQL server
    MediaStack API key

## Installation

    Clone this repository to your local machine or web server.
    Create a new MySQL database for the project.
    Copy the config.example.php file to config.php and update the configuration settings to match your environment.
    Run the scrape.php file to scrape the latest news and save it to the database.
    Use the retrieve.php file to retrieve the latest news as a JSON response.

## Configuration

Before you can use this script, you'll need to update the configuration settings in the config.php file. Here are the available configuration options:

    $db_host: The MySQL database host.
    $db_user: The MySQL database username.
    $db_pass: The MySQL database password.
    $db_name: The MySQL database name.
    $api_key: Your MediaStack API key.
    $api_url: The URL to the MediaStack API.
    $api_params: Additional parameters to pass to the MediaStack API.

## Usage

To use this script, follow these steps:

    Run the scrape.php file to scrape the latest news and save it to the database. You can do this by executing the following command in your terminal or command prompt:

> php scrape.php

Use the retrieve.php file to retrieve the latest news as a JSON response. You can do this by navigating to the retrieve.php file in your web browser or executing the following command in your terminal or command prompt:

    php -S localhost:8000

Then, go to http://localhost:8000/retrieve.php to retrieve the latest news as a JSON response.

### Made With ❤️ By Innocent Kisheo
