<?php
use App\Model\User;

class UserTest extends PHPUnit_Framework_TestCase
{
    /**
     *  目前的 User 加密方式
     */
    public function testCheckPassword()
    {
        $user = new User();
        $user->setPassword('12345678');

        // Assert
        $this->assertEquals( true, $user->validatePassword('12345678') );
    }

}
