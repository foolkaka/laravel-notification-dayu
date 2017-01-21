<?php

namespace NotificationChannels\Dayu\Test;

use NotificationChannels\Dayu\DayuMessage;
use PHPUnit_Framework_TestCase;

class JusibeMessageTest extends PHPUnit_Framework_TestCase
{
    /** @var \NotificationChannels\Dayu\DayuMessage */
    protected $message;

    public function setUp()
    {
        parent::setUp();

        $this->message = new DayuMessage();
    }

    /** @test */
    public function it_can_accept_a_string_message_when_constructing_a_message()
    {
        $mesasgeString = '{"template_key":"template_value","test_key":"test_value"}';
        $message = new DayuMessage($mesasgeString);
        $this->assertEquals($mesasgeString, $message->content);
    }
    
    /** @test */
    public function it_can_accept_an_array_message_when_constructing_a_message()
    {
        $message = new DayuMessage(['template_key'=>'template_value','test_key'=>'test_value']);
        $this->assertEquals('{"template_key":"template_value","test_key":"test_value"}', $message->content);
    }

    /** @test */
    public function it_can_set_the_string_content()
    {
        $this->message->content('HFExMessage');
        $this->assertEquals('HFExMessage', $this->message->content);
    }

    /** @test */
    public function it_can_set_the_array_content()
    {
        $this->message->content(['template_key'=>'template_value','test_key'=>'test_value']);
        $this->assertEquals('{"template_key":"template_value","test_key":"test_value"}', $this->message->content);
    }

    /** @test */
    public function it_can_set_the_from()
    {
        $this->message->from('MiFit');
        $this->assertEquals('MiFit', $this->message->from);
    }

    /** @test */
    public function is_can_set_the_sms_type()
    {
        $this->message->type('unNormal');
        $this->assertEquals('unNormal', $this->message->type);
    }

    /** @test */
    public function is_can_set_extend()
    {
        $this->message->extend('uid-612606');
        $this->assertEquals('uid-612606', $this->message->extend);
    }

}
