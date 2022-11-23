<!--CSDL -MýQL
- là dùng để lưu trữ các thông tin , có tính ổn định và lưu trữ lâu dài
+ web lại cần CSDL ? -> web động
+ MySQL là j ? tên 1 hệ thống quản trị
CSDL : MySQL, SQL Server , NoSQL ,Oracle ,PostgreSQL, MongoDB ...
+MySQL free, hay kết hợp PHP
2/ cài và try cập MySQL
+ XAMM cài sẵn MySQL -> Start module MySQL
+try cập :command line , UI : PHPMyadmin , MySQLWorkbench, Navicat ... hiện tại sẽ sử dụng PHPMyadmin:
http://localhost/phpmyadmin
3/ thuật ngữ : web bán hàng
+ database: tên CSDL : bán hàng
+ Table : là các bảng :lưu thông tin theo từng dối tượng :
users, products, categories ... ( tên bảng nên ở số nhiều )
+ field/column : là các trường mô tả cho các thông tin sẽ lưu trữ về dối tượng của bảng
-usera: fullname , age , phone , adress , username , pasword ...
products : name , price . amount, avatar ...
+Record/row : dữ liệu cụ thể của 1 dói tượng trong bảng :
users:
Fullname = 'namdz'
age = 20
phone = 66666

+ primaky key : khóa trính trong 1 bảng, alf 1 trường phân biệt các bản ghi vs nhau
users:
bản 1 fullname : 'abc', age 19
bản 2 fullname : 'abc', age =  20
+ Foreign key : khóa ngoại, là 1 trường bình thường trong 1 bảng , đồng thời là khóa chính của 1 bảng có liên kết :
categories: id, name, description
products: id, category_id, name ,price
-> quy tắc : < tên-bảng-số-ít>_id
Relation: 1-1, 1 -n, n-1, n-n
4- ngôn ngữ try vấn SQL
+ Structure Query Language
+ là ngôn ngữ dùng để truy vấn CSDL
+ tương ứng với từng CSDL sẽ có 1 ngôn ngữ SQL riêng
+ Sử dụng SQL để tương ứng vs CSDL thông qua PHPMyadmin
5- m=Một số truy vân SQL cơ bản :
+ PHPMyadmin có 2 cách try vấn SQL : command line , UI
-> UI để viết SQL

code CSDL
# 1 - Tạo CSDL:
CREATE DATABASE IF NOT EXISTS php0922e_demo
CHARACTER SET utf8
COLLATE utf8_general_ci;
# 2 - Xóa CSDL
# DROP DATABASE abc;
# 3 - Sửu dụng CSDL: bắt buộc phải có truy vấn này trước khi có thể thao tác dc với bảng ben trong CSDL
USE php0922e_demo;
#4 - kiểu dữ liệu trong MySQl
#- kiểu số : hay dùng TINYINT và INT
#- kiểu chuỗi : hay dùng VARCHAR và TEXT
# - kiểu thời gian : hay dùng DATETIME và TIMESTAMP , đều lưu ngày tháng vsf thời gian  : DATETIME
# lưu ngày giờ thủ công , TIMESTAMP lưu tự dộng (lưu múi giờ của sevver)
# Format bắt buộc tr khi lưu : Y-m-d H:i:s
#vd: 18/06/2003 01:25:06 ->2003-06-18 01:25:06
#5 tạo bảng:
# categories: id, name, description, created_at
CREATE TABLE IF NOT EXISTS categories(
id INT(11) AUTO_INCREMENT,
name VARCHAR(100) NOT NULL, #DEFAULT NULL / ĐỂ CHỐNG
description TEXT DEFAULT NULL ,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);
#products: id, category_id,name,price,created_at
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
category_id INT(11) NOT NULL,
name VARCHAR(150) DEFAULT NULL,
price INT(11) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)

);


# 6 - xóa bảng :
# DROP TABLE abc ;
# 7 - 4 truy vấn cơ bản :
#  a/ INSERT: thêm giữ liêu vào bảng :
# categories: id, name , description, creaated_at
# Chỉ INSERT vào các trường mà giữ liệu của nó k phải là sinh ra tự động, CHỈ THÊM NAME VÀ description
INSERT INTO categories(name, description)
VALUES('THỂ THAO', 'MÔ TẢ THỂ THAO');
# Insert nhiều :
INSERT INTO categories(name, description)
VALUES
('THỂ THAO 1', 'MÔ TẢ THỂ THAO 1'),
('THỂ THAO 2', 'MÔ TẢ THỂ THAO 2'),
('THỂ THAO 3','MÔ TẢ THỂ THAO 3'),
('THỂ THAO 4','MÔ TẢ THỂ THAO 4'),
('THỂ THAO 5','MÔ TẢ THỂ THAO 5');
# b/SELECT: lấy dữ liệu
#- lấy tất cả danh mục đang có
SELECT * FROM categories;
# - lấy id và các name của tất cả dảnh mục:
SELECT id, name FROM categories ;
# lấy danh mục có id >3:
SELECT * FROM categories WHERE id > 3;
#- lấy 4 danh mục đầu tiên không dùng WHERE:
SELECT * FROM categories LIMIT 4;
# - lấy 3 bản ghi tính từ bản ghi thứ 2 trở đi :
SELECT * FROM categories LIMIT 3 OFFSET 2;
SELECT * FROM categories LIMIT 2,3; # ưu tiên
#- tìm các danh mục có tên chứa chuỗi 'thao': ký tự % đại diện cho các ký tự bất kỳ
SELECT * FROM categories WHERE name LIKE '%thao%';
# - lấy các danh mục theo thứ tự mới nhất -> cũ nhất :
#ESC -> dảm dần
 #ASC <- tăng dần
SELECT * FROM categories ORDER BY created_at DESC;
# LẤY các danh mục có id bằng 1 hoặc 2 hoặc 3:
SELECT * FROM categories WHERE id = 1 OR id =2 OR id=3;
 #dùng IN:
 SELECT * FROM categories WHERE id IN (1,2,3);
 #- lấy các danh mục có id nằm trong khoảng 1vs 4;
 SELECT * FROM categories WHERE id>=1 AND id <=4;
 #BETWEEN:
 SELECT * FROM categories WHERE id BETWEEN 1 AND 4;
 #- một số hàm dùng vs select:
 # hàm COUNT: đếm số bản ghi
 SELECT COUNT(id)	AS count_id FROM categories;
 # max min avg sum ..
 #c/ upbate: sửa bản ghi
 # sửa name = abc description = def cho danh mục có id = 1:
 # luôn luôn phải chỉ định điều kiện khi update , nếu k update toàn bộn bảng
 UPDATE categories SET name = 'abc', description = 'def'
 WHERE id = 1;
 # d/ delete: cóa dữ liệu :
 # xóa danh mục có id >5:  chú ý where khi delete , nếu k delete toàn bộ bảng
 DELETE FROM categories WHERE id > 5 ;

 # 8 - IMPORT VÀ EXPORT CSDL:
# export CSDL php0922e_demo sử dụng PHPMyadmin : xuất ra file .sql
# vào csdl muốn export, chọn menu export -> go, chọn lưu file
#- IMPORT file .sql thnhaf 1 csdl mới:
# tạo csdl thủ công chước, đi vào csdl và thực hiện import

# 9- demo truy vấn JOIN:
# tạo csdl php0922e_join, IMPORT file demo_join_db.sql trong ngầy 19

# 9 - join: database php0922e_join
# vd : lấy tất cả sản phẩm kèm theo tên dah=nh mục sản phẩm đó -> sử dụng join và các bảng có liên kết với nhau
# luôn phải chỉ định tên bảng trước tên trường
# có 3 kiểu join chính INNER, LEFT, RIGHT
SELECT products.*, categories.name FROM products
INNER JOIN categories
ON products.category_id = categories.id;

#LEFT JOIN : CÓ THỂ CHẢ VỀ DỮ LIỆU KHÔNG TOÀN VẸN
SELECT products.*, categories.name FROM products
LEFT JOIN categories
ON products.category_id = categories.id;


-->
<?php
