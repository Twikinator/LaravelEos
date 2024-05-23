<?php

use App\Models\Member;
use Illuminate\Testing\Fluent\AssertableJson;

it('has welcome page')->get('/')->assertStatus(200);

it('show member works', function() {
    $memberId = 65;
    $response = $this->getJson('/api/members/' . $memberId);
    $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('id', $memberId)
            ->etc()
        );
});

it('index member works', function() {
    $response = $this->getJson('/api/members');
    $response->assertStatus(200);
});

it('store member works', function() {
    $response = $this->postJson('/api/members', [
        "name" => "John",
        "surname" => "Doe",
        "email" =>"o.oo@gmail.com",
        "date_of_birth" => "1990-01-01"
    ]);
    $response->assertStatus(201);
}); 

it('update member works', function() {
    $memberId = 65;
    $response = $this->putJson('/api/members/' . $memberId, [
        "name" => "John",
        "surname" => "Doe",
        "email" => "tq.t@gmail.com",
        "date_of_birth" => "1990-01-01"
    ]);
    $response->assertStatus(200);
});

it('delete member works', function() {
    $memberId = 60;
    $response = $this->deleteJson('/api/members/' . $memberId);
    $response->assertStatus(204);
});

it('attach tag to member works', function() {
    $memberId = 65;
    $response = $this->postJson('/api/members/' . $memberId, [
        "tag_id" => 1
    ]);
    $response->assertStatus(200);
});