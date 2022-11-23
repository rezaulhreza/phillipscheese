In your root folder, clone the project file using git clone
Open terminal (bash/cmd). Then go to project folder
Then install required files and libraries using
composer install
Then create a .env file and generate key for this project using command
cp .env.example (copy this file's contents to ```.env```)

Then generate key.
php artisan key:generate

Then compile all CSS & JS files together using this command
npm install && npm run dev
or

yarn install && yarn run dev
Create a database in MYSQL/PostGres SQL and connect it with your project via updating .env file.
After connecting the db with project,
run
```php artisan migrate```

once migration is done, run
```php artisan migrate```

All views are in public/resources/views.


app/Http/Models  ----->for models

------------------
For controllers:
app/Http/Livewire
&
app/Http/Controllers


