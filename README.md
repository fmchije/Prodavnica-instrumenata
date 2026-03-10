# 🎸 Online Instrument Store (PHP & MySQL)

## 📋 Project Overview
A full-stack e-commerce platform for musical instruments, featuring dynamic search filtering.

## 🛠 Tech Stack
* **Backend:** PHP (Server-side logic)
* **Frontend:** JavaScript, jQuery, Ajax
* **Database:** MySQL (Relational schema for inventory and orders)
* **Styling:** CSS3

Technical Highlight: Asynchronous Search

Challenge: I wanted users to filter instruments (Guitars, Pianos, etc.) without the page refreshing.

Solution: Implemented a jQuery-based Ajax call that sends data to a PHP script, which queries the MySQL database and returns the results dynamically.

## ⚙️ Key Features
* **Live Search:** Ajax-powered filtering to find instruments by type or price without page reloads.
* **Session-Based Cart:** Custom PHP session management for persistent shopping baskets.
* **Relational DB:** Normalized database structure managing Categories, Brands, and Products.

## 🗄 Database Setup
The database schema and initial data can be found in the `/db` directory.

Note: This repository has been reorganized for better readability. Paths in the source code may need adjustment for local deployment.
This project was originally developed as part of my coursework. The original requirements and functional description in Serbian can be found in the ORIGINAL_DESCRIPTION_SR.txt file.
