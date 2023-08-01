<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Seeder;
use League\HTMLToMarkdown\HtmlConverter;

class PublicationSeeder extends Seeder
{
    public function run(): void
    {
        foreach (json_decode(file_get_contents(database_path('seeders/files/publication.json')), true) as $data) {
            $this->createModel($data);
        }
    }

    private function createModel(array $data): self
    {
        $converter = new HtmlConverter();
        Publication::create([
            'user_id' => 1,
            'slug' => $data['slug'],
            'country_id' => $data['country_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'text' => [
                'en' => $converter->convert($data['text']['en'] ?? ''),
                'uk' => $converter->convert($data['text']['uk'] ?? ''),
            ],
            'views_count' => (int)$data['views_count'],
            'published_at' => $data['published_at'],
        ]);
        return $this;
    }
}
