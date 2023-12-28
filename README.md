# Chatroom Website

Welcome to the Chatroom website, a real-time chat application with a user-friendly interface. This project aims to provide a seamless chatting experience with features like user authentication, room creation, friend management, and real-time state handling using AJAX.



## Table of Contents

1. [Introduction](#introduction)
2. [Folder Structure](#folder-structure)
3. [Classes](#classes)
4. [Configuration](#configuration)
5. [Functions](#functions)
6. [Assets](#assets)
7. [Javascript](#javascript)
8. [Controllers](#controllers)
9. [Diagrams](#diagrams)
10. [Models](#models)
11. [Views](#views)
12. [Additional Files](#additional-files)
13. [Links](#links)

## Introduction

The Chatroom website offers a set of features accessible through a user-friendly interface. Users can log in, register, manage their profile, create chat rooms, invite others, and interact with friends in real-time. The application is built with PHP and utilizes AJAX for efficient state management.

## Folder Structure

- **_classes:** Contains PHP classes responsible for different functionalities.
    - `Authentication.php`: Handles user authentication.
    - `Room.php`: Manages chat rooms.
    - `User.php`: Represents user-related operations.

- **_config:** Includes configuration files.
    - `config.php`: Configuration settings for the application.
    - [database.sql](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_Chat/blob/main/_config/database.sql): SQL script for setting up the database.
    - `db.php`: Database connection file.

- **_functions:** Holds PHP functions for various tasks.
    - `functions.php`: General-purpose functions.

- **assets:**
    - **css:** Stylesheets for the application.
        - `style.css`: Main stylesheet.
    - **img:** Image files used in the application.
        - `15Christmas-Lunch1-wvfg-threeByTwoSmallAt2X.webp`
        - `DSC00863.jpg`
        - `Sample_User_Icon.png`
        - `online-chat-rooms.jpg`
        - `online-chat-rooms.webp`
        - `png-clipart-computer-icons-crown-crown-svg-free-black-crown-image-file-formats-king.png`
    - **js:** JavaScript files.
        - `home.js`: JavaScript for home page.
        - `main.js`: Main JavaScript file.

- **controllers:** PHP files handling different parts of the application.
    - `home_controller.php`: Controller for the home page.
    - `login_controller.php`: Controller for user login.
    - `register_controller.php`: Controller for user registration.

- **diagrams:** UML diagrams illustrating the use case.
    - [usecase_diagram.png](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_Chat/blob/main/diagrams/usecase_diagram.png)
    - [mcd_diagrams.png](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_Chat/blob/main/diagrams/mcd_diagrams.png)

- **models:** PHP files containing the application's data logic.
    - `home_model.php`: Model for the home page.
    - `login_model.php`: Model for user login.
    - `register_model.php`: Model for user registration.

- **views:** PHP files rendering HTML content.
    - `_layout.php`: Common layout template.
    - `home_view.php`: View for the home page.
    - `login_view.php`: View for user login.
    - `register_view.php`: View for user registration.

- **.gitignore:** Specifies intentionally untracked files to be ignored by Git.

- **.htaccess:** Apache server configuration file.

- **404.html:** Custom 404 error page.

- **README.md:** Documentation file (this file).

- **index.php:** Main entry point for the application.

## Links

- [GitHub Repository](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_Chat)
- [Database SQL](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_Chat/blob/main/_config/database.sql)
- [Use Case Diagram](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_Chat/blob/main/diagrams/usecase_diagram.png)
- [MCD Diagram](https://github.com/Youcode-Classe-E-2023-2024/Benfillous-Anass_Chat/blob/main/diagrams/mcd_diagrams.png)

Feel free to explore the codebase and customize the application as needed. If you encounter any issues or have suggestions for improvement, please let us know. Happy chatting!
