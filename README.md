# Blog Project

This is a Laravel project for a simple blog application that includes user authentication, post management, and comment functionality.

IF you get an error saying personal token table doens't exist run this command : php artisan migrate --path=/vendor/laravel/sanctum/database/migrations
## Table of Contents

- [Database Schema](#database-schema)
  - [Users Table](#users-table)
  - [Posts Table](#posts-table)
  - [Comments Table](#comments-table)
- [API Endpoints](#api-endpoints)
  - [Authentication](#authentication)
  - [Posts](#posts)
  - [Comments](#comments)
- [Features](#features)
  - [Set Up Authentication](#set-up-authentication)
  - [Build Models and Relationships](#build-models-and-relationships)
  - [Validation](#validation)
  - [Search and Filters](#search-and-filters)
- [Optional Bonus Features](#optional-bonus-features)
- [Expected Outcome](#expected-outcome)

---

## Database Schema

### Users Table

| Column       | Type     | Description               |
|--------------|----------|---------------------------|
| id           | Integer  | Primary key               |
| first_name   | String   | User's first name         |
| last_name    | String   | User's last name          |
| phone        | Integer  | User's phone              |
| email        | String   | Unique email             |
| password     | String   | Encrypted password        |
| created_at   | Timestamp | Timestamp of creation     |
| updated_at   | Timestamp | Timestamp of last update |

### Posts Table

| Column       | Type     | Description               |
|--------------|----------|---------------------------|
| id           | Integer  | Primary key               |
| user_id      | Foreign Key | References `users(id)`  |
| title        | String   | Post title               |
| content      | Text     | Post content             |
| created_at   | Timestamp | Timestamp of creation     |
| updated_at   | Timestamp | Timestamp of last update |

### Comments Table

| Column       | Type     | Description               |
|--------------|----------|---------------------------|
| id           | Integer  | Primary key               |
| user_id      | Foreign Key | References `users(id)`  |
| post_id      | Foreign Key | References `posts(id)`  |
| content      | Text     | Comment content          |
| created_at   | Timestamp | Timestamp of creation     |
| updated_at   | Timestamp | Timestamp of last update |

---

## API Endpoints

### Authentication
- **POST** `/api/register` - Register a new user.
- **POST** `/api/login` - Log in and get a token.
- **POST** `/api/logout` - Log out (invalidate the token).

### Posts
- **GET** `/api/posts` - List all posts (with search and filter options).
- **GET** `/api/posts/{id}` - View a single post.
- **POST** `/api/posts` - Create a new post (requires authentication).
- **PUT** `/api/posts/{id}` - Update a post (owner only).
- **DELETE** `/api/posts/{id}` - Delete a post (owner only).

### Comments
- **GET** `/api/posts/{post_id}/comments` - List all comments for a post.
- **POST** `/api/posts/{post_id}/comments` - Add a comment to a post.
- **PUT** `/api/comments/{id}` - Update a comment (owner only).
- **DELETE** `/api/comments/{id}` - Delete a comment (owner only).

---

## Features

### Set Up Authentication
Use **Laravel Sanctum** for token-based authentication.

### Build Models and Relationships
Define relationships:
- **User** has many **Post**.
- **Post** has many **Comment**.
- **Comment** belongs to **User** and **Post**.

### Validation
Validate input for all endpoints:
- Email format
- Required fields
- File types (if applicable)

### Search and Filters
- Search posts by title and content.
- Filter posts by user ID.

---

## Optional Bonus Features
- **Pagination**: Paginate the list of posts and comments.
- **Likes System**: Allow users to "like" posts and comments.
- **Role-Based Permissions**: Implement roles (e.g., admin, user) to restrict certain actions.

---

## Expected Outcome
By completing this project, you will gain practical experience in:
- Setting up and using **Laravel Sanctum**.
- Creating and consuming **RESTful APIs**.
- Handling relationships in **Eloquent**.
- Validating user input.
- Building scalable and secure web applications.
