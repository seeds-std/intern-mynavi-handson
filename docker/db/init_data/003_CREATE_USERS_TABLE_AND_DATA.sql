CREATE TABLE IF NOT EXISTS users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    sex VARCHAR(255),
    theme_color VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO `users`(`name`, `sex`, `theme_color`)
VALUES ('原', '男性', '銀'), ('山本', '女性', 'ターコイズブルー'), ('藤田', '男性', 'サーモン'), ('山口', '女性', '銀'), ('山崎', 'その他', 'サーモン'), ('野村', NULL, 'シアン'), ('杉山', '女性', NULL), ('西村', '男性', '灰色'), ('清水', NULL, 'プラム'), ('佐々木', '男性', 'ライム'), ('杉山', NULL, '金'), ('松本', NULL, '黄'), ('松本', 'その他', NULL), ('森', '女性', NULL), ('藤田', '女性', '青'), ('原田', '女性', 'オーキッド'), ('藤田', '男性', NULL), ('内田', 'その他', 'プラム'), ('後藤', '男性', NULL), ('野口', '男性', NULL), ('平野', '女性', NULL), ('大塚', '男性', '黒'), ('田村', NULL, 'ティール'), ('後藤', '男性', 'ターコイズブルー'), ('中川', 'その他', 'ピンク'), ('森田', '男性', 'バイオレット'), ('宮崎', NULL, '緑'), ('中村', '女性', 'ライム'), ('柴田', '女性', 'ターコイズブルー'), ('小野', '女性', '黄');
