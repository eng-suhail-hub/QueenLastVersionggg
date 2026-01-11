<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UniversityPost;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostLike>
 */
class PostLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'university_posts_id' => UniversityPost::factory(),
            'user_id' => User::factory(),
        ];
    }

    /**
     * Attach like to an existing post.
     */
    public function forPost(UniversityPost $post): static
    {
        return $this->state(fn () => [
            'university_posts_id' => $post->id,
        ]);
    }

    /**
     * Attach like from an existing user.
     */
    public function byUser(User $user): static
    {
        return $this->state(fn () => [
            'user_id' => $user->id,
        ]);
    }
}
