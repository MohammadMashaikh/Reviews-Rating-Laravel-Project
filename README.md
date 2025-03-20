Book Review Project - Laravel

📖 Overview

This is a Laravel-based Book Review application that allows users to browse and review books. It supports multiple filtering options, searching, pagination, and adding reviews to specific books.

🚀 Features

Display Books with Multiple Filters:

Latest

Popular Last Month

Popular Last Six Months

Highest Rated Last Month

Highest Rated Last Six Months

📚 Search Functionality:

Search books by title.

Search results can be filtered using the available filters.

📄 Pagination for easy browsing.

✍️ Add New Review for Specific Books.

⭐ Display Average Ratings and Number of Reviews for Each Book.

🛠️ Installation

Clone the repository:

Navigate to the project directory:

Install dependencies:

Copy the .env.example file to .env:

Generate application key:

Configure your database credentials in the .env file.

Run migrations:

Start the Laravel development server:

📂 Database Structure

Tables:

Books: id, title, author, created_at, updated_at.

Reviews: id, book_id, review_description, rating, created_at, updated_at.

📌 Usage

Access the homepage to view a list of all books.

Use the filter options to sort books by different criteria.

Search for a book by typing its title in the search bar.

Click on a book to view its details and reviews.

Add a new review to a specific book from its details page.

🔍 Filters Implementation

Books can be filtered using various criteria by applying appropriate query scopes:

Latest: Shows the most recently added books.

Popular Last Month: Shows the most reviewed books in the last month.

Popular Last Six Months: Shows the most reviewed books in the last six months.

Highest Rated Last Month: Shows the highest-rated books in the last month.

Highest Rated Last Six Months: Shows the highest-rated books in the last six months.

📑 Pagination

Pagination is applied to the books listing to enhance browsing and performance.

📌 Search Functionality

Search is performed based on the book title.

Results are also affected by the selected filter criteria.

📬 Adding Reviews

Users can add reviews to books by submitting a form with a description and rating.
