# Progetto Eco

Progetto Eco is an eco-sustainability blog developed in PHP using the Model-View-Controller (MVC) architectural pattern.

Originally created as a high school project, it combines content management, user interaction, and database integration in a web application focused on environmental sustainability.

**[Live Demo](https://progettoeco.altervista.org)**

## Features

* **Article Management:** Create, view, edit, and delete articles.
* **Category Management:** Organize articles into categories.
* **User Management:** User accounts, profiles, and content ownership.
* **Comment System:** Allow users to interact with articles through comments.
* **Content Moderation:** Require approval before articles are published.
* **Image Uploads:** Associate images with articles.
* **Article Search:** Search for articles by title.
* **Administrative Features:** Manage content and moderate article submissions.

## Tech Stack

| Technology      | Purpose                           |
| --------------- | --------------------------------- |
| PHP             | Server-side application logic     |
| MySQL           | Relational database               |
| MySQLi          | Database connectivity and queries |
| HTML5           | Page structure                    |
| CSS3            | Styling and layout                |
| JavaScript      | Client-side interactions          |
| XAMPP           | Local development environment     |
| MVC             | Application architecture          |

## Project Structure

```text
ProgettoEco/
├── assets/         # Static assets
├── controllers/    # Request handling and application logic
├── includes/       # Shared components and configuration
├── models/         # Data models and database operations
├── views/          # User interface and application pages
├── progettoeco.sql # Database schema and sample data
├── LICENSE
└── README.md
```

## Installation

### Prerequisites

* PHP
* MySQL or MariaDB
* Apache or another compatible web server
* [XAMPP](https://www.apachefriends.org/) (recommended for local development)
* [Git](https://git-scm.com/) (optional)

### 1. Clone the repository

```bash
git clone https://github.com/giova2217/ProgettoEco.git
```

### 2. Configure the local environment

Move the project directory into your web server's document root.

For XAMPP on Windows, use:

```text
C:\xampp\htdocs\ProgettoEco
```

Start Apache and MySQL from the XAMPP Control Panel.

### 3. Set up the database

1. Open [phpMyAdmin](http://localhost/phpmyadmin).
2. Create a database named `progettoeco`.
3. Import the `progettoeco.sql` file into the database.
4. Check the database connection configuration in the project and update the credentials to match your local environment.

### 4. Run the application

Open the project through your local web server:

```text
http://localhost/ProgettoEco/
```

If the root URL does not load the application, open the appropriate entry point within the project, based on its current configuration.

## Database Structure

The application uses a relational database with the following main tables:

| Table        | Description                                                              |
| ------------ | ------------------------------------------------------------------------ |
| `users`      | Stores user account information                                          |
| `articles`   | Stores article content, authors, categories, images, and approval status |
| `categories` | Stores article categories                                                |
| `comments`   | Stores comments associated with users and articles                       |

The database schema and sample data are provided in `progettoeco.sql`.

## Architecture

The application follows the **Model-View-Controller (MVC)** pattern to separate the main responsibilities of the application:

* **Models:** Handle data access and database operations.
* **Views:** Present content and provide the user interface.
* **Controllers:** Process requests and coordinate application logic.
* **Includes:** Provide shared components and configuration.

This structure helped me understand how to organize a PHP application and separate presentation, data access, and request handling.

## What I Learned

Developing Progetto Eco gave me practical experience with:

* Building a dynamic web application using PHP.
* Designing and interacting with a relational database.
* Implementing CRUD operations.
* Organizing application code using the MVC pattern.
* Managing user-generated content and article moderation.
* Handling form submissions and image uploads.
* Connecting frontend interfaces to backend logic.

## Contributing

Progetto Eco is a learning project, and constructive feedback is welcome.

For major changes, please open an issue first to discuss the proposed improvement.

## Contact

For questions about this project, feedback, or professional inquiries, feel free to contact me at:

**[giovanni.trupia.dev@gmail.com](mailto:giovanni.trupia.dev@gmail.com)**

## License

This project is distributed under the **GNU General Public License v3.0**. See the [`LICENSE`](LICENSE) file for details.

## Disclaimer

Progetto Eco was developed as a high school project within a limited timeframe. It represents a learning experience in web development rather than a production-ready application.

The codebase may require additional testing, security improvements, and maintenance before being used in a production environment.
