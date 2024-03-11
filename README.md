
# Rentacar

## Description

RentACar is a collaborative school assignment project built using Laravel with a theme related to cars. The website serves as a car rental platform where users can sign up, log in, search for cars based on start date, end date, pickup location, and the number of passengers. Users can then proceed to book the desired car. Additionally, users can view their booked cars, edit bookings, and delete them as needed.

This project was developed by [Hugo Sandsjö](https://github.com/hugosandsjo) and [Emil Årebrink](https://github.com/arebrinkemil).


## Installation

```bash
# Clone the repository
git clone https://github.com/hugosandsjo/rentacar.git

# Install dependencies
composer install

# Create a copy of the .env.example file and rename it to .env
cp .env.example .env

# Update the database configuration details in the .env file

# Then generate the application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Seed the database
php artisan db:seed

# Start the development server
php artisan serve

```
