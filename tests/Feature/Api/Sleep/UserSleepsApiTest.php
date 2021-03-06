<?php

namespace Tests\Feature\Api\Sleep;

use Tests\Feature\Api\UserApiTestCase;

class UserSleepsApiTest extends UserApiTestCase
{
     /**
     * Test REST API sleeps index
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/api/sleeps');
        $response->assertStatus(200)->assertJsonStructure([
            'success',
            'record_count',
            'data' => [
                '*'  => [
                    'id',
                    'user_id',
                    'in_bed_at',
                    'until',
                    'duration',
                    'asleep',
                    'time_awake_in_bed',
                    'fell_asleep_in',
                    'quality_sleep',
                    'deep_sleep',
                    'heartrate',
                    'tags',
                    'notes',
                    'created_at',
                    'updated_at'
                ]
            ],
            'message'
        ]);
    }

    /**
     * Test REST API sleeps me
     *
     * @return void
     */
    public function testMe()
    {
        $response = $this->get('/api/me/sleeps');
        $response->assertStatus(200)->assertJsonStructure([
            'success',
            'record_count',
            'data' => [
                '*'  => [
                    'id',
                    'user_id',
                    'in_bed_at',
                    'until',
                    'duration',
                    'asleep',
                    'time_awake_in_bed',
                    'fell_asleep_in',
                    'quality_sleep',
                    'deep_sleep',
                    'heartrate',
                    'tags',
                    'notes',
                    'created_at',
                    'updated_at'
                ]
            ],
            'message'
        ]);
    }

    /**
     * Test REST API sleeps show
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->get('/api/sleeps/' . $this->sleepData->id);
        $response->assertStatus(200)->assertJsonStructure([
            'success',
            'record_count',
            'data' => [
                'id',
                'user_id',
                'in_bed_at',
                'until',
                'duration',
                'asleep',
                'time_awake_in_bed',
                'fell_asleep_in',
                'quality_sleep',
                'deep_sleep',
                'heartrate',
                'tags',
                'notes',
                'created_at',
                'updated_at'
            ],
            'message'
        ]);
    }

    /**
     * Test REST API sleep data not found
     *
     * @return void
     */
    public function testShowNotFound()
    {
        $response = $this->get('/api/sleeps/999999999999');
        $response->assertStatus(404)->assertJsonStructure([
            'success',
            'data',
            'message'
        ]);
    }
}
