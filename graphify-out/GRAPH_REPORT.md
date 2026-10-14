# Graph Report - bank-sampah  (2026-10-12)

## Corpus Check
- Corpus is ~43,785 words - fits in a single context window. You may not need a graph.

## Summary
- 534 nodes · 788 edges · 105 communities (16 shown, 89 thin omitted)
- Extraction: 100% EXTRACTED · 0% INFERRED · 0% AMBIGUOUS
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- User & Nasabah Management
- User & Nasabah Management
- Transactions & Finance
- Module 3
- Transactions & Finance
- User & Nasabah Management
- Waste Categories
- User & Nasabah Management
- SAW Decision Support System
- User & Nasabah Management
- Module 10
- Module 11
- Module 12
- Module 13
- Module 14
- Module 15
- User & Nasabah Management
- User & Nasabah Management
- Controllers & Request Handling
- Module 19
- Module 20
- User & Nasabah Management
- Transactions & Finance
- Database Schema & Migrations
- User & Nasabah Management
- Database Schema & Migrations
- Transactions & Finance
- User & Nasabah Management
- User & Nasabah Management
- User & Nasabah Management
- SAW Decision Support System
- Controllers & Request Handling
- Module 33
- User & Nasabah Management
- Waste Categories
- Transactions & Finance
- SAW Decision Support System
- Database Schema & Migrations
- Transactions & Finance
- Transactions & Finance
- Module 42
- Module 43
- Module 45
- Module 46
- Blade UI Views
- Waste Categories
- Waste Categories
- Blade UI Views
- User & Nasabah Management
- User & Nasabah Management
- User & Nasabah Management
- Transactions & Finance
- SAW Decision Support System
- Transactions & Finance
- Transactions & Finance
- Transactions & Finance
- Transactions & Finance
- Transactions & Finance
- Transactions & Finance
- Transactions & Finance
- Transactions & Finance
- User & Nasabah Management
- Blade UI Views
- User & Nasabah Management
- Transactions & Finance
- Transactions & Finance
- User & Nasabah Management
- User & Nasabah Management
- Blade UI Views
- Waste Categories
- Waste Categories
- Blade UI Views
- Blade UI Views
- Blade UI Views
- Blade UI Views
- Blade UI Views

## God Nodes (most connected - your core abstractions)
1. `Controller` - 54 edges
2. `User` - 33 edges
3. `Nasabah` - 26 edges
4. `KategoriSampah` - 23 edges
5. `Transaksi` - 22 edges
6. `PenarikanDana` - 18 edges
7. `TransaksiController` - 14 edges
8. `DetailTransaksi` - 14 edges
9. `PenjualanPengepul` - 12 edges
10. `PenjualanPengepulController` - 10 edges

## Surprising Connections (you probably didn't know these)
- `DashboardController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/Admin/DashboardController.php → app/Http/Controllers/Controller.php
- `KategoriController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/Admin/KategoriController.php → app/Http/Controllers/Controller.php
- `LaporanController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/Admin/LaporanController.php → app/Http/Controllers/Controller.php
- `NasabahController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/Admin/NasabahController.php → app/Http/Controllers/Controller.php
- `{closure#3}()` --calls--> `User`  [EXTRACTED]
  app/Http/Controllers/Admin/NasabahController.php → app/Models/User.php

## Import Cycles
- None detected.

## Communities (105 total, 89 thin omitted)

### Community 0 - "User & Nasabah Management"
Cohesion: 0.05
Nodes (12): DashboardController, {closure#3}(), NasabahController, {closure#1}(), {closure#2}(), {closure#6}(), TransaksiController, DashboardController (+4 more)

### Community 1 - "User & Nasabah Management"
Cohesion: 0.08
Nodes (6): RegisterController, {closure#1}(), ProfileController, KelolaAdminController, User, DatabaseSeeder

### Community 2 - "Transactions & Finance"
Cohesion: 0.11
Nodes (5): {closure#2}(), PenilaianController, PenjualanPengepulController, Penilaian, PenjualanPengepul

### Community 3 - "Module 3"
Cohesion: 0.08
Nodes (23): devDependencies, bootstrap, concurrently, laravel-vite-plugin, @popperjs/core, sass, tailwindcss, @tailwindcss/vite (+15 more)

### Community 4 - "Transactions & Finance"
Cohesion: 0.15
Nodes (4): LaporanController, PenarikanDanaController, LaporanController, PenarikanDana

### Community 6 - "Waste Categories"
Cohesion: 0.18
Nodes (3): KategoriController, KategoriController, KategoriSampah

### Community 7 - "User & Nasabah Management"
Cohesion: 0.21
Nodes (4): ConfirmPasswordController, ResetPasswordController, Controller, RiwayatController

### Community 8 - "SAW Decision Support System"
Cohesion: 0.23
Nodes (6): {closure#1}(), {closure#2}(), {closure#3}(), {closure#1}(), {closure#2}(), {closure#3}()

### Community 10 - "Module 10"
Cohesion: 0.22
Nodes (8): description, keywords, license, minimum-stability, name, prefer-stable, $schema, type

### Community 11 - "Module 11"
Cohesion: 0.22
Nodes (9): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+1 more)

### Community 12 - "Module 12"
Cohesion: 0.25
Nodes (8): require, laravel/framework, laravel/socialite, laravel/tinker, laravel/ui, php, phpoffice/phpspreadsheet, resend/resend-laravel

### Community 13 - "Module 13"
Cohesion: 0.25
Nodes (8): require-dev, fakerphp/faker, laravel/pail, laravel/pao, laravel/pint, mockery/mockery, nunomaduro/collision, phpunit/phpunit

### Community 15 - "Module 15"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 23 - "Database Schema & Migrations"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 45 - "Module 45"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 46 - "Module 46"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

## Knowledge Gaps
- **37 isolated node(s):** `@popperjs/core`, `@tailwindcss/vite`, `concurrently`, `sass`, `tailwindcss` (+32 more)
  These have ≤1 connection - possible missing edges. (Counts symbols only; 271 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **89 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Controller` connect `User & Nasabah Management` to `User & Nasabah Management`, `User & Nasabah Management`, `Transactions & Finance`, `Controllers & Request Handling`, `Transactions & Finance`, `User & Nasabah Management`, `Waste Categories`, `User & Nasabah Management`, `User & Nasabah Management`, `Controllers & Request Handling`, `User & Nasabah Management`, `Transactions & Finance`?**
  _High betweenness centrality (0.126) - this node is a cross-community bridge._
- **What connects `@popperjs/core`, `@tailwindcss/vite`, `concurrently` to the rest of the system?**
  _37 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `User & Nasabah Management` be split into smaller, more focused modules?**
  _Cohesion score 0.052403846153846155 - nodes in this community are weakly interconnected._
- **Why does `User` connect `User & Nasabah Management` to `User & Nasabah Management`, `User & Nasabah Management`, `User & Nasabah Management`?**
  _High betweenness centrality (0.049) - this node is a cross-community bridge._
- **Should `User & Nasabah Management` be split into smaller, more focused modules?**
  _Cohesion score 0.0782051282051282 - nodes in this community are weakly interconnected._
- **Why does `Nasabah` connect `User & Nasabah Management` to `User & Nasabah Management`, `Transactions & Finance`, `Transactions & Finance`?**
  _High betweenness centrality (0.022) - this node is a cross-community bridge._
- **Should `Transactions & Finance` be split into smaller, more focused modules?**
  _Cohesion score 0.10826210826210826 - nodes in this community are weakly interconnected._