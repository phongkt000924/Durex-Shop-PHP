-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 10:17 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlidathang`
--
CREATE DATABASE IF NOT EXISTS `quanlidathang` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `quanlidathang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `sodondh` int(11) NOT NULL,
  `mshh` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `giadathang` int(11) DEFAULT NULL,
  `giamgia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`sodondh`, `mshh`, `soluong`, `giadathang`, `giamgia`) VALUES
(1, 3, 5, 49000, 0),
(1, 4, 8, 49000, 0),
(1, 11, 2, 155000, 0),
(2, 7, 10, 49000, 0),
(2, 8, 2, 299000, 0),
(2, 14, 4, 243000, 0),
(3, 5, 3, 129000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `sodondh` int(11) NOT NULL,
  `mskh` int(11) NOT NULL,
  `msnv` int(11) NOT NULL,
  `ngaydh` date DEFAULT NULL,
  `ngaygh` date DEFAULT NULL,
  `trangthaidh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`sodondh`, `mskh`, `msnv`, `ngaydh`, `ngaygh`, `trangthaidh`) VALUES
(1, 1, -1, '2021-11-28', '2021-11-28', 0),
(2, 2, -1, '2021-11-28', '2021-11-28', -1),
(3, 3, -1, '2021-11-28', '2021-11-28', -1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `madc` int(11) NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mskh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mshh` int(11) NOT NULL,
  `tenhh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quycach` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluonghang` int(11) DEFAULT NULL,
  `motahanghoa` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaihang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mshh`, `tenhh`, `quycach`, `gia`, `soluonghang`, `motahanghoa`, `maloaihang`) VALUES
(1, 'Bao Cao Su Durex Kingtex Hộp 12 Cái', 'Hộp', 129000, 50, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX KINGTEX ĐÃ LÀ VÌ: Độ bền bỉ, độ tin cậy cao, chất lượng tuyệt hảo từ năm 1929. Bao cao su tiêu chuẩn của Durex. Có thêm silicone bôi trơn. Bao cao su tiêu chuẩn của Durex vẫn luôn giữ nguyên giá trị về độ bền và chất lượng tuyệt hảo đã được tín nhiệm từ năm 1929. Bao cao su Durex Kingtex có thành bao láng mịn và được bôi trơn sẵn, cho cuộc yêu thêm thú vị, vẫn đảm bảo an toàn với chất lượng bạn luôn tin tưởng từ Durex. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT PHIÊU - Cỡ bao ôm sát (Độ rộng: 49mm), bao cao su latex với chất bôi trơn quen thuộc. Kiểu dáng thẳng, dễ mang vào, có đầu chứa tinh dịch. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 1),
(2, 'Bao Cao Su Durex Kingtex Hộp 3 Cái', 'Hộp', 49000, 40, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX KINGTEX ĐÃ LÀ VÌ: Độ bền bỉ, độ tin cậy cao, chất lượng tuyệt hảo từ năm 1929. Bao cao su tiêu chuẩn của Durex. Có thêm silicone bôi trơn. Bao cao su tiêu chuẩn của Durex vẫn luôn giữ nguyên giá trị về độ bền và chất lượng tuyệt hảo đã được tín nhiệm từ năm 1929. Bao cao su Durex Kingtex có thành bao láng mịn và được bôi trơn sẵn, cho cuộc yêu thêm thú vị, vẫn đảm bảo an toàn với chất lượng bạn luôn tin tưởng từ Durex. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT PHIÊU: Cỡ bao ôm sát (Độ rộng: 49mm), bao cao su latex với chất bôi trơn quen thuộc. Kiểu dáng thẳng, dễ mang vào, có đầu chứa tinh dịch. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 1),
(3, 'Bao Cao Su Durex Jeans Hộp 3 cái', 'Hộp', 49000, 30, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX JEANS ĐÃ LÀ VÌ: Độ bền bỉ, độ tin cậy cao, chất lượng tuyệt hảo từ năm 1929. Bao cao su tiêu chuẩn của Durex. Có thêm chất bôi trơn. Bao cao su tiêu chuẩn của Durex vẫn luôn giữ nguyên giá trị về độ bền và chất lượng tuyệt hảo đã được tín nhiệm từ năm 1929. Bao cao su Durex Jeans có thành bao láng mịn và được bôi trơn sẵn, cho cuộc yêu thêm thú vị, vẫn đảm bảo an toàn với chất lượng bạn luôn tin tưởng từ Durex. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT PHIÊU - Cỡ bao thông thường (Độ rộng: 52.5mm), bao cao su latex với chất bôi trơn quen thuộc. Kiểu dáng easy-on, dễ mang vào, có đầu chứa tinh dịch. Có thêm chất bôi trơn. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 1),
(4, 'Bao Cao Su Durex Performa Hộp 3 Cái', 'Hộp', 49000, 40, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX PERFORMA ĐÃ LÀ VÌ: Chứa chất bôi trơn Performa™ giúp kéo dài thời gian quan hệ. Dễ mang vào. Ít nặng mùi cao su. Bao cao su Durex Performa chứa chất bôi trơn Performa™ có tác dụng làm chậm con đường lên đỉnh, giúp chàng càng thêm hưng phấn và kéo dài cuộc yêu. Được cải tiến về thiết kế và mùi hương để bạn xung trận chẳng cần lo toan. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT ĐỈNH - Chứa chất bôi trơn Performa™ với 5% benzocaine, một chất gây tê cục bộ giúp chàng yêu lâu hơn. Dễ mang vào, có đầu chứa tinh dịch, thành bao trơn láng và có chu vi lớn (Độ rộng 52mm). Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 2),
(5, 'Bao Cao Su Durex Performa Hộp 12 Cái', 'Hộp', 129000, 50, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX PERFORMA ĐÃ LÀ VÌ: Chứa chất bôi trơn Performa™ giúp kéo dài thời gian quan hệ. Dễ mang vào. Ít nặng mùi cao su. Bao cao su Durex Performa chứa chất bôi trơn Performa™ có tác dụng làm chậm con đường lên đỉnh, giúp chàng càng thêm hưng phấn và kéo dài cuộc yêu. Được cải tiến về thiết kế và mùi hương để bạn xung trận chẳng cần lo toan. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT ĐỈNH - Chứa chất bôi trơn Performa™ với 5% benzocaine, một chất gây tê cục bộ giúp chàng yêu lâu hơn. Dễ mang vào, có đầu chứa tinh dịch, thành bao trơn láng và có chu vi lớn (Độ rộng 52mm). Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 2),
(6, 'Bao Cao Su Durex Pleasuremax Hộp 12 Cái', 'Hộp', 129000, 50, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX PLEASUREMAX ĐÃ LÀ VÌ: Thiết kế đặc biệt, hướng đến cảm nhận của nàng. Có gân và chấm nổi giúp tăng khoái cảm. Kiểu dáng easy-on giúp dễ mang vào. Bao cao su có gân và chấm nổi Durex Pleasuremax được thiết kế đặc biệt, hướng đến cảm nhận của nàng. Vị trí của những đường gân và chấm nổi gần miệng bao được tính toán hợp lý để tăng cường kích thích vật lý, tăng thêm khoái cảm cho nàng. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT ĐỈNH - Bao với kiểu dáng easy-on giúp dễ mang, có đầu chứa tinh dịch, có gân và chấm nổi tăng kích thích. Có gel bôi trơn silicone dạng thường. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 4),
(7, 'Bao Cao Su Durex Pleasuremax Hộp 3 Cái', 'Hộp', 49000, 30, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX PLEASUREMAX ĐÃ LÀ VÌ: Thiết kế đặc biệt, hướng đến cảm nhận của nàng. Có gân và chấm nổi giúp tăng khoái cảm. Kiểu dáng easy-on giúp dễ mang vào. Bao cao su có gân và chấm nổi Durex Pleasuremax được thiết kế đặc biệt, hướng đến cảm nhận của nàng. Vị trí của những đường gân và chấm nổi gần miệng bao được tính toán hợp lý để tăng cường kích thích vật lý, tăng thêm khoái cảm cho nàng. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT ĐỈNH - Bao với kiểu dáng easy-on giúp dễ mang, có đầu chứa tinh dịch, có gân và chấm nổi tăng kích thích. Có gel bôi trơn silicone dạng thường. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 4),
(8, 'Gel Bôi Trơn Durex Play Massage 200ml', 'Chai', 299000, 200, 'BẠN SẼ MÊ NGAY GEL BÔI TRƠN DUREX PLAY MASSAGE LÀ VÌ: Thuần gốc nước, bôi trơn nhẹ nhàng với tinh chất lô hội. Có thể dùng để mát-xa toàn thân hoặc bôi trơn cho cuộc yêu thêm mượt. Không mùi, không nhờn dính, dễ dàng rửa sạch khi đã hoàn toàn dứt điểm. Lựa chọn hoàn hảo khi bạn muốn có một màn dạo đầu chậm rãi cùng khoái cảm lan toả khắp cơ thể, nhẹ nhàng thư giãn cơ bắp cũng như tiếp thêm hứng khởi để lâm trận thật sung. Công thức gốc nước dịu nhẹ thích hợp để mát xa toàn thân, giúp cô bé trơn và mượt hơn. An toàn khi sử dụng cùng bao cao su. Biết càng nhiều thực hành càng chuẩn, đừng quên đọc kỹ các hướng dẫn sử dụng trước khi dùng. DÀNH CHO CUỘC YÊU MƯỢT MÀ - Chứa tinh chất lô hội dịu nhẹ. Thật mượt mà và êm ái, công thức nhẹ nhàng phù hợp sử dụng toàn thân, cũng như bất kỳ kiểu mây mưa nào bạn muốn: bằng miệng, cửa trước hay cửa hậu. Thích hợp khi sử dụng cùng bao cao su. ', 5),
(9, 'Gel Bôi Trơn Durex Play Classic 50ml', 'Chai', 69000, 100, 'BẠN SẼ MÊ NGAY GEL BÔI TRƠN DUREX PLAY CLASSIC LÀ VÌ: Gel bôi trơn dịu nhẹ, thuần gốc nước cho khoái cảm dâng trào. Giảm bớt sự khó chịu do cô bé bị khô. Dễ dàng rửa sạch khi đã hoàn toàn dứt điểm. Đơn giản nhưng vô cùng mạnh mẽ, cho cuộc yêu mượt mà như là mơ. Hãy luôn giữ Durex Play Classic ngay tầm tay, để luôn sẵn sàng khi khoái cảm mời gọi. Gel bôi trơn thuần gốc nước được thiết kế để lứa đôi trải nghiệm yêu mượt mà hơn bao hết. Sử dụng vài giọt để tăng độ trơn mượt khi quan hệ và làm giảm sự khó chịu do cô bé khô. Với công thức thuần gốc nước, không nhờn dính, dịu nhẹ cho toàn thân, bạn có thể an tâm sử dụng với bất kỳ kiểu mây mưa nào: bằng miệng, cửa trước, cửa hậu, cũng như khi sử dụng cùng bao cao su. DÀNH CHO CUỘC YÊU MƯỢT MÀ - Thuần gốc nước, không màu. Không nhờn dính, giúp giảm khó chịu và bôi trơn cô bé. An toàn khi sử dụng cùng bao cao su.', 5),
(10, 'Gel Bôi Trơn Durex Play Classic 100ml', 'Chai', 192000, 150, 'BẠN SẼ MÊ NGAY GEL BÔI TRƠN DUREX PLAY CLASSIC LÀ VÌ: Gel bôi trơn dịu nhẹ, thuần gốc nước cho khoái cảm dâng trào. Giảm bớt sự khó chịu do cô bé bị khô. Dễ dàng rửa sạch khi đã hoàn toàn dứt điểm. Đơn giản nhưng vô cùng mạnh mẽ, cho cuộc yêu mượt mà như là mơ. Hãy luôn giữ Durex Play Classic ngay tầm tay, để luôn sẵn sàng khi khoái cảm mời gọi. Gel bôi trơn thuần gốc nước được thiết kế để lứa đôi trải nghiệm yêu mượt mà hơn bao hết. Sử dụng vài giọt để tăng độ trơn mượt khi quan hệ và làm giảm sự khó chịu do cô bé khô. Với công thức thuần gốc nước, không nhờn dính, dịu nhẹ cho toàn thân, bạn có thể an tâm sử dụng với bất kỳ kiểu mây mưa nào: bằng miệng, cửa trước, cửa hậu, cũng như khi sử dụng cùng bao cao su. DÀNH CHO CUỘC YÊU MƯỢT MÀ - Thuần gốc nước, không màu. Không nhờn dính, giúp giảm khó chịu và bôi trơn cô bé. An toàn khi sử dụng cùng bao cao su.', 5),
(11, 'Gel Bôi Trơn Durex Play Strawberry 100ml', 'Chai', 155000, 120, 'BẠN SẼ MÊ NGAY GEL BÔI TRƠN DUREX PLAY STRAWBERRY LÀ VÌ: Tận hưởng hương vị dâu tây quyến rũ. Không chứa đường. Dễ dàng rửa sạch khi dứt điểm cuộc yêu. Ai mà lại không mê dâu tây? Durex tinh tế chắt lọc hương vị thơm ngon của loại trái cây vô cùng được yêu thích, kết hợp vào trong gel bôi trơn Durex Play Strawberry mới. Thơm đậm hương dâu, nồng nàn vị dâu, gel bôi trơn phù hợp với bất kỳ kiểu mây mưa nào bằng miệng, cửa trước, cửa hậu, thậm chí còn được thiết kế với công thức không đường cho bạn tha hồ nuông chiều những khoái cảm cuồng nhiệt nhất. Biết càng nhiều thực hành càng chuẩn, đừng quên đọc kỹ các hướng dẫn sử dụng trước khi dùng. DÀNH CHO CUỘC YÊU MƯỢT MÀ - Công thức mang lại cảm giác mịn mượt và thoải mái. Phù hợp với nhiều kiểu quan hệ khác nhau. Thích hợp dùng chung với bao cao su Durex.', 5),
(12, 'Gel Bôi Trơn Durex Play Warming 100ml', 'Chai', 193000, 151, 'BẠN SẼ MÊ NGAY GEL BÔI TRƠN DUREX PLAY WARMING LÀ VÌ: Chứa chất làm ấm cho trải nghiệm yêu nóng bỏng. Giúp giảm khô cho cô bé. Dễ dàng rửa sạch khi dứt điểm cuộc yêu. Gel bôi trơn gốc nước Durex Play Warming mang lại cảm giác mượt mà và ấm áp, mạnh mẽ xúc tác cho cuộc yêu thêm nóng bỏng. Tăng độ nóng khi quan hệ, đồng thời giảm bớt sự khó chịu do cô bé khô, bạn sẽ có những trải nghiệm yêu vô cùng trơn mượt và thoải mái với gel bôi trơn này. DÀNH CHO CUỘC YÊU MƯỢT MÀ - Thuần gốc nước. An toàn khi sử dụng cùng bao cao su. Phù hợp cho nhiều kiểu quan hệ khác nhau.', 5),
(13, 'Bao Cao Su Durex Invisible Extra Thin, Extra Lubricated Hộp 10 Cái', 'Hộp', 206800, 60, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX INVISIBLE EXTRA THIN, EXTRA LUBRICATED ĐÃ LÀ VÌ: Thiết kế đặc biệt để tăng tối đa xúc cảm nhưng vẫn đảm bảo tiêu chuẩn cao của Durex. Siêu mỏng so với bao cao su tiêu chuẩn của Durex. Thêm nhiều chất bôi trơn cho cuộc yêu thật mượt. Bao cao su Durex Invisible Extra Thin Extra Lubricated được thiết kế để tăng tối đa khoái cảm, nhưng vẫn giữ độ bảo vệ và tính an toàn cao. Có thêm chất bôi trơn cho cuộc yêu thật mượt. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT PHIÊU - Bao cao su latex với kiểu dáng thẳng, có đầu chứa tinh dịch và thêm nhiều chất bôi trơn silicone. Độ rộng: 52mm. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 3),
(14, 'Bao cao su Durex Fether Ultima hộp 12 Cái', 'Hộp', 243000, 56, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX FETHERLITE ULTIMA ĐÃ LÀ VÌ: Bao mỏng hơn giúp thăng hoa hơn. Mang lại cảm giác chân thật gần gũi hơn. Thêm chất bôi trơn cho cuộc yêu thật mượt mà. Bao cao su Durex Fetherlite Ultima mỏng hơn với chất bôi trơn tạo cảm giác mượt mà, khoái cảm. Hãy thử ngay bao cao su Durex Fetherlite Ultima và tận hưởng trải nghiệm yêu thật mới lạ. Thiết kế siêu mỏng, tăng khoái cảm khi quan hệ nhưng vẫn giữ đúng tiêu chuẩn an toàn mà bạn luôn tin tưởng từ Durex. Đồng thời, mang lại cảm giác mượt mà hơn với nhiều chất bôi trơn hơn. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT PHIÊU - Thành bao trong suốt, có đầu chứa tinh dịch với nhiều chất bôi trơn. Độ rộng: 52mm. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 3),
(15, 'Bao Cao Su Durex Fetherlite Hộp 12 Cái', 'Hộp', 213000, 49, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX FETHERLITE ĐÃ LÀ VÌ: Thiết kế mỏng, tăng cường xúc cảm. Cảm giác vừa vặn, ôm khít. Silicone bôi trơn cho cuộc yêu thêm mượt. Bao cao su Durex Fetherlite giúp tăng khoái cảm, sát gần hơn với đối phương khi quan hệ mà vẫn không làm mất đi sự an toàn. Giúp cuộc yêu thêm nồng cháy. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT PHIÊU - Bao được bôi trơn với gel silicone. \r\nKiểu dáng easy-on, độ rộng: 52.5mm. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 3),
(16, 'Bao Cao Su Durex Invisible Extra Thin Extra Sensitive Hộp 10 Cái', 'Hộp', 250000, 52, 'BẠN SẼ MÊ NGAY BAO CAO SU DUREX INVISIBLE EXTRA THIN EXTRA SENSITIVE \"ĐÃ\" LÀ VÌ: Thiết kế siêu mỏng cho cảm giác chân thực nhất. Kiểu dáng thẳng giúp bao vừa vặn, ôm sát. Mỏng nhưng mạnh, đảm bảo an toàn độ an toàn tuyệt đối. Bao cao su Durex Invisible Extra Thin Extra Sensitive được thiết kế để tăng tối đa xúc cảm, nhưng vẫn giữ được độ bảo vệ và an toàn cao. Lưu ý: không phương pháp nào đảm bảo 100% khỏi mang thai ngoài ý muốn, HIV hoặc bệnh lây truyền qua đường tình dục. Bạn hãy đọc kỹ thông tin trong hộp, đặc biệt khi bạn quan hệ qua cửa sau hay bằng miệng. ĐỂ BẠN YÊU THẬT PHIÊU - Bao cao su latex với kiểu dáng thẳng, có đầu chứa tinh dịch và thêm nhiều chất bôi trơn silicone. Độ rộng thông thường: 52mm. Chất lượng Durex: 100% bao cao su Durex được kiểm nghiệm bằng điện tử cùng 5 công đoạn kiểm tra chất lượng, cũng như được kiểm nghiệm trên da.', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `mahinh` int(11) NOT NULL,
  `tenhinh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mshh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`mahinh`, `tenhinh`, `mshh`) VALUES
(1, 'ttcp1.png', 1),
(2, 'ttcp1b.png', 1),
(3, 'ttcp1c.png', 1),
(4, 'ttcp1d.png', 1),
(5, 'ttcp2.jpg', 2),
(6, 'ttcp2b.png', 2),
(7, 'ttcp2c.png', 2),
(8, 'ttcp2d.jpg', 2),
(9, 'ttcp3.jpg', 3),
(10, 'ttcp3b.jpg', 3),
(11, 'ttcp3c.jpg', 3),
(12, 'ttcp3d.jpg', 3),
(13, 'bpsb1.jpg', 4),
(14, 'bpsb1b.png', 4),
(15, 'bpsb1c.png', 4),
(16, 'bpsb1d.jpg', 4),
(17, 'bpsb2.png', 5),
(18, 'bpsb2a.png', 5),
(19, 'bpsb2c.png', 5),
(20, 'bpsb2d.jpg', 5),
(21, 'cndm1.png', 6),
(22, 'cndm1a.png', 6),
(23, 'cndm1c.png', 6),
(24, 'cndm1d.jpg', 6),
(25, 'cndm2.jpg', 7),
(26, 'cndm2a.png', 7),
(27, 'cndm2b.png', 7),
(28, 'cndm2c.jpg', 7),
(29, 'gelboitron1.png', 8),
(30, 'gelboitron2.jpg', 9),
(31, 'gelboitron3.jpg', 10),
(32, 'gelboitron4.jpg', 11),
(33, 'gelboitron5.jpg', 12),
(34, 'thcx1.png', 13),
(35, 'thcx1a.jpg', 13),
(36, 'thcx1c.png', 13),
(37, 'thcx1d.jpg', 13),
(38, 'thcx2.png', 14),
(39, 'thcx2a.png', 14),
(40, 'thcx2c.jpg', 14),
(41, 'thcx2d.png', 14),
(42, 'thcx3.png', 15),
(43, 'thcx3a.png', 15),
(44, 'thcx3c.png', 15),
(45, 'thcx3d.jpg', 15),
(46, 'thcx4.png', 16),
(47, 'thcx4a.jpg', 16),
(48, 'thcx4b.jpg', 16),
(49, 'thcx4d.png', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `mskh` int(11) NOT NULL,
  `hotenkh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tencongty` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` int(10) DEFAULT NULL,
  `sofax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`mskh`, `hotenkh`, `tencongty`, `sodienthoai`, `sofax`) VALUES
(1, 'Kim Thái Phong', 'Công Ty TNHH Giày Da Mỹ Phong', 382840985, '2246913'),
(2, 'Thạch Thần Thắng', 'Công Ty TNHH MTV An Sương', 382869721, '33443849'),
(3, 'Vỏ Hồng Sơn', 'Công Ty TNHH MTV Nước Lọc Tân Việt Tiến', 382869721, '3849633');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `maloaihang` int(11) NOT NULL,
  `tenloaihang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sloganloaihang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motaloaihang` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`maloaihang`, `tenloaihang`, `sloganloaihang`, `motaloaihang`) VALUES
(1, 'Tự Tin Chinh Phục', 'DÒNG BAO CAO SU TỰ TIN CHINH PHỤC', 'Bạn đang tìm kiếm sự đơn giản và an toàn trong cuộc yêu? Dòng bao cao su Tự Tin Chinh Phục chính là sự lựa chọn hoàn hảo dành cho bạn. Với thiết kế tiêu chuẩn dễ sử dụng nhưng vẫn giữ nguyên giá trị về độ bền và chất lượng tuyệt vời, bao cao su tiêu chuẩn được bôi trơn sẵn của chúng tôi chắc chắn sẽ mang lại cho bạn những phút giây tuyệt vời nhất trong cuộc yêu.'),
(2, 'Bức Phá Sức Bền', 'DÒNG BAO CAO SU BỨT PHÁ SỨC BỀN', 'Nhanh ra\" luôn là nỗi lo của cánh mày râu trong cuộc yêu, gây cảm giác hụt hẫng và mất hứng. Dòng bao cao su Bứt Phá Sức Bền chính là trợ thủ đắc lực giúp cánh mày râu tự tin lâm trận hơn. Với thiết kế dễ mang vào, chứa chất bôi trơn đặc biệt cùng mùi hương dịu nhẹ, dòng bao cao su kéo dài thời gian này sẽ giúp bạn cảm thấy hưng phấn và điều khiển cuộc yêu theo cách của mình.'),
(3, 'Thăng Hoa Cảm Xúc', 'DÒNG BAO CAO SU THĂNG HOA CẢM XÚC', 'Nếu bạn ưa thích cảm giác chạm da chân thật trong cuộc yêu, dòng bao cao su Thăng Hoa Cảm Xúc là sự lựa chọn tuyệt vời dành cho bạn. Với thiết kế siêu mỏng, bổ sung lượng gel bôi trơn cùng tiêu chuẩn rất an toàn, dòng bao cao su siêu mỏng này sẽ mang lại cho bạn cảm xúc thăng hoa và mới lạ hơn.'),
(4, 'Cuồng Nhiệt Đam Mê', 'DÒNG BAO CAO SU CUỒNG NHIỆT ĐAM MÊ', 'Bạn đang mong muốn có một đêm cuồng nhiệt đam mê nhưng vẫn đảm bảo sự an toàn tuyệt đối? Đừng lo, dòng bao cao su gân Cuồng Nhiệt Đam Mê của Durex với thiết kế gân và chấm nổi sẽ giúp gia tăng sự ma sát và kích thích, mang lại cho bạn và người ấy cảm giác hưng phấn mãnh liệt hơn trong cuộc yêu.'),
(5, 'Gel Bôi Trơn', 'CÁC SẢN PHẨM GEL BÔI TRƠN TỐT', 'Nếu bạn muốn có thêm sự nhẹ nhàng, mượt mà trong cuộc yêu, hãy thử ngay dòng sản phẩm gel bôi trơn gốc nước của chúng tôi. Gel bôi trơn Durex với công thức gốc nước dịu nhẹ, có thể sử dụng cùng với bao cao su, dễ dàng rửa sạch sau khi kết thức cuộc yêu sẽ giúp bạn gia tăng hương vị của cuộc yêu theo sở thích của bạn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `msnv` int(11) NOT NULL,
  `hotennv` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucvu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`msnv`, `hotennv`, `chucvu`, `diachi`, `sodienthoai`) VALUES
(-1, 'Kim Thái Phong', 'Chủ Shop', 'Đồn Điền - Tân Sơn - Trà Cú - Trà Vinh', 382840985);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`sodondh`,`mshh`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`sodondh`),
  ADD KEY `mskh` (`mskh`),
  ADD KEY `msnv` (`msnv`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`madc`),
  ADD KEY `mskh` (`mskh`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mshh`),
  ADD KEY `maloaihang` (`maloaihang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`mahinh`),
  ADD KEY `mshh` (`mshh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`mskh`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`maloaihang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`msnv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `sodondh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `madc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mshh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `mahinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `mskh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `maloaihang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `msnv` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`mskh`) REFERENCES `khachhang` (`mskh`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`mskh`) REFERENCES `khachhang` (`mskh`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`maloaihang`) REFERENCES `loaihanghoa` (`maloaihang`);

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`mshh`) REFERENCES `hanghoa` (`mshh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
