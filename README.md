-Create “pro_center” database

-Rename .env.example to .env

-Run:
php artisan db:seed --class=UsersTableSeeder

-To login as admin:

Email: fadi.bakour101@gmail.com

Password: 12341234

-Go to reports screen by clicking on Reports and create a report

-to run tests run "ReportTest" using phpunit

-api contract "Report.md"

-this design is to help admin send an email from the dashboard to any of the application users

Ps: mail service used now is mailtrap connected to personal account in env, to receive emails to your email please change configurations inside env file.
