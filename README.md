
## Installation of the project


1)Clone project with command : ```git clone https://github.com/nenadsijan/test_medani.git```

2)Run command ```composer update```

3)Create database with the same name as is in .env file

4)Run command for migration: ```php artisan migrate```

5)Run command for seeders:
 
    php artisan db:seed --class=CreateUsersSeeder
    php artisan db:seed --class=CreatePostsSeeder
    php artisan db:seed --class=CreateCommentsSeeder
    php artisan db:seed --class=CreateLikesSeeder
    
    

