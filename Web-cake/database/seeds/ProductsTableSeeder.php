<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name'=>'Bánh mặn thập cẩm','category_id'=>'1','description'=> '','unit_price'=>50000,'promotion_price'=>'0','image'=>'banhmanthapcap.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Bánh Chocolate Trái cây','category_id'=>'2','description'=> '','unit_price'=>150000,'promotion_price'=>'0','image'=>'banhsocolatraicay.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh sinh nhật rau câu trái cây','category_id'=>'3','description'=> '','unit_price'=>120000,'promotion_price'=>110000,'image'=>'banhsinhnhatraucau.jpg','unit'=>'cái','new'=>'1'],
            // ['name'=>'Bánh Frenc','category_id'=>'1','description'=> '','unit_price'=>160000,'promotion_price'=>150000,'image'=>'banhbonglantrung.jpg','un1it'=>'cái','new'=>'1'],
            ['name'=>'Bánh Crepe Sầu riêng','category_id'=>'5','description'=> '','unit_price'=>150000,'promotion_price'=>120000,'image'=>'banhcrepesaurieng.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh Crepe Sầu riêng Chocolate','category_id'=>'5','description'=> '','unit_price'=>180000,'promotion_price'=>170000,'image'=>'banhcrepechuoi.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh Crepe Đào','category_id'=>'5','description'=> 'Hương vị vô cùng lạ từ Đào tươi','unit_price'=>160000,'promotion_price'=>'0','image'=>'banhcrepedao.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh Crepe Chuối','category_id'=>'5','description'=> '','unit_price'=>160000,'promotion_price'=>'0','image'=>'banhcrepechuoi.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh Crepe Dứa','category_id'=>'5','description'=> '','unit_price'=>160000,'promotion_price'=>'0','image'=>'banhcrepdua.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh Crepe Táo','category_id'=>'5','description'=> '','unit_price'=>160000,'promotion_price'=>150000,'image'=>'banhcrepetao.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh Crepe Socola Pháp','category_id'=>'5','description'=> '','unit_price'=>160000,'promotion_price'=>150000,'image'=>'banhcrepesocola.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh Crepe Trà xanh Pháp','category_id'=>'5','description'=> '','unit_price'=>180000,'promotion_price'=>'0','image'=>'banhcrepetraxanh2.jpg','unit'=>'hộp','new'=>'0'],

            ['name'=>'Bánh Gato Trái cây Việt Quất','category_id'=>'3','description'=> '','unit_price'=>250000,'promotion_price'=>'0','image'=>'banhgatovietquat.jpg','unit'=>'hộp','new'=>'1'],
            // ['name'=>'Bánh kem Chocolate Dâu','category_id'=>'3','description'=> '','unit_price'=>240000,'promotion_price'=>'0','image'=>'banhkem-dau.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh trái cây','category_id'=>'3','description'=> '','unit_price'=>120000,'promotion_price'=>'0','image'=>'banhtraicay.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Apple Cake','category_id'=>'3','description'=> '','unit_price'=>200000,'promotion_price'=>'0','image'=>'applecake.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Peach Cake','category_id'=>'2','description'=> '','unit_price'=>160000,'promotion_price'=>'0','image'=>'Peach-Cake.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh kem Sakurra','category_id'=>'2','description'=> '','unit_price'=>130000,'promotion_price'=>'0','image'=>'banhkemsakura.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh bông lan trứng muối ','category_id'=>'1','description'=> '','unit_price'=>110000,'promotion_price'=>'0','image'=>'banh-bong-lan-trung-muoi.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh mỳ Australia','category_id'=>'1','description'=> '','unit_price'=>25000,'promotion_price'=>'0','image'=>'banhmiautralia.jpg','unit'=>'ổ','new'=>'0'],
            ['name'=>'Bánh Muffins trứng','category_id'=>'1','description'=> '','unit_price'=>100000,'promotion_price'=>'0','image'=>'muffintrung.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh kem Doraemon','category_id'=>'4','description'=> 'Tạo hình Doremon ngộ nghĩnh','unit_price'=>200000,'promotion_price'=>'0','image'=>'banhkemdoremon.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh kem chanh dây','category_id'=>'4','description'=> 'Kèm kiwi','unit_price'=>220000,'promotion_price'=>'0','image'=>'banhkemchanhday.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Bánh kem flower','category_id'=>'4','description'=> '','unit_price'=>170000,'promotion_price'=>'0','image'=>'banhkemflower.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh kem Matcha','category_id'=>'4','description'=> '','unit_price'=>180000,'promotion_price'=>'0','image'=>'banhkemmatcha.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Beefy Pizza','category_id'=>'6','description'=> 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella','unit_price'=>180000,'promotion_price'=>'0','image'=>'turkey_sausage_pizza_lo-1-670x405.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Hawaii Pizza','category_id'=>'6','description'=> 'Sốt cà chua, ham , dứa, pho mai mozzarella','unit_price'=>180000,'promotion_price'=>'0','image'=>'hawaipiza.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Smoke Chicken Pizza','category_id'=>'6','description'=> 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.','unit_price'=>190000,'promotion_price'=>180000,'image'=>'smokepiaza.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Ocean Pizza','category_id'=>'6','description'=> 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, pho..','unit_price'=>180000,'promotion_price'=>170000,'image'=>'pizzahaisan.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Pizza nấm','category_id'=>'6','description'=> 'Nấm tươi ','unit_price'=>150000,'promotion_price'=>'0','image'=>'pizza nam.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh su kem sữa tươi','category_id'=>'7','description'=> '','unit_price'=>120000,'promotion_price'=>'0','image'=>'banhsukemsuatuoi.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh su kem sữa tươi chiên giòn','category_id'=>'7','description'=> '','unit_price'=>130000,'promotion_price'=>'0','image'=>'banhsuatuoicheingion.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh su kem ','category_id'=>'7','description'=> '','unit_price'=>110000,'promotion_price'=>'0','image'=>'banhsukem.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh su kem socola ','category_id'=>'7','description'=> '','unit_price'=>110000,'promotion_price'=>'0','image'=>'banh-su-kem-ca-phe-1.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh su kem phô mai','category_id'=>'7','description'=> '','unit_price'=>110000,'promotion_price'=>'0','image'=>'banhsumkemphomai.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh socola sinh nhật','category_id'=>'4','description'=> '','unit_price'=>130000,'promotion_price'=>'0','image'=>'banhsocolasn.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh sinh nhật cute','category_id'=>'4','description'=> '','unit_price'=>150000,'promotion_price'=>'0','image'=>'banhsinhnhatcaube.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh sinh nhật 2 tầng','category_id'=>'4','description'=> 'Sữa và hương dâu','unit_price'=>220000,'promotion_price'=>'0','image'=>'banhsinhnhat2tang.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh sinh nhật RedVelvet','category_id'=>'4','description'=> 'Style Korean','unit_price'=>250000,'promotion_price'=>240000,'image'=>'redvelvetred.jpg','unit'=>'cái','new'=>'1'],
            ['name'=>'Bánh Macaron Pháp','category_id'=>'2','description'=> 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh.','unit_price'=>200000,'promotion_price'=>180000,'image'=>'macaronphap.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh Tiramisu','category_id'=>'2','description'=> 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn','unit_price'=>50000,'promotion_price'=>'0','image'=>'tiramisu.jpg','unit'=>'phần','new'=>'0'],
            ['name'=>'Bánh Táo - Mỹ','category_id'=>'2','description'=> 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.','unit_price'=>150000,'promotion_price'=>'0','image'=>'banhtaomy.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh Cupcake - Anh Quốc','category_id'=>'2','description'=> 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau.','unit_price'=>160000,'promotion_price'=>'0','image'=>'cupcakeanhquoc.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh Sachertorte','category_id'=>'2','description'=> 'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. ','unit_price'=>60000,'promotion_price'=>'0','image'=>'Banh Sachertorte.jpg','unit'=>'phần','new'=>'1'],
            ['name'=>'Bánh Pandan','category_id'=>'2','description'=> 'xuất sứ Pháp','unit_price'=>100000,'promotion_price'=>'0','image'=>'banhpandan.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh mochi Nhật Bản','category_id'=>'2','description'=> 'Màu sắc bắt mắt, bánh dẻo thơm','unit_price'=>180000,'promotion_price'=>'0','image'=>'banhmochi.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh Mango','category_id'=>'3','description'=> 'Hương vị Xoài tươi tự nhiên','unit_price'=>150000,'promotion_price'=>'0','image'=>'banhmango.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh sinh nhật người nhện','category_id'=>'4','description'=> 'Tạo hình tinh nghịch dành cho những cậu bé','unit_price'=>140000,'promotion_price'=>'0','image'=>'banhsinhnhatnguoinhen.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh sinh nhật in hình','category_id'=>'4','description'=> 'Khách hàng có quyền yêu cầu in hình theo ý mình thích','unit_price'=>150000,'promotion_price'=>'0','image'=>'banhsninhinh.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh crepe cầu vòng','category_id'=>'5','description'=> 'Concept Thái Lan','unit_price'=>160000,'promotion_price'=>'0','image'=>'banhcrepecauvong.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh bao Hà Nội','category_id'=>'1','description'=> 'Hương Dứa nhân thịt mặn','unit_price'=>15000,'promotion_price'=>'0','image'=>'banhbaohanoi.jpg','unit'=>'cái','new'=>'0'],
            ['name'=>'Bánh Cookie','category_id'=>'2','description'=> '','unit_price'=>150000,'promotion_price'=>'0','image'=>'banhcookie.jpg','unit'=>'hộp','new'=>'0'],
            ['name'=>'Bánh bao KimSa','category_id'=>'2','description'=> '','unit_price'=>120000,'promotion_price'=>'0','image'=>'banhbaokimsa.jpg','unit'=>'hộp','new'=>'1'],
            ['name'=>'Bánh kem mini','category_id'=>'4','description'=> 'Nhỏ nhắn xinh xắn nhìn là muốn ăn','unit_price'=>100000,'promotion_price'=>'0','image'=>'banhkemdayrat.jpg','unit'=>'hộp','new'=>'1'],
        ]);
    }
}
