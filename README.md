# Forkel Bars
Add a customizable notification bar on the top of your Magento Admin Panel. It allows you to make announcements or just leave a message for all Admin Panel users on multiple environments.

![Forkel Bars - Preview](http://www.tobiasforkel.de/public/magento/forkel_bars/version/1.0/screenshots/github/backend/dashboard.jpg)

![Forkel Bars - Grid Preview](http://www.tobiasforkel.de/public/magento/forkel_bars/version/1.0/screenshots/github/backend/settings.jpg)

## Installation
1. Pull the code.
2. Copy the code in your document root directory where the `/app/` folder is located.
4. Clear all caches and reload your Admin Panel to run the installation process.
5. After installation you should see a new menu in `System > Bars`.
6. You should also find a record `forkel_bars_setup` in table `core_resource`. Use `select * from core_resource where code = 'forkel_bars_setup';`

## Features
* `Add`, `edit` or `delete` notification bar for multiple server.
* Display each notification bar for a specific admin user role.
* `Disable` / `Enable` notification bars.

## Usage
The functionality can be used in the backend section `System > Bars`.

## Support
If you have any issues with this extension, open an issue on [Github](https://github.com/tobias-forkel/Forkel_Bars/issues). For a custom build, please contact me on http://www.tobiasforkel.de.

## Contributing
1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`.
3. Commit your changes: `git commit -am 'Add some feature'`.
4. Push to the branch: `git push origin my-new-feature`.
5. Submit a pull request.

Follow me on [GitHub](https://github.com/tobias-forkel) and [Twitter](https://twitter.com/tobiasforkel).

## History
===== 1.0.2 =====
* Wrong XML syntax in bars.xml.
* Simplified main.js with pure JavaScript. No Prototype anymore.
* Minimized main.js
* Hide bar until DOM is loaded.

===== 1.0.1 =====
* Display each notification bar for a specific admin user role.

===== 1.0.0 =====
* Initial version of this module

## License
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)
