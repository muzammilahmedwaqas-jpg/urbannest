# UrbanNest - Event & Ticket Management Portal

A production-ready full-stack Laravel event management and ticketing portal featuring administrative CRUD operations, public event discovery, secure user ticket registration with dynamic QR code generation, and CSV attendee data export.

---

## 🌐 Live Application
- **Live URL**: [https://urbannest-events.onrender.com](https://urbannest-events.onrender.com)
- **Repository**: Public GitHub Repository
- **Hosting Platform**: Render Cloud (Laravel 13)

---

## 🔑 Default Credentials

### 1. Administrator Account
- **Access Route**: `/login` (redirects to admin dashboard)
- **Email**: `admin@gmail.com`
- **Password**: `password`
- **Privileges**: Full access to `/admin` routes (manage events, manage ticket types, view all user registrations, and export attendee lists as CSV)[cite: 16].

---

## 🚀 Key Features Implemented

1. **Administrative Event & Ticket CRUD**:
   - Complete resource controllers for managing events and associated ticket types[cite: 13, 14].
   - Bootstrap 5 responsive UI/UX for all listings, creation, and editing workflows[cite: 13, 14].

2. **Public Browsing & Ticket Registration**:
   - Public event discovery portal with date, location, and tiered pricing[cite: 9, 10].
   - Unique database constraints preventing duplicate registrations per user per event[cite: 10].

3. **Dynamic QR Code Generation**:
   - Integrated `simplesoftwareio/simple-qrcode` package to generate custom SVG QR badges upon registration[cite: 9, 10, 11].
   - Stored securely in public storage disks and rendered on user confirmation passes[cite: 9, 10, 11].

4. **Admin Registrations & CSV Export**:
   - Dedicated admin screen listing attendee records alongside visual QR code thumbnails[cite: 12, 13, 14].
   - Optimized streamDownload CSV export feature complete with structured header rows and metadata[cite: 12, 13, 14].

---

## 💻 Local Installation Guide

### Prerequisites
- PHP 8.4+[cite: 8]
- Composer[cite: 8]
- Node.js & NPM
- MySQL Database

### Step-by-Step Setup

1. **Clone the repository**:
   ```bash
   git clone <YOUR_PUBLIC_GITHUB_REPO_URL>
   cd urbannest-events