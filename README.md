Laravel 5.4 with theme FlorientR/laravel-gentelella 

### Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs/5.4).


# Installation

## Step 1

### With GIT
Clone git repository

With Git SSH
```
git clone git@github.com:lucassilvavi/fonte_luz.git
```

Or with HTTPS
```
git clone https://github.com/lucassilvavi/fonte_luz.git
```

Go to the project folder 
```
cd fonte_luz
```

Update composer 
```
composer update
```

### With Composer
```
composer create-project lucassilvavi/fonte_luz MyProject
```

## Step 2
Copy ```.env.example``` file to ```.env```

For Linux
```
cp .env.example .env
```
For Windows
```
copy .env.example .env
```

Next, run this follow commands

!! YOU NEED TO INSTALL NODE.JS FOR USE NPM !! 

For install all NPM package

```
npm install
```

Or for install just minimal package

```
npm install --global bower gulp
npm install gulp
npm install laravel-elixir
```

And then, run this commands

```
php artisan key:generate
bower install
gulp
```

Configure your ```.env``` file and run :
```
php artisan migrate
```