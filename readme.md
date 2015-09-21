![](https://raw.githubusercontent.com/allantatter/laravel-react/master/logo.png)

# Laravel React

[![Build Status](https://travis-ci.org/allantatter/laravel-react.svg)](https://travis-ci.org/allantatter/laravel-react)
[![Total Downloads](https://poser.pugx.org/allantatter/laravel-react/downloads.svg)](https://packagist.org/packages/allantatter/laravel-react)
[![Latest Stable Version](https://poser.pugx.org/allantatter/laravel-react/v/stable.svg)](https://packagist.org/packages/allantatter/laravel-react)
[![Latest Unstable Version](https://poser.pugx.org/allantatter/laravel-react/v/unstable.svg)](https://packagist.org/packages/allantatter/laravel-react)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/allantatter/laravel-react)

Add React.js support seamlessly for Laravel Blade templates.

## Installation

Add this to your project's `composer.json`

```
"require": {
	"allantatter/laravel-react": "0.1.*"
},
```

Then run

```
$ composer update
```

## Service provider & alias

Add this to the providers array in `config/app.php`

```
'AllanTatter\React\ReactServiceProvider',
```

Add this to the aliases array in `config/app.php`

```
'React' => 'AllanTatter\React\Facades\React',
```

## Setup server-rendering with Node.js application

In this repository, you'll find a directory named `example` and inside that is `resources`. Copy paste its content to your own project's `resources` directory and in addition to that merge the `package.json` file from `example` directory into your own project's `package.json`.

Then in your project's root dir, run

```
$ npm install -g nodemon

$ npm install
$ npm start
```

If you put `server.js` in another location, you may have to configure this line inside that file

```
require('dotenv').load({path: '../../.env'});
```

## Usage

Inside your Blade view, you can render React component like this

```
{!! React::component('ComponentName', $props) !!}
```

To render [react-router](https://github.com/rackt/react-router) routes, you can use this

```
{!! React::router('routesFileName', $props) !!}
```

## Configuration

If you're not happy with default configuration, you can manage a few variables through .env file, following are default values:

```
REACT_SERVER_URL=http://localhost
REACT_SERVER_PORT=3000
REACT_COMPONENTS_DIR=components
REACT_EXTENSION=jsx
```

## Snippets that may come in handy

Handle 404 pages with react-router by rendering your react application with adding this snippet into `app/Exceptions/Handler.php`, method `render()`

```
if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException)
{
	return response(view('react.app.view'));
}
```
