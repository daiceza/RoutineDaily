# ルーティンワーク用日報(RoutineDaily)
従業員が従業員同士の仕事を知りたい。

## 初期ログイン(seedを利用した場合)

https://safe-depths-83996.herokuapp.com/ (heroku 11/20更新)

php artisan migrate:fresh --seedで管理者と従業員1,2を作成

管理者

メールアドレス admin@mail

パスワード adminadmin

従業員1(従業員2)

メールアドレス worker1@mail(worker2@mail)

パスワード workwork1(workwork2)


## ログイン画面(login)
- メールアドレス
- パスワード

## 新規登録画面(register)

- 名前(name)
- メールアドレス(email)
- 社員番号(employee、4桁の数字)
- 所属(team・役職・部署)
- 入社年月(join)
- パスワード(再入力あり)
- 権限(role・ユーザーがいない場合は管理者。いる場合は従業員)


## <font color="Orange">従業員管理(Admin)</font>
### 従業員編集
- 名前(name)
- メールアドレス(email)
- 社員番号(employee、4桁の数字)
- 所属(team・役職・部署)
- 入社年月(join)
- 権限(role・管理者と従業員)

## <font color="LimeGreen">従業員(worker)</font>

### 日報確認・記入(daily・仕事結果入力)
- 日付(day)
- 出勤時間(jobstart)
- 退勤時間(jobend)
- 休憩開始時間(breakstart)
- 休憩終了時間(breakend)
- タイムテーブル(timetable)
- テンプレート・先日の仕事(直近で昨日)
- 所感(impress)
- 次の勤務日(nextday)
- 次の仕事予定(next)


### 仕事リスト(routine・仕事登録・5種類登録を目安に)
- 仕事名(jobname)
- 単位(set)
- 目安時間(settime)
- 内容(Content)
- マニュアル(manual)
- 重要度(important)

### 従業員リスト
- 名前(name)
- 社員番号(employee、4桁の数字)
- 所属(team)役職・部署
- 入社年月(join)
- 主な仕事で仕事名を表示

#### <font color="tomato">更新内容</font>

12/16 日報リストを作成

12/15 パスワードをプロフィール確認画面で変更可

日報の仕事内容と所感を行数に合わせて表示

12/14 リレーショナルデータベースを活用

バリデーションの設定(入力文字が多すぎることを防ぐ)

12/13 routes/webのクロージャを無くす

12/8 新規登録ですでにある所属をdatalistにする

重要度をControllerでソート

12/7 所属検索をプルダウンメニューにする

12/6 フラッシュメッセージの作成(～を編集しました)

12/1 日報作成時、すでに同じ日の日報が作成されている場合、上書きする。

11/30 入力必須項目にrequiredを追加

11/29 初期状態で(データが空の時)、管理者作成を1人可能にする(register)

11/28 仕事予定・仕事予定日単体で保存可能にする。次回の予定、今日の予定、予定作成の分岐。

title= を活用

11/27 次の勤務日(nextday)になった場合、次の仕事予定を「今日の予定」と表記

11/24 次の勤務日(nextday)次の仕事予定(next)を作成

11/23 他の従業員の仕事をコピー(create.blade.php 新規作成画面と同じ画面)

tableをjoinする

11/22 削除をreturn confirm()で確認

11/19・20 javascript,jQueryが使えない(削除確認は後回し)

11/18 所属で検索可能 従業員番号の昇順をControllerで初期設定

11/17 日報にpaginateを実装(5件ずつ)

権限をビューで設定 テンプレートを直接データ送信するtextareaに入れる

11/16 /registerにアクセスできるのはadminのみ

DatabaseSeederで複数ユーザーを登録(\App\User::create)

テンプレートをtextarea内に記載

11/14 リダイレクトループ 

権限(ロール)設定をする(adminとworker)

ログインユーザーのみ新規登録できる。

11/13 register編集　DatabaseSeederで管理人作成

11/10 ログイン後は/worker/dailyにリダイレクト

ログアウト後は/loginにリダイレクト
休憩時間(type=time)を空欄で送信しても?とでて保存できない

→DB作成で->nullable;にしなかった。

migrationファイルを編集した
→php artisan migration:fresh でテーブルを作り直した

重要度をプルダウン(毎日,週2~3回,週1回,月1回,ほぼやらない)設定画面から設定をデータベースにいれなくても良いと考えている。
```
<option value="毎日" {{ $routine_form->important == '毎日' ? 'selected' : '' }}>毎日</option>
<option value="週2~3回" {{ $routine_form->important == '週2~3回' ? 'selected' : '' }}>週2~3回</option>
<option value="週1回" {{ $routine_form->important == '週1回' ? 'selected' : '' }}>週1回</option>
<option value="月1回" {{ $routine_form->important == '月1回' ? 'selected' : '' }}>月1回</option>
<option value="ほぼやらない" {{ $routine_form->important == 'ほぼやらない' ? 'selected' : '' }}>ほぼやらない</option>
```
```
<a href="/admin">　<a href="admin">
```
はリダイレクト先が違う(相対パス)

11/09 ログイン可能にした、自分の持っている知識を思い出せる分利用する。
リレーショナルデータベースが使いこなせていない

11/06 workerのview編集

11/05 テーブルとビューの構成を整理


### 今後つくりたいもの 

- 設定(ドロップダウン),検索,ソート
- 明日の予定(11/24~)
- 他人から見られることを意識し、コメントをつける
- 実用性・あったらいいなを意識する
- かかった時間
- アイコン
