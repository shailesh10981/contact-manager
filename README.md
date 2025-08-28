# Contact Manager - Laravel CRUD Application

A Laravel-based contact management system with XML bulk import functionality.

## Features

- **CRUD Operations**: Create, Read, Update, and Delete contacts
- **XML Bulk Import**: Import multiple contacts from XML files
- **Responsive Design**: Clean, professional interface using Bootstrap
- **Database Support**: SQLite database for easy setup
- **Form Validation**: Server-side validation for all inputs
- **Success/Error Messages**: User-friendly feedback system

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL

## Installation

1. **Extract the project files**
   ```bash
   unzip contact-manager.zip
   cd contact-manager
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Set up environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   - The project is pre-configured to use MySQL.
   - Update your `.env` file with the correct database credentials:
    
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
   ```bash
   touch database/database.sqlite
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Open your browser and go to `http://localhost:8000`

## Usage

### Adding Contacts
1. Click "Add New Contact" or "Add First Contact"
2. Fill in the name and phone number
3. Click "Save Contact"

### Importing from XML
1. Click "Import XML" in the navigation or main page
2. Select an XML file with the following format:
   ```xml
   <contacts>
       <contact>
           <name>John Doe</name>
           <phone>+1 234 567 8900</phone>
       </contact>
       <contact>
           <name>Jane Smith</name>
           <phone>+1 234 567 8901</phone>
       </contact>
   </contacts>
   ```
3. Click "Import Contacts"

### Managing Contacts
- **View**: Click the eye icon to view contact details
- **Edit**: Click the pencil icon to edit contact information
- **Delete**: Click the trash icon to delete a contact (with confirmation)


## Technical Details

- **Framework**: Laravel 10.x
- **Database**: MySQL
- **Frontend**: Bootstrap 5.1.3
- **Validation**: Laravel's built-in validation
- **File Upload**: Handles XML files up to 2MB
- **XML Processing**: Uses PHP's SimpleXML for parsing




## Development Notes

- The application uses SQLite for simplicity and portability
- All views are responsive and mobile-friendly
- Form validation includes both client-side and server-side checks
- Success and error messages are displayed using Laravel's session flash data
- The XML import validates file type and size before processing
