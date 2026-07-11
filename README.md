# 📚 Library Management System

A full-featured Library Management System built with **Laravel**, designed to manage books, members, and borrow/return records — complete with image uploads and Eloquent relationships.

---

##  Features

- **Books Management** — Create, read, update, delete books with cover image upload
- **Members Management** — Manage library members with photo upload
- **Borrow & Return Tracking** — Track which member borrowed which book, and when it was returned
- **Eloquent Relationships** — `hasMany` and `belongsTo` relationships between Books, Members, and Borrow Records
- **Image Upload** — Upload, update, and auto-delete old images on update
- **Pagination** — Clean paginated listing for all modules
- **Custom UI/UX** — Tailwind CSS with custom delete confirmation modals and auto-dismissing success alerts
- **Form Validation** — Server-side validation with clear error messages

---

##  Tech Stack

- **Backend:** Laravel (PHP)
- **Database:** MySQL
- **Frontend:** Blade Templating + Tailwind CSS
- **Image Handling:** Laravel File Storage

---

##  Modules

| Module | Description |
|---|---|
| **Books** | Title, Author, Price, Category, Cover Image |
| **Members** | Name, Email, Phone, Address, Photo |
| **Borrow Records** | Links Books & Members with Borrow/Return dates |

---

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/library-management-laravel.git
   cd library-management-laravel
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Set up environment file**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database in `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=library_management
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. Visit `http://127.0.0.1:8000/book` in your browser 

---

## 🗄️ Database Structure

### Books Table
- `title`, `author`, `price`, `category`, `image`

### Members Table
- `name`, `email`, `phone`, `address`, `photo`

### Borrow Records Table
- `book_id` (foreign key), `member_id` (foreign key), `borrow_date`, `return_date`

---

##  Relationships

```php
// Book.php
public function borrowRecords()
{
    return $this->hasMany(BorrowRecord::class);
}

// Member.php
public function borrowRecords()
{
    return $this->hasMany(BorrowRecord::class);
}

// BorrowRecord.php
public function book()
{
    return $this->belongsTo(Book::class);
}

public function member()
{
    return $this->belongsTo(Member::class);
}
```

---

## 📸 Screenshots

> Add your project screenshots here after deployment

---

##  What I Learned

- Building complete CRUD operations from scratch
- Working with Eloquent relationships (`hasMany`, `belongsTo`)
- Image upload, update, and deletion handling in Laravel
- Form validation and error handling
- Route naming conventions and resource controllers
- Pagination and eager loading for performance
- Building clean, responsive UI with Tailwind CSS

---

##  Future Improvements

- [ ] Search and filter functionality
- [ ] REST API with Laravel Sanctum authentication
- [ ] Dashboard with statistics (total books, members, active borrows)
- [ ] Email notifications for due returns

---

## 👤 Author

**Luqman**
Web Development Learner — building practical projects to become a junior Laravel developer.

---

## 📄 License

This project is open-sourced for learning purposes.
