# Church Database

> This project is developed to track church members information. It is initially built for Arba Minch Mekane Yesus Congregation, but anyone can use it. It is built. It has all of the basic features a church management system needs, such as member registration, editing member information, deleting members data, including tracking a payment information for each member.

How do I use this?
---
1. [Download the latest version](https://github.com/wuletawwonte/churchdb)
2. Create a new database, user and password and import the sql/project_database.sql file into the new database
3. Edit application/config/database.php and update the database name, user and password
4. (Optional) Rename htaccess.txt to .htaccess
5. Edit application/config/config.php and make sure to update the following settings: base\_url, index\_page (you can remove index.php if you're using a .htaccess file), encryption\_key, sess\_cookie\_name, csrf\_token\_name and csrf\_cookie\_name
6. The app should be up and running by now, you can login using email admin@admin.com with password "password" (without quotes)
7. (Optional) You will find the original Ion Auth files in controllers/auth.php and views/auth so you can extend and/or customize them as you see fit
8. New controllers on your app should inherit from App_Controller

Ok, but there are things I don't like in here, how can I change them?
---
- You can use config/app.php to define configuration that is used everywhere
- Validation Rules are set in config/form\_validation.php, you can either delete or add more here
- The App\_Form\_Validation.php file has custom validations already in place, you can either delete or add new ones there
- The App_Controller.php file is a good place to start if you want to change how this template works


What will I find in here?
---
* [CodeIgniter 2.1.3](https://github.com/EllisLab/CodeIgniter)
* [Ion Auth](https://github.com/benedmunds/CodeIgniter-Ion-Auth)
* [CodeIgniter Template](https://github.com/philsturgeon/codeigniter-template)
* [wiredesignz Modular Extensions - HMVC](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc)
* [Bootstrap 2.3.1](http://twitter.github.com/bootstrap)

Copyright and license
---
Copyright (C) 2013 [Wuletaw Wonte](https://github.com/wuletawwonte).

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
