Protocolo Rueditas de Bici
===========================

## PHP Monolitic App
  - Catalogs
  - Users admin
  - Binnacle Reports

## Installation
  - Download Xammp App server
  - Go to sql folder and open ddl_development.sql file, execute file
  - After excecute dml_development.sql file
  - Start Xammp Server and Run Project

## Tree Folders
  ```bash
  ├── components    # Modules view file, create a new folder for new module for example /components/newModule/
  │   ├── module
  │     └── index.php # Main view
  ├── css             # CSS files for all the applicatión.
  ├── fonts           # Fonts
  ├── images          # Project images
  ├── js              # All javascript librarys and JS app in folder /js/app/module/ js files
  ├── less            # Custom css file
  ├── sql             # Sql for install the application but remember delete it on production build
  ├── src             # Sql for install the application but remember delete it on production build
  │   ├── module
  │       ├── dao     # Access data layer
  │       ├── service # Bussiness layer
  ├── dashboard.php   # Dashboard container for all modules an views generic dashboard
  ├── index.php       # Main view, login for the app 
  ├── main.js         # Service Worker configuration PWA
  ├── manifest.json   # Manifest  Json PWA
  ├── dashboard.php   # Dashboard container for all modules an views generic dashboard
  ├── README.md       #
  ├── roles.php       # Roles view, for role management
  └── sw.js           # Service worker with PWA configuration
  ```
## License
www.hmvsoluciones.com
