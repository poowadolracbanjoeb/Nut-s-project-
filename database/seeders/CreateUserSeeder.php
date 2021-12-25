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
                'id' => '613020565-8',
                'name' => 'บุญมา ดัตวทฤษ',
                'email' => '1@1',
                'password' => bcrypt('1'),
                'tel' =>'0812345678',
                'studentDegree' =>'1',
                'studentFaculty' =>'วิทยาศาสตร์',
                'studentScore' =>'100',
                'id_role' =>'1',
                'id_room' =>'102_14_2_2564_2',


            ], [
                #กรรมการหอพัก
                'id' => '603020585-2',
                'name' => 'ชาครีย์สร เถกิงศักดิ์',
                'email' => '2@2',
                'password' => bcrypt('2'),
                'tel' =>'0852155698',
                'studentDegree' =>'2',
                'studentFaculty' =>'วิศวกรรมศาสตร์',
                'studentScore' =>'86',
                'id_role' =>'2',
                'id_room' =>'123_2_1_2564_2',
            ], [
                #ประธานหอพัก
                'id' => '603020585-2',
                'name' => 'วเรณย์ กัญจนญากิตติ์',
                'email' => '3@3',
                'password' => bcrypt('3'),
                'tel' =>'0852568998',
                'studentDegree' =>'2',
                'studentFaculty' =>'นิติศาสตร์',
                'studentScore' =>'98',
                'id_role' =>'3',
                'id_room' =>'123_2_1_2564_2',
            ], [
                #ที่ปรึกษาหอพัก
                'id' => '',
                'name' => 'ธีร์สิรธนัศ ปรีย์สุนาเรศ',
                'email' => '4@4',
                'password' => bcrypt('4'),
                'tel' =>'0812345678',
                'studentDegree' =>'',
                'studentFaculty' =>'',
                'studentScore' =>'',
                'id_role' =>'4',
                'id_room' =>'0_5_5_2564_2',
            ], [
                #หัวหน้าหน่วยบริการหอพัก
                'id' => '',
                'name' => 'ปัณฑ์ธร คุณัญญา',
                'email' => '5@5',
                'password' => bcrypt('5'),
                'tel' =>'0812345678',
                'studentDegree' =>'',
                'studentFaculty' =>'',
                'studentScore' =>'',
                'id_role' =>'5',
                'id_room' =>'0',
            ],[
                #ผู้อำนวยการกองบริการหอพัก
                'id' => '',
                'name' => 'อุตสาหะ ภัคศิณีพิชญ์',
                'email' => '6@6',
                'password' => bcrypt('6'),
                'tel' =>'0812555678',
                'studentDegree' =>'',
                'studentFaculty' =>'',
                'studentScore' =>'',
                'id_role' =>'6',
                'id_room' =>'0',
            ],[
                #หัวหน้าหน่วยสารสนเทศ
                'id' => '',
                'name' => 'อุตสาหะ ภัคศิณีพิชญ์',
                'email' => '7@7',
                'password' => bcrypt('7'),
                'tel' =>'0652345678',
                'studentDegree' =>'',
                'studentFaculty' =>'',
                'studentScore' =>'',
                'id_role' =>'7',
                'id_room' =>'0',
            ]

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
