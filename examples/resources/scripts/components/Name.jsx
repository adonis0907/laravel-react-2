'use strict';

var React = require('react');

var Name = React.createClass({
  render: function() {
    return <h1>Hello {this.props.name}!</h1>;
  }
});

module.exports = Name;
