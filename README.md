# Laravel, Vuejs & Pinia Todo App

## Getting Started

These instructions will guide you through setting up the project on your local machine.

### Prerequisites

You need to have installed the following software:

- PHP >= 8.1
- Composer 2.0.0
- Node 20.18.0

### Installing

Follow these steps to set up a development environment:

1. **Clone the repository**

    ```bash
    git clone https://github.com/shakeelbajeeda/laravel-vuejs-todo-app.git
    ```

2. **Install dependencies**

    ```bash
    composer install
    ```

3. **Copy the .env.example file and rename it to .env**

    ```bash
    cp .env.example .env
    ```

4. **Generate the application key**

    ```bash
    php artisan key:generate
    ```

5. **Run migration**

    ```bash
    php artisan migrate
    ```

6. **Run project**

    ```bash
    php artisan serve
    ```
   

## Setup Vuejs Application

- Follow below instructions to setup vuejs application

1. **Go inside the `vuejs-application` directory**
    ```bash
    cd vuejs-application
    ```

2. ** Copy .env.example and rename it with .env **
    ```bash
    cp .env.example .env
    ```

3. ** Install Dependencies **
    ```bash
    npm install
    ```
   
4. ** Now run project using below command **
     ```bash
        npm run dev
     ```
