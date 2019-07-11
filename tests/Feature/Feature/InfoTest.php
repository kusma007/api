<?php

namespace Tests\Feature\Feature;

use App\Info;
use Tests\TestCase;

class InfoTest extends TestCase
{
    public function testsInfoAreCreatedCorrectly()
    {
        $payload = [
            'name' => 'Lorem',
            'email' => 'test@test.test',
            'description' => 'Ipsum'
        ];

        $response = $this->json('POST', '/api/infos', $payload);

        $response
            ->assertStatus(201)
            ->assertJson(['id' => 1, 'name' => 'Lorem', 'email' => 'test@test.test', 'description' => 'Ipsum']);
    }

    public function testsInfoAreUpdatedCorrectly()
    {
        $info = factory(Info::class)->create([
            'name' => 'Lorem test',
            'email' => 'test1@test.test',
            'description' => 'Ipsum test'
        ]);

        $payload = [
            'id' => $info->id,
            'name' => 'Lorem',
            'email' => 'test2@test.test',
            'description' => 'Ipsum'
        ];

        $response = $this->json('PUT', '/api/infos/' . $info->id, $payload)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'name' => 'Lorem', 'email' => 'test2@test.test', 'description' => 'Ipsum']);
    }

    public function testsInfoAreDeletedCorrectly()
    {
        $info = factory(Info::class)->create([
            'name' => 'Lorem test',
            'email' => 'test1@mail.ru',
            'description' => 'Ipsum test'
        ]);

        $this->json('DELETE', '/api/infos/' . $info->id, [])
            ->assertStatus(204);
    }

    public function testInfosAreListedCorrectly()
    {
        $first = [
            'name' => 'First Name',
            'email' => 'first-test@mail.ru',
            'description' => 'First Description'
        ];

        $second = [
            'name' => 'Second Name',
            'email' => 'second-test@mail.ru',
            'description' => 'Second Description'
        ];

        factory(Info::class)->create($first);
        factory(Info::class)->create($second);

        $assertJson = [$first, $second];

        $response = $this->json('GET', '/api/infos', [])
            ->assertStatus(200)
            ->assertJson($assertJson)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'email', 'description'],
            ]);
    }
}
