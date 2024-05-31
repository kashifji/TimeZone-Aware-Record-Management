Timezone Management Application
Description

The Timezone Management Application is a Laravel-based system that allows users to manage records with time-specific details adjusted according to different timezones. It is designed to be simple yet effective for users needing to handle time-sensitive data across various global locations.
Features

    User Authentication: Secure login and registration system.
    Record Management: Create, view, edit, and delete records. Records are tied to the creator, and only the owner can modify or delete these entries.
    Timezone Conversion: Automatically adjusts record timestamps based on the user's local timezone.

Prerequisites

Before you begin, ensure you have the following installed:

    PHP >= 8.2
    Composer
    Node.js and NPM
    MySQL

Installation

    Clone the repository:

git clone https://github.com/your-username/your-project-name.git
cd your-project-name

Install PHP dependencies:

composer install

Install NPM packages:

npm install
npm run dev

Set up your environment file

Update the .env file to suit your database and mail settings.

Generate an application key:

php artisan key:generate

Run the database migrations:

php artisan migrate

Running the Application

Start the server with:

php artisan serve

This command will launch the server at http://localhost:8000, where you can start interacting with the application.
Using the Application

    Register/Log in: Start by registering a new user or logging in.
    Manage Records: Once logged in, you can create new records, view them in a list, and select individual records to edit or delete.

