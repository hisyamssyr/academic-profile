<?php

namespace Tests\Feature;

use Tests\TestCase;

class AcademicProfileRoutesTest extends TestCase
{
    public function test_home_and_student_profile_routes_are_available(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertViewIs('home');

        $this->get(route('mahasiswa.detail', ['nrp' => '5025241130']))
            ->assertOk()
            ->assertViewIs('mahasiswa.detail');
    }

    public function test_valid_but_unlisted_nrp_shows_not_found_view(): void
    {
        $this->get(route('mahasiswa.detail', ['nrp' => '5025241999']))
            ->assertOk()
            ->assertViewIs('mahasiswa.notfound');
    }

    public function test_agent_overview_unknown_theme_and_invalid_ip_are_handled(): void
    {
        $this->get(route('agent.show'))
            ->assertOk()
            ->assertViewIs('agent.show');

        $this->get(route('agent.show', ['tema' => 'unknown-agent']))
            ->assertOk()
            ->assertViewIs('agent.unknown');

        $this->get(route('ipk.hitung', ['ip1' => '4.20', 'ip2' => '3.90']))
            ->assertOk()
            ->assertSee('Nilai tidak valid');
    }

    public function test_unmatched_url_uses_custom_fallback_page(): void
    {
        $this->get('/routing-tidak-ada')
            ->assertNotFound()
            ->assertViewIs('errors.fallback');
    }
}
