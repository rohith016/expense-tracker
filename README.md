# Expense Tracker Application

- User '/' or '/login' to login the application
- Use '/register' to access the application as a user

## installation

- clone the repository
- run `composer install`
- run `npm install && npm run dev`
- connect database via .env
- run `php artisan key:generate`
- run `php artisan migrate` to load the schema
- run `php artisan db:seed` to load dummy data for users and categories (if needed)
- run `php artisan serve`

## Screenshots

- Login Page

<img src="public/screenshots/login.png" width="400" height="400">

- Dashboard

<img src="public/screenshots/dashboard.png" width="750" height="400">

- Categories List

<img src="public/screenshots/category.png" width="750" height="400">

- Expense List 

<img src="public/screenshots/expense_list.png" width="750" height="400">


- Expense Form


<img src="public/screenshots/expense_create_form.png" width="750" height="400">
