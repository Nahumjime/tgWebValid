<?php

namespace TgWebValid\Test\Entities\InitData;

use PHPUnit\Framework\TestCase;
use TgWebValid\Entities\InitData\User;

class UserTest extends TestCase
{
    public function testMake()
    {
        $data = [
            'id'         => 1082294585,
            'first_name' => 'Сергій'
        ];

        $user = new User($data);

        $this->assertEquals($data['id'], $user->id);
        $this->assertEquals($data['first_name'], $user->firstName);
        $this->assertNull($user->isBot);
        $this->assertNull($user->lastName);
        $this->assertNull($user->username);
        $this->assertNull($user->languageCode);
        $this->assertNull($user->isPremium);
        $this->assertNull($user->photoUrl);

        return $data;
    }

    /**
     * @depends testMake
     */
    public function testMakeFull(array $data)
    {
        $data['is_bot']        = true;
        $data['last_name']     = 'Засадинський';
        $data['username']      = 'CrazyTapokUA';
        $data['language_code'] = 'uk';
        $data['is_premium']    = false;
        $data['photo_url']     = 'https://t.me/i/userpic/320/7gMg9ZfoSzMQcLwYiEj4rLAofXXn0wOBV9HXGb6c1T0.jpg';

        $user = new User($data);

        $this->assertTrue($user->isBot);
        $this->assertEquals($data['last_name'], $user->lastName);
        $this->assertEquals($data['username'], $user->username);
        $this->assertEquals($data['language_code'], $user->languageCode);
        $this->assertFalse($user->isPremium);
        $this->assertEquals($data['photo_url'], $user->photoUrl);
    }
}