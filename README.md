# ![Coding Test - Football Matches Mini Application]

# Getting started

## Installation

Clone the repository

    git clone git@github.com:nazzalra/football-match-app.git

Switch to the repo folder

    cd football-match-app

Install all the dependencies using composer

    composer install
    
Install node dependencies using npm

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start Vite Dev Server or Build Asset

    npm run dev
    npm run build

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

