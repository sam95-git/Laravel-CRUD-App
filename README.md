# Laravel CRUD Application

Welcome to my Laravel CRUD application! This project was created to explore and learn Laravel's features and best practices while implementing a basic CRUD (Create, Read, Update, Delete) functionality.

## App UI

### Home Page
![Home Page](https://github.com/sam95-git/Laravel-CRUD-App/blob/master/screenshots/Home.png)

### Login and Registration
<div style="display: flex; justify-content: space-between;">

![Registration Page](https://github.com/sam95-git/Laravel-CRUD-App/blob/master/screenshots/rgister.png)

![Login page](https://github.com/sam95-git/Laravel-CRUD-App/blob/master/screenshots/login.png)

</div>

### User Dashboard
![User Dashboard](https://github.com/sam95-git/Laravel-CRUD-App/blob/master/screenshots/dashboard.png)

### All Posts
![posts page](https://github.com/sam95-git/Laravel-CRUD-App/blob/master/screenshots/all-posts.png)

### Edit and Delete Posts
![edit posts page](https://github.com/sam95-git/Laravel-CRUD-App/blob/master/screenshots/show-post.png)

## Features

- **Create:** Add new items to the database.
- **Read:** View a list of all items in the database.
- **Update:** Edit and update existing items.
- **Delete:** Remove items from the database.

In addition to basic CRUD operations, this Laravel CRUD application includes the following features:

- **Authentication:** Secure user authentication has been implemented using Laravel's built-in authentication system. Users can register, log in, and log out.

- **Access Control:** Role-based access control (RBAC) has been implemented to restrict access to certain features based on user roles. There are roles such as "admin," "editor," and "user," each with different levels of access.

- **File Uploading:** The application supports file uploading. Users with the necessary permissions can upload files, and the files are stored securely on the server.

## Technologies Used

- **Laravel:** [Official Laravel Website](https://laravel.com/)
- **Database:** [MySQL](https://www.mysql.com/)

## Setup

Follow these steps to set up and run the project locally:

1. Clone the repository to your local machine.

   ```bash
   git clone git@github.com:sam95-git/Laravel-CRUD-App.git

2. Install dependencies

    ```bash
    npm install   
    
3. create a database and import the provided sql file, update database credentials in .env file 
   
   ```bash
   https://github.com/sam95-git/Laravel-CRUD-App/blob/master/laravelapp.sql

4. Run the application

    ```bash
    npm start      

5. Access the application

    Open your browser and go to http://localhost/yourfolder/public/
