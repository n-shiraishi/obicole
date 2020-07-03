# Obicole(アプリ名)
[Obicole](http://obicole.herokuapp.com/)  
書籍の帯について、画像と共に記事を投稿できるサービスです。
本屋さんでたまたま見かけた帯のデザインやワードに惹かれて購入を決めたという経験がありませんか？
思わず手にとってしまった帯、心惹かれた帯を共有して新しい出会いのきっかけを。

## 努力した部分
- ユーザー登録機能
- 撮影した画像をアップロード(アップロード先にS3を採用)
- 書籍検索ができる(Google books APIを使用)
- ランキング表示
- いいね機能
- スマホ表示対応
- リアルタイムバリデーション

## Obicole仕様書
- [サイトマップ・データベース図（ER図）](https://cacoo.com/diagrams/JIkrVmHdfCnYeo3F/F8523)
- [ワイヤーフレーム](https://cacoo.com/diagrams/CTpmhWJIi7I8OArX/CCA6C)

## 開発環境
- Cloud9
- PHP 7.2
- MySql 5.6

## 本番環境
- Heroku
- PHP 7.2
- PostgreSQL 

## 使用フレームワーク
- Laravel 5.5
- Bootstrap 4.2.1

## その他使用ライブラリ
- [LaravelCollective/html](https://github.com/LaravelCollective/html)
- [league/flysystem-aws-s3-v3](https://github.com/thephpleague/flysystem-aws-s3-v3)
- [Google books API](https://developers.google.com/books/docs/v1/using)

## その他
- 作品名、著者名入力時のオートコンプリート機能