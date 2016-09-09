<?php

class PhpVlidateTest extends PHPUnit_Framework_TestCase
{

    /**
     *  ip vlidate
     */
    public function testIpValidate()
    {
        //
        // equal
        //
        $ip = "127.0.0.1";
        $this->assertEquals( true, $ip === filter_var($ip, FILTER_VALIDATE_IP));

        $ip = "0.0.0.0";
        $this->assertEquals( true, $ip === filter_var($ip, FILTER_VALIDATE_IP));

        //
        // unequal
        //
        $ip = "256.256.256.256";
        $this->assertEquals( false, $ip === filter_var($ip, FILTER_VALIDATE_IP));

    }

    /**
     *  email vlidate
     */
    public function testEmailValidate()
    {
        //
        // equal
        //
        $email = "abcdefglijklmnopqrstuvwxyz.ABCDEFGLIJKLMNOPQRSTUVWXYZ@hotmail.com";
        $this->assertEquals( true, $email === filter_var($email, FILTER_SANITIZE_EMAIL));

        $email = "00^_^@com";
        $this->assertEquals( true, $email === filter_var($email, FILTER_SANITIZE_EMAIL));

        $email = "00@-_-@hotmail.com";
        $this->assertEquals( true, $email === filter_var($email, FILTER_SANITIZE_EMAIL));

        //
        // unequal
        //
        $email = "fail/goodbye@hotmail.com";
        $this->assertEquals( false, $email === filter_var($email, FILTER_SANITIZE_EMAIL));

        $email = "fail(hello)@hotmail.com";
        $this->assertEquals( false, $email === filter_var($email, FILTER_SANITIZE_EMAIL));
    }

}
