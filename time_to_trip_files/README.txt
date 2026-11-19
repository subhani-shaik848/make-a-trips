TIME TO TRIP - XAMPP SETUP

1. Copy the whole time_to_trip folder to C:\xampp\htdocs\time_to_trip
2. Start Apache and MySQL in XAMPP.
3. Open http://localhost/phpmyadmin
4. Import schema.sql (Import tab), or paste its SQL into the SQL tab.
5. Confirm config.php credentials: DB_USER=root and DB_PASS='' are the default XAMPP settings.
6. Open http://localhost/time_to_trip/home.html

Files:
- HTML: home.html, places.html, countries.html, districts.html, cities.html
- CSS: assets/css/style.css
- JavaScript: assets/js/app.js
- PHP: config.php, includes.php, signup.php, signin.php, logout.php,
  create-trip.php, group-trips.php, rides.php, trip.php, profile.php
- schema.sql creates the database tables.

Features:
- Account registration/sign-in with password_hash/password_verify and sessions.
- Destination inspiration pages.
- Create group trips or carpool listings.
- Search future listings by origin, destination and date.
- Request seats and accept/decline requests from profile.

Important:
- This is a starter project, not a production-ready rideshare service.
- Driver identity, vehicle documents, insurance and legal compliance are not verified.
- For production, add rate limiting, email verification, password reset, stronger admin/moderation,
  privacy controls, verified-driver workflow, and review/test the deployment security.
- Existing old sign-in/sign-up PHP files should be backed up before replacing; adapt any existing
  database/table names and form field names if they differ.
