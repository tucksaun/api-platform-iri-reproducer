<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class GreetingsTest extends ApiTestCase
{
    public function testCreateGreeting(): void
    {
        static::createClient()->request('POST', '/greetings', ['json' => [
            'name' => 'Kévin',
            'options' => [
                'notify' => true,
            ]
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Greeting',
            '@type' => 'Greeting',
            'name' => 'Kévin',
            'options' => [
                '@type' => 'Options',
                'notify' => true,
            ],
            'foo' => [
                '@type' => 'ValueObject',
                'bar' => 42,
            ]
        ]);
    }
}
