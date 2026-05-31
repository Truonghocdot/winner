# WordPress local scaffold

Project này chạy trực tiếp bằng PHP built-in server cho local dev, và có sẵn mẫu Nginx cho môi trường `php-fpm`.

## Local

1. Tạo file `.env` từ `.env.example`.
2. Cập nhật thông tin MySQL trong `.env`.
3. Chạy:

```bash
./run-local.sh
```

Sau đó mở `http://127.0.0.1:8000`.

## VPS

- Trỏ web root về thư mục project này.
- Dùng file `nginx-wordpress.conf.example` làm mẫu virtual host.
- Đảm bảo `php-fpm`, `mysqli`, `pdo_mysql`, `curl`, `gd`, `mbstring`, `xml`, `zip` đã được cài.
# winner
