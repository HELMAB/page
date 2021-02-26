<?php

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        $app_name = config('app.name', 'APP NAME');

        $terms_of_use_en = str_replace('$APP_NAME$', $app_name, file_get_contents(public_path('pages/terms_of_use_en.txt')));
        $terms_of_use_km = str_replace('$APP_NAME$', $app_name, file_get_contents(public_path('pages/terms_of_use_km.txt')));
        $privacy_policy_en = str_replace('$WEBSITE_NAME$', $app_name, file_get_contents(public_path('pages/privacy_policy_en.txt')));
        $privacy_policy_km = str_replace('$WEBSITE_NAME$', $app_name, file_get_contents(public_path('pages/privacy_policy_km.txt')));

        $pages = [
            [
                'title_en' => 'Terms and Conditions',
                'title_km' => 'ល័ក្ខខ័ណ្ឌ',
                'type' => config('page.types.terms-and-conditions'),
                // 'apps' => ['tenant', 'landlord'],
                'content_en' => $terms_of_use_en,
                'content_km' => $terms_of_use_km,
            ],
            [
                'title_en' => 'Privacy Policy',
                'title_km' => 'គោលការណ៍​ភាព​ឯកជន',
                'type' => config('page.types.privacy-policy'),
                // 'apps' => ['tenant', 'landlord'],
                'content_en' => $privacy_policy_en,
                'content_km' => $privacy_policy_km,
            ]
        ];

        foreach ($pages as $page) {
            // foreach ($page['apps'] as $app) {
                Page::create([
                    'title_en' => $page['title_en'],
                    'title_km' => $page['title_km'],
                    'content_en' => $page['content_en'],
                    'content_km' => $page['content_km'],
                    'type' => $page['type'],
                    // 'app' => $app,
                    'active' => true,
                ]);
            // }
        }
    }
}
