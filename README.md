# Babyshower app - Technical test for Babytuto.com

<p align="center"><a href="https://babytuto.com" target="_blank"><img src="https://s3.babytuto.com/565e454ba662a1a8794491dd3a4c942d.png"></a></p>
<hr>
<p align="center"><a href="https://github.com/fazunigan/babyshower/actions/workflows/ci-cd.yaml" target="_blank"><img src="https://github.com/fazunigan/babyshower/actions/workflows/ci-cd.yaml/badge.svg"></a></p>
[![ci/cd workflow]()]()

## About Babyshower 👼🏼

Babyshower is a web app to schedule a Babyshower event, choose the gifts you would like to receive from the Babytuto.com store, and share it with your friends and family. It works in 3 simple steps.

- Write some simple information about you, your baby and his father.
- Choose the gifts you would like to receive.
- ¡Share the event with your friends and family!

Organizing a Babyshower with us is very easy and fast.

## tl;dr

The demonstration is located in https://babyshower-babytuto.herokuapp.com/
To use the app, clone the git repository and run the commands in the "Development Enviroment" section.
The project uses Laravel Sail, so running it on a Docker Container is very easy.

## Some considerations

- To list the products that will be shown to our clients, i have just selected a few ones from Babytuto.com, aproximately 10, to do what is required. For a real product, de best would be to connect to an API.
- Even though it wasn't required, i have taken the liberty of build a administrator panel, to manage user accounts and events, and some sessions and authentication stuff.

## Running

First of all, you have to clone the git repository, using

```
git clone fazunigan/babyshower
```

Then, take the course of action depending of your environment.

### Development Environment

As Babyshower is developed using the last version of Laravel, i recomend you to use Docker to run your development environment. Babyshower cames with Laravel Sail, so, to build your environment, simply run:

```
php artisan sail:install    # Setup your .env file
php artisan sail:publish    # Publish the docker files
npm install && npm run dev  # Install and setup node modules
./vendor/bin/sail up        # Brings your docker container to life!
```

### Production Environment

The commands are basically the same, but changing the way than ```npm``` runs.

```
php artisan sail:install    # Setup your .env file
php artisan sail:publish    # Publish the docker files
npm install && npm run prod # Install and setup node modules
```

To ease of deploy and installation on a production environment, i recommend you to use services like AWS ElasticBeanstalk or Laravel Forge.

## Admin panel

The credentials to access to the Admin panel are the folliwing
- User: admin@babytuto.com
- Password: admin

## Testing and CI/CD

This project was developed using the TDD method, so, it came with a ```.github``` directory used to run Github Actions, such as;

- Unit test
- Run linter
- Evaluate Code Coverage
- Deploy to Heroku

If you will use another repository provider different than Github, i HIGHLY RECOMMEND to use a CI/CD software to automatate this process (CI/CD), like Jenkins or Travis-CI.

## Standards

This project was built based on TDD (Test Driven Development), following strict PSR-2 Standard and DRY (Don't Repeat Yourself) Method.

## Author

This app was made by Felipe Zúñiga Núñez. Contact me via [fazunigan@gmail.com](mailto:fazunigan@gmail.com)
