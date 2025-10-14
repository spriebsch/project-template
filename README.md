# PHP Project template

This is a template for PHP projects hosted at https://github.com/spriebsch/project-template.
It contains a minimal setup for a PHP project with PHPUnit, Composer, and PHPStan.

The template also contains instructions for Junie, Jetbrains' AI assistant and is preconfigured to be used with git.

It is designed for prototyping, coding exercises, and starting projects with a hexagonal,
onion, or clean architecture.

The project is maintained by Stefan Priebsch <stefan@priebsch.de>.
Stefan uses this template for his code examples at https://the-fluent-developer.com and for his trainings at https://thephpcc.academy.

Local development is particularly easy with the php-devbox (https://github.com/spriebsch/php-devbox).

## Installation

Download the latest release from https://github.com/spriebsch/project-template/releases.
Unzip the archive in a convenient location.

Run

```bash
sudo ln -s /path/to/setup-project-here /usr/local/bin
```

to create a symlink to the `setup-project-here` script so that you can run it from anywhere.

That's it! You are now set up for using the project template.

## Usage

Change to the directory where you want to create your project.

Run

```bash
setup-project-here
```

You now have a project set up and ready to go.

If you use php-devbox, you should start php-devbox now:

```bash
php-devbox
```

Now run

```bash
composer install
```

to build the autoloaders.
There are no Composer dependencies by default. You can add them as needed. 

### Running the tests

The project template has a sample class `HelloWorld` in `src/HelloWorld.php` 
and a test `tests/HelloWorldTest.php`. 
It is preconfigured to run the tests with PHPUnit.

You can do this with

```bash
phpunit
```

### Code Coverage Reports

If you have xdebug installed (which is default in php-devbox), you can create code coverage reports by running 

```bash
composer code-coverage
```

This will create the coverage report in build/coverage.
You can view it in your browser by running on your host

```bash
composer show-coverage
```

You can also generate a path coverage report by running

```bash
composer path-coverage
```

This takes far longer than a normal code coverage report,
which takes far longer than just running the unit tests.

### Static Code Analysis

Run

```bash
phpstan
```

to perform static code analysis with PHPStan.

## Development

The Hello World example and its test are just a starting point for you. 
You should delete them as soon as you have your own code.

### Autoloading

The project template deals with autoloading automatically. 

To update autoloaders, for example, after creating new classes, run

```bash
composer dump
```

In your application, make sure to require `src/bootstrap.php` rather than any `autoload.php` file.

Your tests can use doubles located in the `tests` directory. 
PHPUnit is configured to use the `tests/bootstrap.php` file.  
