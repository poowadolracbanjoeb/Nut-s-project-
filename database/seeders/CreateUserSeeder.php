<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;


class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                #นักศึกษา
                'id_users' => '613854556-8',
                'name' => 'บุญมา ดัตวทฤษ',
                'email' => '1@1',
                'password' => bcrypt('1'),
                'tel' =>'0812345678',
                'student_degree' =>'1',
                'student_faculty' =>'วิทยาศาสตร์',
                'id_role' =>'1',

            ], [
                #กรรมการหอพัก
                'id_users' => '603785986-8',
                'name' => 'ชาครีย์สร เถกิงศักดิ์',
                'email' => '2@2',
                'password' => bcrypt('2'),
                'tel' =>'0852155698',
                'student_degree' =>'2',
                'student_faculty' =>'วิศวกรรมศาสตร์',
                'id_role' =>'2',
            ], [
                #ประธานหอพัก
                'id_users' => '603452635-6',
                'name' => 'วเรณย์ กัญจนญากิตติ์',
                'email' => '3@3',
                'password' => bcrypt('3'),
                'tel' =>'0852568998',
                'student_degree' =>'2',
                'student_faculty' =>'นิติศาสตร์',
                'id_role' =>'3',
            ], [
                #ที่ปรึกษาหอพัก
                'id_users' => '603456985-9',
                'name' => 'ธีร์สิรธนัศ ปรีย์สุนาเรศ',
                'email' => '4@4',
                'password' => bcrypt('4'),
                'tel' =>'0812345678',
                'student_degree' =>'',
                'student_faculty' =>'',
                'id_role' =>'4',
            ], [
                #หัวหน้าหน่วยบริการหอพัก
                'id_users' => '456235659-8',
                'name' => 'ปัณฑ์ธร คุณัญญา',
                'email' => '5@5',
                'password' => bcrypt('5'),
                'tel' =>'0812345678',
                'student_degree' =>'',
                'student_faculty' =>'',
                'id_role' =>'5',
            ],[
                #ผู้อำนวยการกองบริการหอพัก
                'id_users' => '789456123-9',
                'name' => 'อุตสาหะ ภัคศิณีพิชญ์',
                'email' => '6@6',
                'password' => bcrypt('6'),
                'tel' =>'0812555678',
                'student_degree' =>'',
                'student_faculty' =>'',
                'id_role' =>'6'
            ],[
                #หัวหน้าหน่วยสารสนเทศ
                'id_users' => '321654987-3',
                'name' => 'อุตสาหะ ภัคศิณีพิชญ์',
                'email' => '7@7',
                'password' => bcrypt('7'),
                'tel' =>'0652345678',
                'student_degree' =>'',
                'student_faculty' =>'',
                'id_role' =>'7',
            ]

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
