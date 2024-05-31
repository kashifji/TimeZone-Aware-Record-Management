TimeZone-aware Record Management System

Run Demo app at https://recordsmanager.kashifamin.dev

Description

The Timezone Management Application is a Laravel-based system designed for managing records with timezone-sensitive details. It is ideal for users who need to manage time-specific data across various global locations and ensures that all time data is presented in the correct local context.
Features

    User Authentication: Secure login and registration system.
    Record Management: Users can create, view, edit, and delete records. Only the owner of a record can modify or delete it.
    Timezone Conversion: Automatically adjusts record timestamps to reflect the user's local timezone.

Timezone Handling

The application implements a robust timezone handling system with several fallback mechanisms to ensure accuracy and user-specific timezone adjustments:

    Client-Side Detection: Initially, the application attempts to determine the user's timezone from the client-side using JavaScript.
    Server-Side Detection: If client-side detection fails, the application uses server-side logic based on the user's IP address to estimate the timezone.
    User Preference: If both automatic detections fail, the application falls back to a timezone specified in the user's profile settings.
    UTC Default: In the absence of valid timezone information from the above methods, the application defaults to Coordinated Universal Time (UTC).

These mechanisms ensure that the application can reliably present and manage time data in a way that is most relevant to each user, regardless of their global location.
Prerequisites

Before you begin, ensure you have the following installed:

    PHP >= 8.2
    Composer
    Node.js and NPM
    MySQL

Installation

    Clone the repository:

git clone https://github.com/kashifji/TimeZone-Aware-Record-Management.git

cd TimeZone-Aware-Record-Management

Install PHP dependencies:

composer install

Install NPM packages:
npm install
npm run dev

Set up your environment file:
Update the .env file to suit your database.

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
