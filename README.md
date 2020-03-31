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
  ├── app
  │   ├── css
  │   │   ├── **/*.css
  │   ├── favicon.ico
  │   ├── images
  │   ├── index.html
  │   ├── js
  │   │   ├── **/*.js
  │   └── partials/template
  ├── dist (or build)
  ├── node_modules
  ├── bower_components (if using bower)
  ├── test
  ├── Gruntfile.js/gulpfile.js
  ├── README.md
  ├── package.json
  ├── bower.json (if using bower)
  └── .gitignore
  ```
  - components      # Modules view file, create a new folder for new module for example /components/newModule/index.php.
  - css             # CSS files for all the applicatión.
  - fonts           # Fonts
  - images          # Project images
  - js              # All javascript librarys and JS app in folder /js/app/module/ js files
  - less            # Custom css file
  - sql             # Sql for install the application but remember delete it on production build
  - dashboard.php   # Dashboard container for all modules an views generic dashboard
  - index.php       # Main view, login for the app
  - main.js         # Service Worker configuration PWA
  - manifest.json   # Manifest  Json PWA
  - README.md       # 
  - roles.php       # Roles view, for role management
  - sw.js           # Service worker with PWA configuration
    
## License
www.hmvsoluciones.com
