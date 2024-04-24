# 萌萌的访客计数器 - Moe-Counter
本项目修改自：[https://github.com/journey-ad/Moe-Counter](https://github.com/journey-ad/Moe-Counter)

多种风格可选的萌萌计数器

<details>
<summary>更多主题</summary>

##### asoul
![asoul](https://moe.genshin.website/?theme=asoul)

##### moebooru
![moebooru](https://moe.genshin.website/?theme=moebooru)

##### rule34
![Rule34](https://moe.genshin.website/?theme=rule34)

<details>
    
## 演示
[https://moe.genshin.website/?theme=rule34](https://moe.genshin.website/?theme=rule34)

## 使用方法

### 自行部署

#### 将本项目克隆至本地服务器

修改`/config/class.php`中的`__db`方法用以连接 Mysql 数据库，并将站点运行目录设置为`/public`

`class.php`

```
$dbInfo=array(
    "hostname" => "localhost",
    "database" => "database",
    "username" => "username",
    "password" => "123456",
);
```
