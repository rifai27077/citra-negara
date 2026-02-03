<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoMetaTagsTest extends TestCase
{
    /**
     * Test landing page has correct SEO meta tags.
     */
    public function test_landing_page_has_correct_title(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<title>Citra Negara - Sekolah Unggulan SMK, SMA, SMP di Depok</title>', false);
    }

    public function test_landing_page_has_meta_description(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('meta name="description"', false);
        $response->assertSee('Yayasan At-Taqwa Kemiri Jaya', false);
    }

    public function test_landing_page_has_open_graph_tags(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('og:title', false);
        $response->assertSee('og:description', false);
        $response->assertSee('og:image', false);
        $response->assertSee('og:url', false);
        $response->assertSee('og:type', false);
        $response->assertSee('og:site_name', false);
    }

    public function test_landing_page_has_twitter_card_tags(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('twitter:card', false);
        $response->assertSee('twitter:title', false);
        $response->assertSee('twitter:description', false);
        $response->assertSee('twitter:image', false);
    }

    public function test_landing_page_has_canonical_link(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('rel="canonical"', false);
    }

    /**
     * Test SMK page has correct SEO meta tags.
     */
    public function test_smk_page_has_correct_title(): void
    {
        $response = $this->get('/smk');

        $response->assertStatus(200);
        $response->assertSee('<title>SMK Citra Negara - Sekolah Kejuruan Unggulan di Depok</title>', false);
    }

    public function test_smk_page_has_correct_meta_description(): void
    {
        $response = $this->get('/smk');

        $response->assertStatus(200);
        $response->assertSee('TJKT', false);
        $response->assertSee('PPLG', false);
        $response->assertSee('DKV', false);
    }

    /**
     * Test SMA page has correct SEO meta tags.
     */
    public function test_sma_page_has_correct_title(): void
    {
        $response = $this->get('/sma');

        $response->assertStatus(200);
        $response->assertSee('<title>SMA Citra Negara - Sekolah Menengah Atas Unggulan di Depok</title>', false);
    }

    public function test_sma_page_has_correct_meta_description(): void
    {
        $response = $this->get('/sma');

        $response->assertStatus(200);
        $response->assertSee('IPA', false);
        $response->assertSee('IPS', false);
    }

    /**
     * Test SMP page has correct SEO meta tags.
     */
    public function test_smp_page_has_correct_title(): void
    {
        $response = $this->get('/smp');

        $response->assertStatus(200);
        $response->assertSee('<title>SMP Citra Negara - Sekolah Menengah Pertama Unggulan di Depok</title>', false);
    }

    public function test_smp_page_has_correct_meta_description(): void
    {
        $response = $this->get('/smp');

        $response->assertStatus(200);
        $response->assertSee('Tahfidz', false);
    }

    /**
     * Test Berita page has correct SEO meta tags.
     */
    public function test_berita_page_has_correct_title(): void
    {
        $response = $this->get('/berita');

        $response->assertStatus(200);
        $response->assertSee('<title>Berita &amp; Informasi Terkini - Citra Negara</title>', false);
    }

    /**
     * Test Kontak page has correct SEO meta tags.
     */
    public function test_kontak_page_has_correct_title(): void
    {
        $response = $this->get('/kontak');

        $response->assertStatus(200);
        $response->assertSee('<title>Hubungi Kami - Kontak Citra Negara</title>', false);
    }

    /**
     * Test all pages return 200 status.
     */
    public function test_all_main_pages_are_accessible(): void
    {
        $pages = ['/', '/smk', '/sma', '/smp', '/berita', '/kontak', '/akademik'];

        foreach ($pages as $page) {
            $response = $this->get($page);
            $response->assertStatus(200);
        }
    }
}
