# Symfony Standard Edition テストプロジェクト

Symfonyで何か試す時用のテストプロジェクト

エンティティ

* Member
* Rental
* RentalDetail
* Stock
* Title

上記エンティティの初期データ投入用コマンド

```
# データクリア後フィクスチャロード
$ php app/console hello:init-data

# フィクスチャロードのみ
$ php app/console hello:init-data
```

フィクスチャには以下のバンドルを利用

* [DoctrineFixturesBundle](https://github.com/doctrine/DoctrineFixturesBundle)
* [nelmio/alice](https://github.com/nelmio/alice)


## 著作権

Copyright (c) 2014 GOTO Hidenori &lt;hidenorigoto@gmail.com&gt;, All rights reserved.

## ライセンス

[修正 BSD ライセンス](http://www.opensource.org/licenses/bsd-license.php)