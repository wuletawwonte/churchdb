# Church Database

> This project is developed to track church members information. It is initially built for Arba Minch Mekane Yesus Congregation, but anyone can use it. It has all of the basic features a church management system needs, such as member registration, editing member information, deleting members data, including tracking a payment information for each member.

## Getting Started
---
1. Clone the repo to your computer
```bash
git clone https://github.com/wuletawwonte/churchdb
```
2. Create a new database, user and password and import the sql/project_database.sql file into the new database
3. Edit application/config/database.php and update the database name, user and password
4. (Optional) Rename htaccess.txt to .htaccess
5. Edit application/config/config.php and make sure to update the following settings: base\_url, index\_page (you can remove index.php if you're using a .htaccess file), encryption\_key, sess\_cookie\_name, csrf\_token\_name and csrf\_cookie\_name
6. The app should be up and running by now, you can login using email admin@admin.com with password "password" (without quotes)
7. (Optional) You will find the original Ion Auth files in controllers/auth.php and views/auth so you can extend and/or customize them as you see fit
8. New controllers on your app should inherit from App_Controller

### Important files to edit 
- You can use config/app.php to define configuration that is used everywhere
- Validation Rules are set in config/form\_validation.php, you can either delete or add more here
- The App\_Form\_Validation.php file has custom validations already in place, you can either delete or add new ones there
- The App_Controller.php file is a good place to start if you want to change how this template works


### What will I find in here?
---
* [CodeIgniter 2.1.3](https://github.com/EllisLab/CodeIgniter)
* [Ion Auth](https://github.com/benedmunds/CodeIgniter-Ion-Auth)
* [CodeIgniter Template](https://github.com/philsturgeon/codeigniter-template)
* [wiredesignz Modular Extensions - HMVC](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc)
* [Bootstrap 2.3.1](http://twitter.github.com/bootstrap)

## Authors

👤 **Wuletaw Wonte**

- GitHub: [@wuletawwonte](https://github.com/wuletawwonte)
- Twitter: [@wuletaww](https://twitter.com/wuletaww)
- LinkedIn: [LinkedIn](https://linkedin.com/in/wuletaw-wonte)

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

Feel free to check the [issues page](../../issues/).

## Show your support

Give a ⭐️ if you like this project!

## Acknowledgments

- Hat tip to anyone whose code was used
- Inspiration
- etc

## 📝 License

This project is **[MIT](./LICENSE.md)** licensed.
