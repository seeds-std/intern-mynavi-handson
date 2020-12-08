# はじめに
インターンシップに参加していただきありがとうございます

# フォルダの構成
- `demo/playground.php`... ほぼ何もないPHPのファイルです。自由にお使いください
- `demo/xss.php`... XSSを体験できるファイルです
- `private/database.php`... DBの設定が入っております
- `private/exception_handler.php`... エラー画面用のファイルです
- `private/helper.php`... ヘルパー関数が定義されたファイルです
- `confirm.php`... 投稿時の確認画面です
- `confirm_delete.php`... 削除時の確認画面です
- `deleted.php`... 削除完了画面です
- `edit_complete.php`... 編集完了画面です
- `editing.php`... 編集画面です
- `index.php`... トップ画面です
- `register.php`... 登録完了画面です

# 開発環境の立ち上げ
```shell
docker-compose up -d
```
ブラウザで [http://localhost/index.php](http://localhost/index.php) にアクセスしてください

# 編集順
本日は下記の順に編集していきます
1. `index.php`
1. `confirm.php`
1. `register.php`
1. `index.php`
1. `editing.php`
1. `edit_complete.php`
1. `confirm_delete.php`
1. `deleted.php`

# 時間に余裕があった場合...
`編集画面` と `編集完了画面` の間に、確認画面を追加してみましょう
