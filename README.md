# pinyin-poem
一个计划用来实现一些偶尔想到的小方法，想写一个将古诗转成带拼音的古诗，这样的一个小项目

可以直接 `git clone https://github.com/Alpha2016/pinyin-poem.git`, 然后 `composer update` 直接使用更新版本的Laravel框架，`.env` 的配置自行修改就行，
1. 访问 `read` 路由，可以获得生命的加成.
2. 访问 `demo` 路由，可以测试数字转换成汉字的方法.

-- 2017.9.6
多表认证体系，执行 `php artisan migrate --seed` 生成  `users` 和 `admins` 表，并填充 `admins` 表。
访问路由 `domain/admin/login` 打开后台登录页面，账户密码为 `admin@pwrd.com` ， `password` 进行登录。
