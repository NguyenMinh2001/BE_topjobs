<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Thêm dữ liệu mẫu vào bảng Tens
        Job::create([
                'title' => 'Chuyên Viên Tuyển Dụng',
                'description'=>'Tuyển dụng: 70%
                - Tìm kiếm ứng viên: sắp xếp pv, gửi thư mời làm việc, follow ứng viên sau khi vào làm.
                - Thực hiện các quy trình cần thiết trong tuyển dụng theo vùng miền.
                Đào tạo: 30%
                - Đón tiếp và tổ chức lớp học theo khóa chung
                - Tham gia đào tạo trực tiếp cùng ứng viên trong tuần đầu tại trụ sở làm việc.
                - Một số các việc khác theo sự phân công của quản lý',
                'location' => '- Quảng Ninh: Số 1 đường 25/4 phường Bạch Đằng, Tp Hạ Long',
                'salary' => '10-12 triệu',
                'type' =>'part-time',
                'company_id' => '1',
                'requirement' => 'Nam/nữ tốt nghiệp Đại học chuyên ngành quản trị, kinh tế hoặc các chuyên ngành liên quan
                Có 01 năm kinh nghiệm trong công tác tuyển dụng, có định hướng nhân sự lâu dài
                Thành thạo sử dụng các công cụ khác phục vụ cho việc tuyển dụng
                Ưu tiên có kĩ năng giao tiếp tốt
                Tác phong nhanh nhẹn chuyên nghiệp có tinh thần và trách nhiệm cao trong công việc.',
                'benefit' => 'Thu nhập: Lương cứng + % doanh số, thu nhập tối thiểu 10 - 12 triệu/tháng
                Hưởng các chế độ BHXH, phúc lợi theo quy định của nhà nước, lương tháng 13
                Môi trường chuyên nghiệp, chủ động và thân thiện.
                Thưởng đặc biệt, thưởng quý, năm, lễ Tết, ngày thành lập ngành, du lịch, nghỉ mát hàng năm
                Tham gia tất cả các khóa học về kỹ năng, chuyên môn làm việc do công ty tổ chức
                Team building, Du lịch hàng năm, thưởng sinh nhật, thưởng nghành',
                'deadline' => '2023-05-30',
                'status' => 'hiển thị', 
                'quantity' => '4',
                'position' => 'Nhân viên',
        ]);
        Job::create([
            'title' => 'Chuyên Viên Tư Vấn',
            'description'=>'Tuyển dụng: 70%
            - Tìm kiếm ứng viên: sắp xếp pv, gửi thư mời làm việc, follow ứng viên sau khi vào làm.
            - Thực hiện các quy trình cần thiết trong tuyển dụng theo vùng miền.
            Đào tạo: 30%
            - Đón tiếp và tổ chức lớp học theo khóa chung
            - Tham gia đào tạo trực tiếp cùng ứng viên trong tuần đầu tại trụ sở làm việc.
            - Một số các việc khác theo sự phân công của quản lý',
            'location' => '- Quảng Ninh: Số 1 đường 25/4 phường Bạch Đằng, Tp Hạ Long',
            'salary' => '10-12 triệu',
            'type' =>'part-time',
            'company_id' => '1',
            'requirement' => 'Nam/nữ tốt nghiệp Đại học chuyên ngành quản trị, kinh tế hoặc các chuyên ngành liên quan
            Có 01 năm kinh nghiệm trong công tác tuyển dụng, có định hướng nhân sự lâu dài
            Thành thạo sử dụng các công cụ khác phục vụ cho việc tuyển dụng
            Ưu tiên có kĩ năng giao tiếp tốt
            Tác phong nhanh nhẹn chuyên nghiệp có tinh thần và trách nhiệm cao trong công việc.',
            'benefit' => 'Thu nhập: Lương cứng + % doanh số, thu nhập tối thiểu 10 - 12 triệu/tháng
            Hưởng các chế độ BHXH, phúc lợi theo quy định của nhà nước, lương tháng 13
            Môi trường chuyên nghiệp, chủ động và thân thiện.
            Thưởng đặc biệt, thưởng quý, năm, lễ Tết, ngày thành lập ngành, du lịch, nghỉ mát hàng năm
            Tham gia tất cả các khóa học về kỹ năng, chuyên môn làm việc do công ty tổ chức
            Team building, Du lịch hàng năm, thưởng sinh nhật, thưởng nghành',
            'deadline' => '2023-05-30',
            'status' => 'hiển thị', 
            'quantity' => '4',
            'position' => 'Nhân viên',
    ]);
        
    }
}
