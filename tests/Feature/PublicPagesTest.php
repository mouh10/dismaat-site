<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads(): void
    {
        $this->get(route('home'))->assertOk();
    }

    public function test_about_page_loads(): void
    {
        $this->get(route('about'))->assertOk();
    }

    public function test_services_page_loads(): void
    {
        Service::factory()->create(['is_active' => true]);

        $this->get(route('services.index'))->assertOk();
    }

    public function test_products_catalogue_and_detail_page_load(): void
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id, 'is_active' => true]);

        $this->get(route('products.index'))->assertOk();
        $this->get(route('products.show', $product->slug))->assertOk();
    }

    public function test_articles_list_and_detail_page_load(): void
    {
        $article = Article::factory()->create(['is_published' => true, 'published_at' => now()->subDay()]);

        $this->get(route('articles.index'))->assertOk();
        $this->get(route('articles.show', $article->slug))->assertOk();
    }

    public function test_contact_form_stores_message(): void
    {
        $this->get(route('contact.index'))->assertOk();

        $response = $this->post(route('contact.store'), [
            'name' => 'Jean Client',
            'email' => 'jean.client@example.com',
            'message' => 'Bonjour, je souhaite un devis pour 10 ordinateurs.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'jean.client@example.com',
        ]);
    }

    public function test_contact_form_requires_name_email_and_message(): void
    {
        $response = $this->post(route('contact.store'), []);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_sitemap_is_accessible_and_lists_pages(): void
    {
        $category = Category::factory()->create();
        Product::factory()->create(['category_id' => $category->id, 'is_active' => true]);
        Article::factory()->create(['is_published' => true, 'published_at' => now()->subDay()]);

        $response = $this->get(route('sitemap'));

        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $response->assertSee(route('home'), false);
        $response->assertSee(route('products.index'), false);
    }

    public function test_responses_include_basic_security_headers(): void
    {
        $response = $this->get(route('home'));

        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    }

    public function test_unknown_url_returns_branded_404(): void
    {
        $response = $this->get('/cette-page-n-existe-pas');

        $response->assertStatus(404);
        $response->assertSee('Page introuvable');
    }
}
