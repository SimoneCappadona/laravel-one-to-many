<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'FrontEnd',
            'BackEnd',
            'Ui',
            'FullStack',
            'Vue',
            'Laravel',
        ];
        foreach($types as $element){
            $new_type = new Type();
            $new_type->name = $element;
            $new_type->slug = Str::slug($new_type->name);
            $new_type->save();
        }
    }
}
