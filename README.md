# Yêu cầu
- Cài đặt [Composer](https://getcomposer.org/)
- Cài đặt [NodeJS](https://nodejs.org/en/) 
- Máy chủ CSDL MySQL chạy ở cổng 3306
- Tạo một CSDL (Schema) có tên là NhaTro
- Tạo biến môi trường cho php.exe

# Hướng dẫn chạy
## Với lần khởi chạy đầu tiên
1. Chạy cmd ở trong thư mục dự án

2. Cài đặt các phụ thuộc của composer:
```bash
composer install
```
3. Cài đặt cac phụ thuộc của npm
```bash
npm install
```
4. Chèn CSDL mẫu
```bash
php artisan migrate:refresh --seed
```
4. Tạo key cho trình sinh mã tự động
```bash
php artisan key:generate
```
5. Chạy Server (Cổng mặc định 8000)
```bash
php artisan serve
```
## Với lần chạy thứ 2 trở đi, chỉ cần 1 lệnh
```bash
php artisan serve
```
# Các lệnh trong quá trình chạy
- Làm mới lại dữ liệu mẫu
```bash
php artisan migrate:refresh --seed
```
- Chạy lệnh biên dịch sass và js khi sửa code scss và js (mỗi lần chạy sẽ biên dịch 1 lần)
```bash
npm run dev
```
- Chạy lệnh biên dịch sass và js khi sửa code scss và js (sẽ tự động biên dịch khi có thay đổi các file này)
```bash
npm run dev
```
