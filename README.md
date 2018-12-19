# pinyin-poem
一个计划用来实现一些偶尔想到的小方法，想写一个将古诗转成带拼音的古诗，这样的一个小项目

可以直接 `git clone https://github.com/Alpha2016/pinyin-poem.git`, 然后 `composer update` 直接使用更新版本的Laravel框架，`.env` 的配置自行修改就行，
1. 访问 `read` 路由，可以获得生命的加成.
2. 访问 `demo` 路由，可以测试数字转换成汉字的方法.
3. 访问 `rand` 路由，测试 `random_int` 生成的位图.
4. 访问 `reverse` 路由，是一个转换字符串的方法，保持原来位置的字符大小写一致.
5. 访问 `word-check` 路由，是一个测试敏感词的方法，具体实现在 `helper.php` 中.

**others**
domain/poem/{id}   访问具体的诗歌页面

-- 2017.9.6
多表认证体系，执行 `php artisan migrate --seed` 生成  `users` 和 `admins` 表，并填充 `admins` 表。
访问路由 `domain/admin/login` 打开后台登录页面，账户密码为 `admin@pwrd.com` ， `password` 进行登录。

-- 期间
只写了一些简单的方法

-- 2018.1.17
填充了 `users`, `poems` 表数据，`git clone git@url` 项目之后，请在根目录，执行一下 `cnpm/npm install && cnpm/npm run production`,
 然后可以执行 `php artisan migrate --seed` 生成并填充一下数据，如果想测试发送到自己的邮箱，
 请先注册或者修改数据表中的一条数据，将 `email` 改成自己的邮箱地址，登录之后，点击具体页面的邮寄本页按钮，将发送到您的邮箱中。具体待完善。

-- 2018.2.24
完全替换原来的后台模板，一点点集成新的页面ing

-- 2018.2.28
jquery完成诗歌类型的操作，考虑过vue2.x+vue-strap+vue paginate的一个分页，后面可以尝试一下这个方式，感觉有点乱，没找到优化方式
工作中整体后台框架用过angular，vue的ant design和element ui,这两种的样式不是很喜欢，代码会写，未采用此框架，node_modules和他的包管理方式，
太臃肿了，这个是最大的坑点

-- 2018.12.19
追加一个数据库备份定时任务，自行在服务器加上定时任务
```
* * * * * /path/to/php /path/to/artisan schedule:run
```
