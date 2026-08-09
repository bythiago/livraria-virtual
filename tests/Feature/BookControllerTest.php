<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_lists_books(): void
    {
        $books = Book::factory()->count(3)->create();

        $this->get(route('books.index'))
            ->assertOk()
            ->assertSee($books[0]->title)
            ->assertSee($books[1]->title)
            ->assertSee($books[2]->title);
    }

    public function test_show_displays_the_book(): void
    {
        $book = Book::factory()->create();

        $this->get(route('books.show', $book))
            ->assertOk()
            ->assertSee($book->title)
            ->assertSee($book->author);
    }

    public function test_create_requires_admin(): void
    {
        $this->get(route('books.create'))
            ->assertRedirect(route('login'));
    }

    public function test_create_page_is_accessible_for_admin(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $this->actingAs($admin)->get(route('books.create'))
            ->assertOk();
    }

    public function test_store_requires_admin(): void
    {
        $data = Book::factory()->make()->toArray();

        $this->post(route('books.store'), $data)
            ->assertRedirect(route('login'));
    }

    public function test_store_creates_a_book(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $data = Book::factory()->make()->toArray();

        $this->actingAs($admin)->post(route('books.store'), $data)
            ->assertRedirect(route('books.index'));

        $this->assertDatabaseHas('books', [
            'title' => $data['title'],
            'author' => $data['author'],
            'isbn' => $data['isbn'],
        ]);
    }

    public function test_store_requires_title_author_and_isbn(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $this->actingAs($admin)->post(route('books.store'), [])
            ->assertSessionHasErrors(['title', 'author', 'isbn']);

        $this->assertDatabaseCount('books', 0);
    }

    public function test_store_rejects_duplicate_isbn(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $existing = Book::factory()->create();

        $this->actingAs($admin)->post(route('books.store'), [
            'title' => 'Outro livro',
            'author' => 'Outro autor',
            'isbn' => $existing->isbn,
        ])->assertSessionHasErrors('isbn');

        $this->assertDatabaseCount('books', 1);
    }

    public function test_edit_requires_admin(): void
    {
        $book = Book::factory()->create();

        $this->get(route('books.edit', $book))
            ->assertRedirect(route('login'));
    }

    public function test_edit_page_is_accessible_for_admin(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $book = Book::factory()->create();

        $this->actingAs($admin)->get(route('books.edit', $book))
            ->assertOk()
            ->assertSee($book->title);
    }

    public function test_update_requires_admin(): void
    {
        $book = Book::factory()->create();

        $this->put(route('books.update', $book), [
            'title' => 'Atualizado',
        ])->assertRedirect(route('login'));
    }

    public function test_update_updates_the_book(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $book = Book::factory()->create();
        $data = [
            'title' => 'Título atualizado',
            'author' => 'Autor atualizado',
            'isbn' => fake()->unique()->isbn13(),
            'published_at' => fake()->date(),
            'description' => 'Descrição atualizada',
        ];

        $this->actingAs($admin)->put(route('books.update', $book), $data)
            ->assertRedirect(route('books.index'));

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => $data['title'],
            'author' => $data['author'],
            'isbn' => $data['isbn'],
        ]);
    }

    public function test_update_keeps_own_isbn(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $book = Book::factory()->create();

        $this->actingAs($admin)->put(route('books.update', $book), [
            'title' => 'Título atualizado',
            'author' => 'Autor atualizado',
            'isbn' => $book->isbn,
        ])->assertRedirect(route('books.index'));

        $this->assertDatabaseHas('books', ['id' => $book->id, 'title' => 'Título atualizado']);
    }

    public function test_update_requires_title_author_and_isbn(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $book = Book::factory()->create();

        $this->actingAs($admin)->put(route('books.update', $book), [])
            ->assertSessionHasErrors(['title', 'author', 'isbn']);
    }

    public function test_destroy_requires_admin(): void
    {
        $book = Book::factory()->create();

        $this->delete(route('books.destroy', $book))
            ->assertRedirect(route('login'));
    }

    public function test_destroy_deletes_the_book(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);
        $book = Book::factory()->create();

        $this->actingAs($admin)->delete(route('books.destroy', $book))
            ->assertRedirect(route('books.index'));

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_regular_user_cannot_access_admin_routes(): void
    {
        $user = User::factory()->create(['role' => UserRole::User]);
        $book = Book::factory()->create();

        $this->actingAs($user)->get(route('books.create'))
            ->assertStatus(403);

        $this->actingAs($user)->get(route('books.edit', $book))
            ->assertStatus(403);

        $this->actingAs($user)->post(route('books.store'), Book::factory()->make()->toArray())
            ->assertStatus(403);

        $this->actingAs($user)->put(route('books.update', $book), ['title' => 'Test'])
            ->assertStatus(403);

        $this->actingAs($user)->delete(route('books.destroy', $book))
            ->assertStatus(403);
    }

    public function test_validation_messages_are_in_pt_br(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $this->actingAs($admin)->post(route('books.store'), [])
            ->assertSessionHasErrors([
                'title' => 'O campo título é obrigatório.',
                'author' => 'O campo autor é obrigatório.',
                'isbn' => 'O campo ISBN é obrigatório.',
            ]);
    }
}
