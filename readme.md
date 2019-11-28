# ルーティンワーク用日報(RoutineDaily)
従業員が従業員同士の仕事を知りたい。

## ログイン画面(login)
- メールアドレスor4桁の従業員番号
- パスワード

## 初期登録画面(register)

- 名前
- メールアドレスor4桁の従業員番号
- パスワード
- パスワード再入力


## <font color="Orange">従業員管理(Admin)</font>
### 従業員編集
- 名前(name)
- 4桁の従業員番号(employee)
- メールアドレス(email)
- パスワード(Adminは不要)
- 所属(役職・部署)
- 入社年月(join)

## <font color="LimeGreen">従業員(worker)</font>

### 日報確認・記入(daily・仕事結果入力)
- 日付(day)
- 出勤時間(jobstart)
- 退勤時間(jobend)
- 休憩開始時間(breakstart)
- 休憩終了時間(breakend)
- タイムテーブル(body→timetable)
- テンプレート・先日の仕事
- 所感(impress)
- ~~仕事登録(ドロップダウン)~~
- タイムレコード(仮)


### 仕事リスト(routine・仕事登録・5種類登録を目安に)
- 仕事名(jobname)
- 単位(set)
- 目安時間(settime)
- 内容(Content)
- マニュアル(manual)
- 重要度(important)

### 従業員リスト
- 名前(name)
- 所属(team)役職・部署
- 入社年月(join)
- 仕事内容テーブル.仕事名を表示

### 仕事結果一覧(同じ所属のみみれる?)
- コメント

## <font color="red">テーブル</font>
### users(従業員テーブル・ユーザー認証用)
- 名前(name)
- 4桁の従業員番号(employee)
- メールアドレス(email)
- パスワード
- 所属(役職・部署・team)
- 入社年月(join)
- 次の勤務日(nextday)←new
- 次の仕事予定(next)←new

### password_resets(パスワードリセット・ユーザー認証用)

### daily(日報テーブル)

- 投稿者<font color="Orange">*(users_id)*</font>
- 日付(day)
- 出勤時間(jobstart)
- 退勤時間(jobend)
- 休憩開始時間(breakstart)
- 休憩終了時間(breakend)
- タイムテーブル(body→timetable)
- 所感(impress)

### routine(仕事内容テーブル)

- 投稿者<font color="Orange">*(users_id)*</font>
- 仕事名(jobname)
- 単位(set)
- 目安時間(settime)
- 内容(Content)
- マニュアル(manual);
- 重要度(important)

### 初期ログイン

https://safe-depths-83996.herokuapp.com/ (11/20更新)

管理者

メールアドレス admin@mail

パスワード adminadmin

従業員1(従業員2)

メールアドレス worker1@mail(worker2@mail)

パスワード workwork1(workwork2)


#### <font color="tomato">更新内容</font>

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
