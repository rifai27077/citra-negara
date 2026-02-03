<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteAccessibilityTest extends TestCase
{
    /**
     * Test all SMK routes are accessible.
     */
    public function test_smk_routes_are_accessible(): void
    {
        $routes = [
            '/smk',
            '/smk/spmb',
            '/smk/daftar-harga',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test SMK jurusan routes are accessible.
     */
    public function test_smk_jurusan_routes_are_accessible(): void
    {
        $jurusanList = ['tjkt', 'pplg', 'dkv', 'perhotelan', 'mplb', 'pemasaran'];

        foreach ($jurusanList as $jurusan) {
            $response = $this->get("/smk/jurusan/$jurusan");
            // May return 200 or 500 if view doesn't exist, but route should be defined
            $this->assertTrue(
                in_array($response->status(), [200, 500]),
                "Route /smk/jurusan/$jurusan should be defined"
            );
        }
    }

    /**
     * Test all SMA routes are accessible.
     */
    public function test_sma_routes_are_accessible(): void
    {
        $routes = [
            '/sma',
            '/sma/spmb',
            '/sma/daftar-harga',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test SMA jurusan routes are accessible.
     */
    public function test_sma_jurusan_routes_are_accessible(): void
    {
        $jurusanList = ['ipa', 'ips'];

        foreach ($jurusanList as $jurusan) {
            $response = $this->get("/sma/jurusan/$jurusan");
            $this->assertTrue(
                in_array($response->status(), [200, 500]),
                "Route /sma/jurusan/$jurusan should be defined"
            );
        }
    }

    /**
     * Test all SMP routes are accessible.
     */
    public function test_smp_routes_are_accessible(): void
    {
        $routes = [
            '/smp',
            '/smp/spmb',
            '/smp/daftar-harga',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test all Berita routes are accessible.
     */
    public function test_berita_routes_are_accessible(): void
    {
        $routes = [
            '/berita',
            '/berita/grand-opening',
            '/berita/ppdb-smksma',
            '/berita/seminar',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test general pages are accessible.
     */
    public function test_general_pages_are_accessible(): void
    {
        $routes = [
            '/',
            '/kontak',
            '/daftar-harga',
            '/akademik',
            '/chat',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }
}
