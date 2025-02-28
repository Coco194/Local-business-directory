<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Web Development',
                'category_description' => 'Web development services including website design, coding, and hosting.',
                'category_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRLL6yKkwt0jnRyZ9Is91fsqri71p8SiGRhw&s',
            ],
            [
                'category_name' => 'Electrician',
                'category_description' => 'Professional electrical services for homes and businesses, including installations and repairs.',
                'category_image' => 'https://cdn.lincolntech.edu/f00000000044097/www.lincolntech.edu/sites/default/files/styles/960x/public/2024-03/0124_Hero-Electrician-6_CR3743%20%282%29.jpg?itok=dWo5tIVp',
            ],
            [
                'category_name' => 'Mechanic',
                'category_description' => 'Car repair and maintenance services, including engine diagnostics and oil changes.',
                'category_image' => 'https://www.atsinc.com/hubfs/Blogs/Corporate%20Recruiting/What%20is%20a%20Diesel%20Mechanic/WhatisDieselMechanic4.png',
            ],
            [
                'category_name' => 'Plumber',
                'category_description' => 'Plumbing services for leaks, installations, and water system repairs.',
                'category_image' => 'https://metropha.com/wp-content/uploads/2018/09/Metro-Plumbing-_-6-Characteristics-That-An-Emergency-Plumber-In-Chattanooga-TN-Must-Have.jpg',
            ],
            [
                'category_name' => 'Painter',
                'category_description' => 'Interior and exterior painting services, including wall preparation and finishing.',
                'category_image' => 'https://mattthepainter.com/wp-content/uploads/professional-painters-1024x683.jpg',
            ],
            [
                'category_name' => 'Carpenter',
                'category_description' => 'Custom woodwork, furniture creation, and building repairs.',
                'category_image' => 'https://mccoymart.com/post/wp-content/uploads/The-Top-10-Benefits-Of-Hiring-A-Professional-Carpenter.jpg',
            ],
            [
                'category_name' => 'Gardener',
                'category_description' => 'Landscaping, lawn care, and garden maintenance services.',
                'category_image' => 'https://media.angi.com/s3fs-public/pro-gardener.jpg',
            ],
            [
                'category_name' => 'Cleaning Services',
                'category_description' => 'Residential and commercial cleaning services, including deep cleaning and routine maintenance.',
                'category_image' => 'https://scrubnbubbles.com/wp-content/uploads/2022/05/cleaning-service.jpeg',
            ],
            [
                'category_name' => 'Construction',
                'category_description' => 'Construction and renovation services for residential, commercial, and industrial projects.',
                'category_image' => 'https://www.cfisherconstruction.com/wp-content/uploads/2022/11/Project-Management-Tips-Chad-Fisher-Construction.jpg',
            ],
            [
                'category_name' => 'Tutoring',
                'category_description' => 'Private tutoring for students in various subjects, including math, science, and languages.',
                'category_image' => 'https://www.pace.edu/sites/default/files/styles/16_9_1600x900/public/2022-07/education-why-soe-accreditation-hero.jpg?h=854a7be2&itok=JqmLvo1n',
            ],
        ];
        foreach ($categories as $key => $category) {
            Category::create($category);
        }        
    }
}
