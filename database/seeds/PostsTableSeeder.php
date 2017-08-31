<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id' => '1',
                'title' => 'Welcome to Hongha Intranet!',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cum debitis dolore earum eius enim expedita fuga impedit iure, laborum laudantium nihil nisi pariatur, repellat sint tempore temporibus ut voluptas.Esse iure, voluptatibus? Ad aliquid aperiam assumenda consequatur consequuntur culpa ducimus et eum facere impedit ipsa maiores minima nam nostrum, quis quod ratione recusandae saepe soluta totam ut veniam voluptas!',
                'image' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'title' => 'Hồng Hà giành giải Khuyến khích Giải cầu lông Công nhân lao động trong các KCN tỉnh Hà Nam 2017',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cum debitis dolore earum eius enim expedita fuga impedit iure, laborum laudantium nihil nisi pariatur, repellat sint tempore temporibus ut voluptas.Esse iure, voluptatibus? Ad aliquid aperiam assumenda consequatur consequuntur culpa ducimus et eum facere impedit ipsa maiores minima nam nostrum, quis quod ratione recusandae saepe soluta totam ut veniam voluptas!',
                'image' => 'news1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'title' => 'Hồng Hà tổng kết hoạt động kinh doanh Quý II- 2017',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cum debitis dolore earum eius enim expedita fuga impedit iure, laborum laudantium nihil nisi pariatur, repellat sint tempore temporibus ut voluptas.Esse iure, voluptatibus? Ad aliquid aperiam assumenda consequatur consequuntur culpa ducimus et eum facere impedit ipsa maiores minima nam nostrum, quis quod ratione recusandae saepe soluta totam ut veniam voluptas!',
                'image' => 'news2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'title' => 'Thống kê chăn nuôi Việt Nam về số lượng đầu con và sản phẩm lợn, gia cầm tính đến tháng 4/2017',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cum debitis dolore earum eius enim expedita fuga impedit iure, laborum laudantium nihil nisi pariatur, repellat sint tempore temporibus ut voluptas.Esse iure, voluptatibus? Ad aliquid aperiam assumenda consequatur consequuntur culpa ducimus et eum facere impedit ipsa maiores minima nam nostrum, quis quod ratione recusandae saepe soluta totam ut veniam voluptas!',
                'image' => 'news1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'title' => 'Sản phẩm thuỷ sản Cánh buồm đỏ lọt top 10 sản phẩm chất lượng cao Việt Nam 2017',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cum debitis dolore earum eius enim expedita fuga impedit iure, laborum laudantium nihil nisi pariatur, repellat sint tempore temporibus ut voluptas.Esse iure, voluptatibus? Ad aliquid aperiam assumenda consequatur consequuntur culpa ducimus et eum facere impedit ipsa maiores minima nam nostrum, quis quod ratione recusandae saepe soluta totam ut veniam voluptas!',
                'image' => 'news2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
