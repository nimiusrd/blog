# blog

## 要件

- 新規に記事を投稿できる
- 投稿された記事を一覧で見れる
- 記事の一覧から詳細に遷移できる
- 記事の編集ができる
- 記事の削除ができる
- 投稿された記事はDocker上のMySQLで管理する

## 環境
### バックエンド
PHP 7.2 <=
Symfony 3.4

### フロントエンド
Vue
Webpack

## ビルド
### バックエンド


### フロントエンド
```bash
cd client
yarn
yarn build:production
```
バンドルされたものは`web/bundle.js`
