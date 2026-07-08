# TrainPro Learning Management System (LMS)

A web‑based Class & Enrolment Management System for **TrainPro Training & Consultancy**.

Built with **Laravel 12** (PHP MVC), **Bootstrap 5**, and **MySQL**.  
The system supports four user roles:

- **Participants** – browse courses, enrol, and make payments.
- **Administrators** – manage courses, users, and confirm payments.
- **Trainers** – mark attendance and assign grades.
- **Owner** – view analytics and export reports.

---

## Features

- Course catalogue with search and category filters.
- User authentication via Laravel Breeze (with role selection on registration).
- Enrolment flow with mock payment (ready for **Fiuu** integration).
- Role‑based dashboards for each user type.
- Attendance and grading management for trainers.
- Owner dashboard with **Chart.js** analytics (revenue, popular categories, etc.).
- Dockerised environment for easy development and deployment.

---

## Technology Stack

| Layer          | Technology                     |
|----------------|--------------------------------|
| Backend        | Laravel 12 (PHP 8.2+)          |
| Frontend       | Bootstrap 5, Blade, Vanilla JS |
| Database       | MySQL 8                        |
| Web Server     | Nginx (inside Docker)          |
| Authentication | Laravel Breeze (Blade stack)   |
| Payment        | Fiuu (mock for now)            |
| Container      | Docker Desktop + docker‑compose|
| Version Control| GitHub                         |

---

## Requirements

- Docker Desktop (or Docker Engine + docker‑compose)
- Git

---
