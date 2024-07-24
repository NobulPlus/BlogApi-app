Laravel Blog API
This project is a simple blog API built with Laravel. It allows users to create, read, update, and delete blogs and posts. Additionally, it includes features for liking and commenting on posts.

Prerequisites
PHP >= 7.4
Composer
Laravel >= 8.x
MySQL or any other supported database

Setup Instructions
1. Clone the Repository
git clone https://github.com/NobulPlus/BlogApi-app.git
cd yourproject

2. Install Dependencies
composer install

3. Set Up Environment
Copy the example environment file and configure the environment variables:
cp .env.example .env

Edit the .env file to set your database credentials and other necessary configurations:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabase
DB_USERNAME=yourusername
DB_PASSWORD=yourpassword

4. Generate Application Key
php artisan key:generate

5. Run Migrations
php artisan migrate

6. Seed the Database
php artisan db:seed

7. Start the Development Server
php artisan serve
The application will be available at http://localhost:8000.

API Endpoints || Blog Endpoints || View All Blogs

GET - /api/blogs

Create Blog
POST - /api/blogs

Request Body:
{
    "title": "Blog Title",
    "description": "Blog Description"
}

View a Specific Blog
GET - /api/blogs/{blog}

Update Blog
PUT - /api/blogs/{blog}

Request Body:
{
    "title": "Updated Blog Title",
    "description": "Updated Blog Description"
}

Delete Blog
DELETE - /api/blogs/{blog}
Post Endpoints

View All Posts under a Specific Blog
GET - /api/blogs/{blog}/posts

Create Post
POST - /api/blogs/{blog}/posts

Request Body:
{
    "title": "Post Title",
    "content": "Post Content"
}

View a Specific Post
GET - /api/blogs/{blog}/posts/{post}

Update Post
PUT - /api/blogs/{blog}/posts/{post}

Request Body:
{
    "title": "Updated Post Title",
    "content": "Updated Post Content"
}

Delete Post
DELETE - /api/blogs/{blog}/posts/{post}

Interaction Endpoints
Like Post
POST - /api/posts/{post}/like

Comment on Post
POST - /api/posts/{post}/comment
Request Body:
{
    "content": "Comment Content"
}

Using the API with Postman
1. Set Up Postman
Create a New Request
Click on the "New" button and select "Request".

2. Add Headers
Authorization Header: Add a header for the token middleware:
Key: token
Value: vg@123
Content-Type Header: Set the content type to JSON:
Key: Content-Type
Value: application/json

3. Example: Create a Post
Method: POST
URL: http://localhost:8000/api/blogs/{blog}/posts

Headers:
token: vg@123
Content-Type: application/json
Body (raw, JSON):
{
    "title": "Sample Post Title",
    "content": "This is the content of the sample post."
}

Send the Request: Click the "Send" button to create the post.
Example Response
A successful response should return the created post details:
{
    "id": 1,
    "title": "Sample Post Title",
    "content": "This is the content of the sample post.",
    "blog_id": 1,
    "created_at": "2024-07-24T12:34:56.000000Z",
    "updated_at": "2024-07-24T12:34:56.000000Z"
}

Github link - https://github.com/NobulPlus/BlogApi-app.git
Postman Document link - https://documenter.getpostman.com/view/16995065/2sA3kXDzob

Middleware
The API is protected by a custom token middleware. All requests must include the following header:
token: vg@123
Database Seeder
The database seeder creates sample data for testing purposes. It generates a user, several blogs, and posts. To run the seeder:
php artisan db:seed
License
This project is open-source and available under the MIT License.