'use strict';

console.log('Initalizing server.');

var express = require('express');

var React = require('react');
var Router = require('react-router');

// Transparently support JSX
require('node-jsx').install({harmony: true});

require('dotenv').load({path: '../../.env'});

var app = express();

var componentsDir = process.REACT_COMPONENTS_DIR || 'components';
var extension = process.REACT_EXTENSION || 'jsx';
var port = process.REACT_SERVER_URL || 3000;

app.get('/', function(req, res) {
  var type = req.query.type;
  var props = JSON.parse(req.query.props || '{}');

  if (type === 'react-router') {

    var routes = require('./' + req.query.routes + '.' + extension);

    Router.run(routes, req.query.path, function (Handler) {
      var html = React.renderToString(React.createElement(Handler, props));
      res.send(html);
    });

  } else {
    var component = require('./' + componentsDir + '/' + req.query.component + '.' + extension);

    var html = React.renderToString(React.createElement(component, props));
    res.send(html);
  }
});

app.listen(port);

console.log('Server listening on port ' + port + '...');
