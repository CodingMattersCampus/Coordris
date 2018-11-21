<?php

namespace Tests\Feature\EvacuationCenter;

use App\Models\Center;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EvacuationCenterRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = \factory(User::class)->create();

        $payload = [
            'name'  => "Gabby D Gab",
            'city_id' => 1,
            'barangay_id' => 1,
            'infrastructure_id' => 1,
        ];

        $response = $this->actingAs($user)
            ->post(\route('centers.registration'), $payload);

        $center = Center::where($payload)->first();

        $response->assertRedirect(\route('center.detail', compact('center')));
    }
}
