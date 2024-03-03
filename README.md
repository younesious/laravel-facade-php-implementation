# Laravel Facade Implementation

This project provides a basic implementation of the Facade design pattern in PHP, inspired by Laravel's Facades.

## Overview

The Facade pattern is a structural design pattern that provides a simplified interface to a complex system of classes, interfaces, and dependencies. It allows clients to interact with the system through a simple interface, hiding the complexities of the underlying components.

In this project, we implement a simple version of Laravel's Facade pattern, which allows for easier access to services registered in a dependency injection (DI) container.

## Project Structure

- **App.php**: Contains the main application class responsible for managing the DI container and binding classes.
- **Facades**: Directory containing facade classes, which act as static proxies to underlying services.
- **Helpers**: Directory containing helper classes/interfaces, such as the `Social` interface and concrete implementations like `Instagram` and `Twitter`.
- **Providers**: Directory containing service providers responsible for registering services in the DI container.
- **Tests**: Directory containing PHPUnit tests to ensure the correct behavior of the implemented classes and interfaces.

## Usage

### Binding Services

To bind services to the container, use the `bind()` method in the `App` class:

```php
App::bind('social', SocialFacade::class);
```
## Accessing Services via Facades

To access services registered in the container using facades, simply call static methods on the facade classes. For example:

```php
Social::share('https://example.com', 'Sample Title');
```

## Running Tests

To run the provided PHPUnit tests, execute the following command in the terminal:

```bash
vendor/bin/phpunit
```

## Contributing

Contributions to this project are welcome! If you find any issues or have suggestions for improvements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

Feel free to adjust the README according to your project's specific requirements or additional information you want to provide.
