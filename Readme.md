1. Mô tả: Website kho ứng dụng di động

2. Danh sách thành viên
	-51900214: Phan Quang Thái
	-51900053: Nguyễn Thanh Duy
	-51900068: Trần Công Hậu

3. Link đã deploy:
	- http://dthdoan.epizy.com
	- Tài khoản admin: thaiad, mật khẩu: 123456
	- Tài khoản developer 1: thaidev, mật khẩu: 123456 
	- Tài khoản developer 2: duydev, mật khẩu: 123456 
	- Tài khoản developer 3: haudev, mật khẩu: 123456 
	- Tài khoản developer 4: Garena, mật khẩu: 123456 
	- Tài khoản developer 5: Facebook, mật khẩu: 123456
	- Tài khoản developer 6: Google LLC, mật khẩu: 123456
	- Tài khoản user 1: duyuser, mật khẩu: 123456 
	- Tài khoản user 2: hauuser, mật khẩu: 123456 
	- Tài khoản user 3: hunguser, mật khẩu: 123456
	- Tài khoản user 4: thaiuser, mật khẩu: 123456

	- Link vào xem database (local): 
		- localhost:8888/phpmyadmin
		- Tài khoản: thaiphan- 123456

4. Cách chạy demo
	1. Copy nội dung trong thư mục 'source' vào trong 'htdocs' của XAMPP
	2. Vào source/config/database.php điều chỉnh thông tin dòng số 7 -> 10 cho phù hợp với cài đặt của máy hiện tại.
	3. Import 'database.sql' vào phpMyAdmin
	4. Khởi động XAMPP và truy cập http://localhost:8888

	(cung cấp thêm danh sách tài khoản dùng để đăng nhập: admin, developer, user...)

5. Các ghi chú khác (nếu cần thiết)

- Khi muốn đổi sang hosting:
		hostname: sql301.epizy.com
		username: epiz_28621327
		pwd: VRcE9gn7WL8vyTQ
		db: epiz_28621327_database

- Khi muốn đổi sang localhost:
	    	define('HOST','127.0.0.1');
    		define('USER','thaiphan');
    		define('PASS','123456');
    		define('DB','database');

*Chỉnh lại dữ liệu thích hợp trong: db.php; connect.php; class/rating.php

	