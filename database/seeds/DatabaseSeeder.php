<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
       $this->call(CategoryTableSeeder::class);
        $this->call(ExamProviderTableSeeder::class);
       $this->call(MonthTableSeeder::class);
//        $this->call(OptionTableSeeder::class);
//        $this->call(QuestionTableSeeder::class);
        $this->call(SessionTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
       $this->call(InstructionTableSeeder::class);
//        $this->call(ExamTableSeeder::class);
//        $this->call(SystemPreferenceSeeder::class);
//        $this->call(MessageTableSeeder::class);
       /* $this->call(FriendshipTableSeeder::class);
        $this->call(ProfileTableSeeder::class);*/

    }
}
