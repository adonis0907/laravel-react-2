<?php

namespace spec\AllanTatter\React;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Contracts\Config\Repository as Config;
use Mockery as m;

class ReactSpec extends ObjectBehavior
{
    public static $functions;

    function let(Config $config)
    {
        self::$functions = m::mock();
        $this->beConstructedWith($config);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AllanTatter\React\React');
    }
}
