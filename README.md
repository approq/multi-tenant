# Multi-Tenant Gamification API

## Description

This is a Multi-Tenant Gamification API which allows external systems to register users and award experience points (XP)
to users. It provides an open access leaderboard UI displaying top users ranked by XP within specified tenants.

## Installation & Setup

Follow these steps to install and setup the application.

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js and npm
- A SQL database system (MySQL, PostgreSQL, etc.)
- Laravel compatible server (Apache, Nginx, etc.)

### Steps

1. **Clone the Repository**  
   Clone this repository to your local machine.

```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git
```

2. **Setup Environment Variables**  
   Copy the `.env.example` file to `.env`.

```bash
cp .env.example .env
```

Then update the `.env` file according to your environment.

**NOTE:** Make sure to set the correct `APP_URL` because tenants are generated through this.

3. **Install Dependencies**  
   Run composer and npm install commands to install the dependencies.

```bash
composer install
npm install
``` 

4. **Generate App Key**  
   Generate an app encryption key.

```bash
php artisan key:generate
```

5. **Run Migrations**  
   Run the database migrations.

```bash
php artisan migrate
```

6. **Seed the Database (Optional)**  
   If you have set up database seeding, run the db:seed command.

```bash
php artisan db:seed
```

7. **Compile Assets**  
   Compile the assets using Laravel Vite.

```bash
npm run dev
```

8. **Serve the Application**  
   Serve the application using Laravel's or your web server's serve command.

```bash
php artisan serve
```

Now, visit http://localhost:8000 (or your specified URL) in your browser.

# FAQ

***Q: Should we validate the instagram handle, how could we do that?***

A: I have created a Laravel Rule that performs some checks

1. It checks if the handle follows Instagram's username rules using a regular expression.
2. It sends a GET request to the Instagram account's URL to see if the account exists.

***Q: Can you think of any future improvements to the system, functional or non-functional?***

A:

**Functional:**

2. Expand leaderboard to show more than just top 10 users.
3. Add more gamification features like achievements or badges.
1. Enhance Instagram handle validation with Instagram's API and OAuth.
2. Adding `SoftDeletes` trait to each model, for maintenance in case of any accidental deletions or for monitoring
3. Creating Services for each CRUD model, for more readable code and scalability

**Non-Functional:**

1. Optimize database performance for scalability.
2. Enhance security with measures like rate limiting.
3. Improve testing for bug prevention.
4. Ensure compliance with privacy regulations.
5. Implement caching for frequently viewed data.
6. Boost system availability and fault tolerance.
7. Refine user interface and experience.

***Q: How can we make it scalable to cope with millions of XP entries across thousands of tenants?***

A:

1. Database Indexing: Improve query speed by indexing commonly used fields.
2. Caching: Store frequently accessed data, like leaderboards, to reduce database load.
3. Optimized Queries: Write efficient queries that only fetch necessary data.
4. Asynchronous Processing: Offload non-immediate operations to a job queue.
5. Auto-Scaling: Automatically adjust server capacity based on traffic.


