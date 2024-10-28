## About ToDoApp

ToDoApp is a web application to be used by colleagues to keep track of tasks assigned in the workplace. With this web app, you are able to keep track of things like:

- Who created the task,
- Who they assigned the task to,
- The task status,
- The task priority,
- Documents associated with the task.


## Types of Users

This Web App has a total of three(3) types of users.
- Super Admin
- Admin
- User

## Prerequisites

- PHP 8.3.11
- Laravel Framework 11.25.0
- MySQL
- Git
- Composer

### Download prerequisites

If you don't have PHP and Composer installed on your local machine, the following commands will install PHP, Composer, and the Laravel installer on macOS, Windows, or Linux:

**macOS:**
```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/mac)"
```
**Windows:**
```bash
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows'))
```
**Linux:**
```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/linux)"
```

## Setup

1. **Clone the repository:**
    ```bash
    git clone https://github.com/Ghyghi/LearningLaravel11.git
    cd LearningLaravel11
    ```

2. **Configure the database in `.env`.**  
   Create the MySQL database and name it "todo".

3. **Run the application:**
    ```bash
    php artisan serve
    ```


## Contributing

Thank you for considering contributing to the ToDoApp task tracking app!

Please follow these steps:

1. **Fork the repository.**
2. **Create a new branch (git checkout -b feature-branch).**
3. **Commit your changes (git commit -m 'Add new feature').**
4. **Push to the branch (git push origin feature-branch).**
5. **Open a pull request.**



## License

This project is licensed under the GNU GENERAL PUBLIC LICENSE (Version 3, 29 June 2007). Everyone is permitted to copy and distribute verbatim copies of this license document, but changing it is not allowed. For more details, see the [LICENSE]([LICENSE]) file.
