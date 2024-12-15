<p align="center"><img src="https://quiz.konfhub.com/assets/logo-dark-ad176dfd.svg" width="400" alt="Laravel Logo"></p>

<p align="center"><b>Note</b> : Please read the entire documentation carefully from A to Z</p>

## Project Description:

This is a small quiz test application (as described in the documentation). Through this application, multiple users can participate in quiz tests. However, before participating in a quiz test, the user must be an *approved user*. If the user is approved, the admin can grant permission for the user to take a quiz. Once the user submits the quiz, they can immediately see their results. The admin has full control over all functionalities in the application. Below, we will discuss these features in detail. But first, let’s learn how to set up this project on your local machine.

---

## Technologies Used

This application is built using the following technologies:

- **PHP** (Backend Language)
- **Laravel Framework** (v8+)
- **MySQL** (Relational Database)
- **JavaScript** (Frontend Logic)

---

## How to Set Up the Project Locally

- To set up this small project, you must have a local server installed on your machine. It can be [Xampp](https://www.apachefriends.org/), [WampServer](https://www.wampserver.com/en/download-wampserver-64bits/), or [Laragon](https://laragon.org/). Before installing the local server, make sure PHP >= 8.0 or any latest version is installed along with [composer.exe](https://getcomposer.org/download/). If you face issues installing the local server, you can refer to this YouTube video: [How to install Xampp Server in Windows](https://youtu.be/FG_tpCCFwOQ).
- Clone the project from GitHub. After cloning, run the command `composer install` to download the necessary packages into the *vendor* folder.
- Inside the project, there is a file named `.env.example`. Duplicate and rename it to `.env`.
- Create a database. We are using MySQL as the database. Once the database is created, connect it in the `.env` file:
    ```bash
    php artisan key:generate
    php artisan migrate
    ```
- If everything works fine, run the above commands and then run the following command to seed some fake data, including two *approved accounts*:
    ```bash
    php artisan db:seed
    ```
- To run the project, use the following command and visit [http://127.0.0.1:8000/](http://127.0.0.1:8000/) in your browser:
    ```bash
    php artisan serve
    ```

## Login

- At the beginning, you will see a login form. Both the Admin and approved Users can log in to their respective dashboards using this form. The registration form provided is only for users since Admin does not require a registration form.
- If a user registers, they will not be allowed to log in until the Admin approves their account.
- Here are two approved accounts for testing:
    ```bash
    admin@gmail.com
    password: 000000

    user@gmail.com
    password: 000000
    ```

# Admin Dashboard

## User List

- If you log in as an Admin, you will see a "User List" link in the sidebar. Click on it.
- Here, all users except the Admin are listed.
- From this User List, you can approve or reject a user, as well as view details, edit, or delete user accounts.

## Add Quiz

- When you click the "Add Quiz" link, you will see a list of quizzes you have created. To create a new quiz, click on the "Add Quiz" button at the top right, and a modal popup will appear. Provide the required information in the modal to create the quiz.
- After creating a quiz, you can add questions to it. You will see a "Create Question" button. Click on it to add questions. You can also edit or delete the quiz as needed.
- To view all the questions under a specific quiz, click on the "View Question" button. Here, you can see all questions and perform edit or delete operations on them.

## Exam Attend

- In the "Exam Attend" section, you can create an *Exam Group*. Click on the "Add Exam Group" button at the top right, and a modal popup will appear.
- First, select a quiz and set a time duration for it. Users will need to submit the quiz within this time; otherwise, the quiz will be considered rejected.
- Next, select the users who are allowed to attend the quiz.
- Only the selected users will be able to participate in the quiz.
- After creating the Exam Group, you will see the quiz title and the selected users/candidates.
- There is a "View Result" button, which shows the results of the selected users who participated in the quiz. Each user also has a "View Details" button where you can see which questions were answered correctly (marked green) and incorrectly (marked red), along with their *pass marks* and *total score*.
- Each question is assigned a mark of 5. Users must score at least 70% of the total marks to pass.
- A user can only take a specific quiz once.
