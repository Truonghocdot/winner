# Winner WordPress

Project này chạy local bằng `php -S` và có sẵn cấu hình mẫu để deploy lên VPS với `nginx` + `php-fpm`.

## Local

1. Tạo `.env` từ `.env.example`.
2. Điền thông tin MySQL local.
3. Chạy:

```bash
./run-local.sh
```

Mở `http://127.0.0.1:8000`.

## VPS

1. Clone repo vào thư mục web, ví dụ `/var/www/winner`.
2. Tạo `.env` từ `.env.production.example`.
3. Điền domain thật, DB name, DB user, DB password.
4. Tạo database MySQL:

```sql
CREATE DATABASE winner_prod CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'winner_user'@'127.0.0.1' IDENTIFIED BY 'cJ@cL[1£8OZ2';
GRANT ALL PRIVILEGES ON winner_prod.* TO 'winner_user'@'127.0.0.1';
FLUSH PRIVILEGES;
```

5. Dùng [nginx-wordpress.conf.example](/home/truonghocdot/Desktop/Workspace/lungocthang/nginx-wordpress.conf.example) làm mẫu virtual host và đổi:
   - `server_name`
   - `root`
   - socket `php-fpm` nếu phiên bản PHP khác `8.3`
6. Phân quyền:

```bash
sudo chown -R www-data:www-data /var/www/winner
sudo find /var/www/winner -type d -exec chmod 755 {} \\;
sudo find /var/www/winner -type f -exec chmod 644 {} \\;
sudo chmod 640 /var/www/winner/.env
```

7. Reload dịch vụ:

```bash
sudo nginx -t
sudo systemctl reload nginx
sudo systemctl reload php8.3-fpm
```

8. Mở domain và hoàn tất cài đặt WordPress nếu database còn trống.

## Ghi chú production

- Không cần `router.php` hay `run-local.sh` trên VPS.
- `wp-cli.phar` chỉ để thao tác quản trị, không bắt buộc cho production.
- Nếu dùng HTTPS, đặt đúng `WP_HOME` và `WP_SITEURL` trong `.env`.
# winner
