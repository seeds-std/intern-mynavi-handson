<?php

/* ---------------------------------------------------------------- *
 * このファイルは[PHPからデータベースへの接続]の問題です
 *
 * usersというテーブルで theme_color が 黄 となっている
 * データを全て表示するためのプログラムを書いてください
 *
 * テーブルには
 * id, name, sex, theme_color, created_at, updated_at
 * というカラムがあります
 *
 * sex, theme_color はデータがない可能性があります
 * データがない場合は「データなし」と出力してください
 * ---------------------------------------------------------------- */

define('DB_HOST', 'db');
define('DB_PORT', 3306);
define('DB_NAME', 'bbs');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 問題があった場合に例外を出す
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
