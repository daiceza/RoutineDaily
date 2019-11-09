# ルーティンワーク用日報(RoutineDaily)

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
- パスワード(Adminは不要)
- 所属(役職・部署・team)
- 入社年月(join)

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


#### <font color="tomato">更新内容</font>
11/05 テーブルとビューの構成を整理
11/06 workerのview編集
11/09 ログイン可能にした、自分の持っている知識を思い出せる分利用する。
リレーショナルデータベースが使いこなせていない