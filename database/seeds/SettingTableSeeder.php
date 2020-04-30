<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          App\Setting::create([
            'site_name' => 'Laravel Blog',
            'address' => 'Padang',
            'contact_number' => '0845-testnumber',
            'contact_email' => 'admin@admin.com',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'google' => 'https://www.google.com/',
            'instagram' => 'https://www.instagram.com/',
            'disqus' => 'https://cms-ta2n2pfsfc.disqus.com/embed.js',
            'gmaps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15681.238154507711!2d78.78815172460116!3d10.710591077858545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baa8db5923dbd79%3A0xd30a21f98a307c26!2sHAPP%20Township%20Quarters%2C%20Elandapatti%2C%20Tamil%20Nadu%20620025!5e0!3m2!1sen!2sin!4v1587832743607!5m2!1sen!2sin" width="100" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'about_us' => 'about us',
            'logo' => 'logo.png',
            'nav_logo' => 'logo.png',
            'title_images' => 'title.png',
            'meta_description' => 'Blog Laravel',
            'meta_keywords' => 'Traveling, Blog, Entertainment, Music',
            'google_analystic' => '<!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164532341-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag("js", new Date());

              gtag("config", "UA-164532341-1");
            </script>'


        ]);
    }
}
