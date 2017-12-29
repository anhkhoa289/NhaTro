# Yêu cầu 
- Máy chủ CSDL MySQL chạy ở cổng 3306
- Tạo một CSDL (Schema) có tên là NhaTro
- Cài đặt [Composer](https://getcomposer.org/)
- Cài đặt [NodeJS](https://nodejs.org/en/)

# Với lần khởi chạy đầu tiên
1. Chạy cmd ở trong thư mục dự án

Cài đặt các phụ thuộc của composer:
```bash
composer install
```
Cài đặt cac phụ thuộc của npm
```bash
npm install
```
```bash
php artisan migrate:refresh --seed
```

