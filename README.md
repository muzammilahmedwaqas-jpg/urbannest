# UrbanNest - Event Ticket Management Application

UrbanNest ek full-stack Laravel application hai jo events manage karne, ticket registrations, unique QR code badges, aur administrative event controls ke liye banayi gayi hai.

---

## Hand-over Note

> *Hand-over Note for Reviewer & Supervisor:*
> 
> *What I Did:* I developed and finalized the complete UrbanNest Event Management system using Laravel, SQLite, and Bootstrap 5. I implemented full authentication (via Breeze), event CRUD operations for admins, duplicate-prevention ticket registration for users, dynamic QR code generation for ticket passes, stream-downloadable CSV exports for attendees, and configured production deployment using Docker and Nginx on Render.
> 
> *What Was Hard:* Resolving database environment configurations during cloud deployment was the most challenging part. Transitioning from MySQL to SQLite within Docker required adding specific system libraries (libsqlite3-dev) and custom permission/initialization commands in the Dockerfile to ensure auto-migration and smooth container builds on Render.
> 
> *Anything Left Out:* All core project requirements, rubric guidelines, and admin features are fully implemented and met without leaving out any core functional requirements.

---

## Tech Stack
- *Framework:* Laravel 13 / PHP 8.4
- *Database:* SQLite
- *Frontend:* Bootstrap 5, Blade Templating
- *Packages:* simple-qrcode (QR generation)
- *Deployment:* Docker, Nginx, Render

---

## Credentials

### Admin Account
- *Email:* admin@gmail.com
- *Password:* password
---

##  Local Setup Instructions

1. *Clone the Repository:*
   ```bash
   git clone [https://github.com/muzammilahmed/urbannest.git](https://github.com/muzammilahmed/urbannest.git)
   cd urbannest