<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SchoolDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_details')->insert([
            'vision'           => 'Creation of a civilization of love based on truth, justice and fellowship.',
            'mission'          => 'Facilitate the integral development of each child to the fullest possible potential. Each child has an enormous capacity to contribute in creating a civilization of love. Therefore, to develop each child as a global citizen with knowledge that goes beyond the boundaries, skills that can cope up with the universal demands and a value system which facilitates effective functioning in a multicultural society. Interact creatively with all the stakeholders and translate the legitimate dreams of families, society and nations to reality.',
            'name'             => 'Grace International School',
            'logo'             => '',
            'about'            => 'Lorem Ipsum, Lorem Ipsum',
            'rules'            => 'Lorem Ipsum, Lorem Ipsum',
            'responsibility'   => 'Lorem Ipsum, Lorem Ipsum',
            'accreditation'    => 'Lorem Ipsum, Lorem Ipsum',
            'chairman_message' => 'Lorem Ipsum, Lorem Ipsum',
            'achievements'     => 'Lorem Ipsum, Lorem Ipsum',
            'principal_message'=> 'Lorem Ipsum, Lorem Ipsum',
            'patron_message'   => 'Lorem Ipsum, Lorem Ipsum',
            'address'          => 'Lorem Ipsum, Lorem Ipsum',
            'phone1'           => '8281360978',
            'phone2'           => '',
            'facebook'         => '',
            'twitter'          => '',
            'instagram'        => '',
            'skype'            => '',
            'linkedin'         => '',
            'email'            => Str::random(10).'@gmail.com',

            
        ]);
    }
}
