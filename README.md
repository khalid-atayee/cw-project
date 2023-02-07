# CodeWeekend
# project Name: Codeweekend Version 2 website with CMS

### a quick review about project requirements

#### CodeWeekend v2 - A global platform to launch coding bootcamp chapters in different cities around the world. See fi.co for what I mean. fi.co is for founders. Building something similar for developers.

##### Must Haves
##### 1. A new responsive and easy to use website
##### 2. Every chapter has its own organizer, mentors and a template of curriculum
##### 3. Chapters can organize their sessions and its timings
# Performance
##### 1. Mentors should be able to grade assignments
##### 2. After a student applied, depending of the fee, they should pay or the organizers can waive their payment
##### 3. Admins should be able to add cities and chapters into those cities
##### 
##### Delighters
##### 1. Students should get automated emails about their their assignments and grades
##### 2. Payments should be processed on the website, through Stripe integration
##### 3. Organizer should have the option to email all the cohort
#####





## instruction for running this project

#### project needs
##### laravel version : 8.75 
##### php version: 7.3|^8.0
##### stripe version : ^10.3


### run these commands
#### 1 run composer install
#### 2 change .env.example -> .env file
#### 3 run php artisan key:generate
###
#### 4 configure .env  
#### a) add database to .env
#### b) add your mail host for email services 
#### for now you can use mine, i used zohomail services for that
### here is the configuration

##### MAIL_MAILER=smtp
##### MAIL_HOST=smtp.zoho.com
##### MAIL_PORT=465
##### MAIL_USERNAME=khalid.atayee@zohomail.com
##### MAIL_PASSWORD=farkhar123
##### MAIL_ENCRYPTION=ssl
##### MAIL_FROM_ADDRESS=khalid.atayee@zohomail.com
##### MAIL_FROM_NAME="${APP_NAME}"
####
### 5 run php artisan migrate:fresh --seed
### 6 admin credentials,
##### email: admin@admin.com
##### password: codeweekend123
####


## we used stripe integration for online payments and we created an account in https://stripe.com , but if you wish to have your own account then go to https://stripe.com and create an account for yourself then, change secret and api keys inside project
### Now you can move on
# All the best



