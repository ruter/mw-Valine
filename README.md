# mw-Valine
Valine评论插件 for Mediawiki.

# 使用方法
将文件夹 `valine_comment` 复制到 wiki 安装目录下的 `extensions` 文件夹，然后编辑安装目录下的 `LocalSettings.php`，在底部添加如下内容：

```php
$LEAN_APPID: "leancloud 的 appId";
$LEAN_APPKEY: "leancloud 的 appKey";
$VALINE_MSG: "在评论框未输入内容时显示的提示信息";
require_once("$IP/extensions/valine_comment/valine_comment.php");
```
其中 `Leancloud` 的 `appId` 和 `appKey` 获取方法请参考 `Valine` 官方网站的 [获取appid和appkey](https://valine.js.org/#/quickstart?id=%e8%8e%b7%e5%8f%96appid%e5%92%8cappkey) 一节

# 致谢
非常感谢 `Valine` 作者带来的评论系统

项目地址：https://github.com/xcss/Valine