# Endee ERP

### An ERP Software System using Filament: Currently a WIP (for ENDEE COMMUNICATION)

## Installation

1. Git clone:

```bash
git clone https://github.com/adamsyah24/erpendee-v0.1.git
```

2. Cd into erpsaas directory

```bash
cd erpendee-v0-1.git
```

3. Install via composer: You will get an error that vite manifest cannot be found, just keep following instructions.
```bash
composer install
```

4. Install Dependencies: You can use one of either pnpm, npm, or yarn.

```bash
pnpm install
```

5. Build Manifest
```bash
pnpm run build
```

6. Copy .env.example and configure your database:
```bash
cp .env.example .env
```

7. Generate APP_KEY for Laravel:
```bash
php artisan key:generate
```

8. IMPORTANT! Link your database (preferably mysql) to app storage in order to generate assets/images/csv files:
```bash
php artisan storage:link
```

9. Migrate the database tables to your DB:
```bash
php artisan migrate
```

10. Now run the following command to install shield (do --fresh just in case):
##### Note: I added the app/Policies folder to .gitignore, if you want to keep them remove it from .gitignore after finishing installation.
```bash
php artisan shield:install --fresh
```

11. Run Dev:
```bash
pnpm run dev
```

12. Follow the prompts, then login with your email and password at the following url or similar at your-url/admin:
```
https://erpsaas.test/admin 
```

13. In this order:
```
Create A New Company (As Many As You Want)
```
```
Create Department(s) For Company/Companies
```
```
Create Employee(s) For Your Company/Companies
```
```
Create An Asset for Your Bank First with Account Name being your Bank Name (example. Bank of America) as a Current Asset
You can now Create an Asset, along with Liabilities, etc from the Dashboard Page (Chart of Accounts).
```
```
Create Bank(s) for Your Company/Companies and Departments
```
```
Create Account(s) for Your Bank(s)
```
```
Create Card(s) for Your Account(s)
```
```
Create Income & Expense Transaction(s) for Your Card(s)
```
```
Enjoy!
```

credit to : <a>https://github.com/andrewdwallo</a>
