<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ChatbotControllerTest extends TestCase
{
    use WithoutMiddleware;
    protected function setUp(): void
    {
        parent::setUp();
        // Clear rate limiter before each test
        RateLimiter::clear('chatbot:127.0.0.1');
    }

    /**
     * Test chat page is accessible.
     */
    public function test_chat_page_is_accessible(): void
    {
        $response = $this->get('/chat');

        $response->assertStatus(200);
        $response->assertSee('Robi', false);
    }

    /**
     * Test chatbot returns JSON response.
     */
    public function test_chatbot_returns_json_response(): void
    {
        Http::fake([
            'api.groq.com/*' => Http::response([
                'choices' => [
                    ['message' => ['content' => 'Halo! Saya Robi 🤖']]
                ]
            ], 200)
        ]);

        $response = $this->postJson('/chatbot', [
            'message' => 'Halo Robi'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['reply']);
    }

    /**
     * Test chatbot validates minimum message length.
     */
    public function test_chatbot_validates_minimum_message_length(): void
    {
        $response = $this->postJson('/chatbot', [
            'message' => 'Hi'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'reply' => "Pertanyaanmu agak kurang jelas nih, bisa dijelaskan lebih detail? 😊"
        ]);
    }

    /**
     * Test chatbot blocks competitor keywords.
     */
    public function test_chatbot_blocks_competitor_keywords(): void
    {
        $blockedKeywords = ['sman 1 depok', 'smk taruna', 'smk pgri', 'sma negeri'];

        foreach ($blockedKeywords as $keyword) {
            $response = $this->postJson('/chatbot', [
                'message' => "Bagaimana dengan $keyword?"
            ]);

            $response->assertStatus(200);
            $response->assertJsonFragment([
                'reply' => "Maaf, Robi hanya tahu seputar Sekolah Citra Negara aja nih! 🏫 tanya yang lain yuk! (Tentang Citra Negara)"
            ]);
        }
    }

    /**
     * Test chatbot rate limiting.
     */
    public function test_chatbot_rate_limiting(): void
    {
        Http::fake([
            'api.groq.com/*' => Http::response([
                'choices' => [
                    ['message' => ['content' => 'Response']]
                ]
            ], 200)
        ]);

        // Send 5 requests (the limit)
        for ($i = 0; $i < 5; $i++) {
            $this->postJson('/chatbot', ['message' => 'Test message ' . $i]);
        }

        // 6th request should be rate limited
        $response = $this->postJson('/chatbot', ['message' => 'Another test']);

        $response->assertStatus(429);
        $response->assertJsonFragment([
            'reply' => 'Tunggu sebentar ya, Robi lagi mikir dulu... 🧠'
        ]);
    }

    /**
     * Test reset chat clears session.
     */
    public function test_reset_chat_clears_session(): void
    {
        // First, simulate a chat session
        $this->withSession(['chat_history' => [
            ['role' => 'user', 'content' => 'Hello'],
            ['role' => 'assistant', 'content' => 'Hi there!']
        ]]);

        $response = $this->postJson('/chatbot/reset');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Riwayat percakapan dihapus ✅'
        ]);
    }
}
