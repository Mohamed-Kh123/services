# Permissions #

This is the library of permission that handles all permission operations such as (save permissions, edit permissions , delete permissions, and sync permissions with any admin)
### What is this repository for? ###

* Migrate permissions
* Seeds permissions
* assign the all pre-defined permissions to the super admin


### How can I bind it with the system? ###
Add ServiceProvider class into config/app

```
\Permissions\PermissionServiceProvider::class
```

### How can I add a new permission? ###
you just have to go to Permission/config/Permissions.php file and add 
any permission you want according to the given rules:
- If you want to add a single permission with no CRUD, just use the example below
```
   [
      'title' => '{Permission's title which is appered in admin CRUD}',
      'name' => '{real Permission name that is used in the both back and front end}',
    ]
```
- If you want to add a complex permission that holds CRUD operations, use the example below 
```
   [
      'title' => '{Permission's title which is appered in admin CRUD}',
      'name' => '{real Permission name that is used in the both back and front end}',
      'crud' => true
    ]
```
- If you want to append another permissions with the CRUD permission, just use the example below 
```
   [
      'title' => '{Permission's title which is appered in admin CRUD}',
      'name' => '{real Permission name that is used in the both back and front end}',
      'crud' => true,
      'append' => [
              [
                'title' => '{Permission's title which is appered in admin CRUD}',
                'name' => '{parent's permission name}-{action name}',
              ]
        ]
    ]
```
***Note:*** make sure you are committed with the rules above

 
### How can I publish the permission? ###
Run the command below:
```
  php artisan vendor:publish --provider=Permissions\PermissionServiceProvider
```
once you run the command successfully, a new Permissions.php file will be added to the config folder


### How can I migrate permission's database scripts? ###
Run the command below:
 ```
   php artisan permissions:migrate
 ```


### How can I add Permissions.php to database? ###
Run the command below:
 ```
   php artisan permissions:seed
 ```

### How can I give the super admin all permissions we have? ###
Run the command below:
 ```
   php artisan permissions:authorize --email={admin's email} --guard={admin chosen guard (optional: admin-api is the default)}
 ```
### Note ###
Please, make sure you walked through all the steps above one by one


### Written by ###
[Amr Saidam](mailto:a.amer.94@gmail.com?subject=Nawa%20Group)


