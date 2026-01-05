Restaurant Management System 

A full-stack PHP web application for managing a restaurant's menu, reservations, and orders.

1 Setup Instructions

Prerequisites
- **XAMPP** (or any PHP/MySQL environment)
- **Web Browser**

### Installation Steps
1.  **Clone/Download** this project into your server's root directory (e.g., `C:\xampp\htdocs\web-project`).
2.  **Start Apache & MySQL** via the XAMPP Control Panel.
3.  **Import the Database** (see Migration Steps below).
4.  **Open the Application**:
    -   Go to: `http://localhost/web-project/index.php` (Login Page)
    -   Or: `http://localhost/web-project/homepage.php` (Main Page)

---------------------------------------------------------

2 Database Migration Steps

To ensure the application runs correctly, you must set up the database.

1.  **Open phpMyAdmin**:
    -   Navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2.  **Create Database**:
    -   Click **New** on the sidebar.
    -   Database Name: `restaurant_data`
    -   Click **Create**.
3.  **Import Schema**:
    -   Select the `restaurant_data` database.
    -   Go to the **Import** tab.
    -   Click **Choose File** and select `restaurant_data (1).sql` from the project folder.
    -   Click **Import** (or Go).
4.  **Verify**:
    -   Ensure tables like `user`, `dishes`, `reservation`, `services`, `site_content`, and `contact_messages` appear.

---------------------------------------------------------

3 API Documentation

The application uses standard PHP form submissions and AJAX requests. Below are the key endpoints.

Authentication (`register.php`)

#### 1. Sign Up
Creates a new user account.
-   **URL**: `/register.php`
-   **Method**: `POST`
-   **Parameters**:
    -   `signUp` (required): Value can be anything (e.g., "1").
    -   `fName`: First Name.
    -   `lName`: Last Name.
    -   `email`: User Email.
    -   `password`: User Password.
-   **Response**: Redirects to `homepage.php` on success.

#### 2. Sign In
Authenticates a user.
-   **URL**: `/register.php`
-   **Method**: `POST`
-   **Parameters**:
    -   `signIn` (required): Value can be anything.
    -   `email`: User Email.
    -   `password`: User Password.
-   **Response**: Redirects to `homepage.php` on success; prints error on failure.

2 Shopping Cart

#### 3. Add to Cart (`add_to_cart.php`)
Adds a dish to the session-based cart.
-   **Method**: `POST`
-   **Parameters**:
    -   `id`: The ID of the dish to add.
-   **Response**: Integer representing the total number of items in the cart (e.g., `5`).

#### 4. Update Cart (`update_cart.php`)
Increases or decreases item quantity in the cart.
-   **Method**: `POST`
-   **Parameters**:
    -   `id`: The ID of the dish.
    -   `action`: Either `'increase'` or `'decrease'`.
-   **Response (JSON)**:
    ```json
    {
      "qty": 3,
      "subtotal": 45.00,
      "total": 120.00,
      "totalItems": 5
    }
    ```

2 Contact

#### 5. Send Message (`send_message.php`)
Submits a contact form message.
-   **Method**: `POST`
-   **Parameters**:
    -   `name`: Sender's name.
    -   `email`: Sender's email.
    -   `message`: The message content.
-   **Response**: Redirects to `homepage.php?contact_success=1` on success.

---

##  Admin Panel
To access the admin panel:
1.  **Register/Login** as a user.
2.  **Update Role**: Manually update your user's `role` to `'admin'` in the database (`user` table) via phpMyAdmin.
3.  **Access**: `http://localhost/web-project/admin_dashboard.php`
