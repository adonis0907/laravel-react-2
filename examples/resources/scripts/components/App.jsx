var React = require('react');
var Router = require('react-router');

var { RouteHandler, Link } = Router;

var App = React.createClass({
    render: function () {
        return (
            <div>
                <h1>App</h1>
                <ul>
                    <li><Link to="app">Home</Link></li>
                    <li><Link to="about">About</Link></li>
                </ul>
                <RouteHandler/>
            </div>
        );
    }
});

module.exports = App;
