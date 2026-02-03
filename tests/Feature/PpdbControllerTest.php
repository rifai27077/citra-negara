<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PpdbControllerTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * Test PPDB/SPMB page is accessible.
     */
    public function test_ppdb_page_is_accessible(): void
    {
        $response = $this->get('/spmb');

        $response->assertStatus(200);
    }

    /**
     * Test PPDB form validation for required fields.
     */
    public function test_ppdb_form_validation_required_fields(): void
    {
        $response = $this->post('/ppdb/store', []);

        $response->assertSessionHasErrors([
            'nama',
            'nisn',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'alamat',
            'sekolah_asal',
            'alamat_sekolah',
            'jurusan',
        ]);
    }

    /**
     * Test PPDB form validation for max length.
     */
    public function test_ppdb_form_validation_max_length(): void
    {
        $response = $this->post('/ppdb/store', [
            'nama' => str_repeat('A', 101), // max 100
            'nisn' => str_repeat('1', 21), // max 20
            'tempat_lahir' => str_repeat('B', 51), // max 50
            'tanggal_lahir' => '2010-01-01',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Test',
            'sekolah_asal' => str_repeat('C', 101), // max 100
            'alamat_sekolah' => 'Alamat Sekolah',
            'jurusan' => 'PPLG',
        ]);

        $response->assertSessionHasErrors([
            'nama',
            'nisn',
            'tempat_lahir',
            'sekolah_asal',
        ]);
    }

    /**
     * Test PPDB form with valid data passes validation.
     */
    public function test_ppdb_form_with_valid_data_passes_validation(): void
    {
        $validData = [
            'nama' => 'John Doe',
            'nisn' => '1234567890',
            'tempat_lahir' => 'Depok',
            'tanggal_lahir' => '2010-05-15',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Raya Test No. 123',
            'sekolah_asal' => 'SMP Negeri 1 Depok',
            'alamat_sekolah' => 'Jl. Sekolah No. 456',
            'jurusan' => 'PPLG',
        ];

        $response = $this->post('/ppdb/store', $validData);

        // Should not have validation errors
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test SMK PPDB store route works.
     */
    public function test_smk_ppdb_store_route_works(): void
    {
        $validData = [
            'nama' => 'Jane Doe',
            'nisn' => '0987654321',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2009-08-20',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Merdeka No. 10',
            'sekolah_asal' => 'SMP Citra Negara',
            'alamat_sekolah' => 'Jl. Tanah Baru No. 99',
            'jurusan' => 'TJKT',
        ];

        $response = $this->post('/smk/ppdb/store', $validData);

        $response->assertSessionHasNoErrors();
    }
}
