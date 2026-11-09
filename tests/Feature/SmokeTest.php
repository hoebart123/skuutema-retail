<?php
namespace Tests\Feature;
use Tests\TestCase;
class SmokeTest extends TestCase {
    public function test_status_endpoint(): void { $this->getJson('/api/status')->assertOk()->assertJsonPath('status', 'ok'); }
    public function test_homepage(): void { $this->get('/')->assertOk()->assertSee('Skuutema Retail'); }
}
