var React = require('react');
var Router = require('react-router');

var App = require('./components/App.jsx');
var Home = require('./components/Home.jsx');
var About = require('./components/About.jsx');
var NotFound = require('./components/NotFound.jsx');

var { DefaultRoute, NotFoundRoute, Route, RouteHandler, Link } = Router;

var routes = (
  <Route name="app" path="/" handler={App}>
    <DefaultRoute handler={Home} />
    <Route name="about" handler={About} />
    <NotFoundRoute handler={NotFound} />
  </Route>
);

module.exports = routes;
