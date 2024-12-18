# Laravel Auth with Roles and Permissions

A Laravel project featuring an advanced authentication system integrated with roles and permissions management. This setup ensures secure access control for your application and allows assigning users specific roles with granular permissions.

## Features
- User authentication (Login, Registration, Password Reset)
- Role-based access control (RBAC)
- Assign multiple roles to users
- Fine-grained permissions system
- Middleware to restrict access based on roles or permissions
- Easy-to-use UI for role and permission management
- Built on [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/)

## Prerequisites
Ensure you have the following installed:
- PHP >= 8.1
- Composer
- Laravel 10.x
- MySQL / MariaDB or other supported database
- Node.js and npm (for frontend assets)

## Installation
Follow these steps to set up the project:

-  **Clone the Repository**
   ```bash
   git clone https://github.com/ariful305/Laravel-Auth-with-Roles-and-Permission.git
   cd Laravel-Auth-with-Roles-and-Permission
   ```
- **Install Dependencies**
  ```bash
    composer install
    npm install
     ```
- **Environment Setup**
  ```bash
     cp .env.example .env
  ```
- **Run Migrations and Seeders**
  ```bash
    php artisan migrate --seed
  ```
- **Run the Application**
  ```bash
    php artisan serve
  ```

Access the app in your browser at http://localhost:8000.

## Usage
Visit the /login route to authenticate as a user.
Admins can access the Role and Permission management dashboard.
Use predefined roles and permissions or create custom ones via the admin UI.

## Contributing
Contributions are welcome! Please fork the repository, create a feature branch, and submit a pull request.

## License
This project is licensed under the MIT License.

## Acknowledgments
- Laravel
- Spatie Laravel Permission

## Contact
If you have any questions or issues, feel free to open an issue.