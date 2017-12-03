<?php
/*
mw-Valine -- Mediawik评论插件
more: https://github.com/ruter/mw-Valine
安装方法请见README
*/

// 插件信息
$wgExtensionCredits['specialpage'][] = array(
		'path'              => __FILE__,
		'name'              => 'mw-Valine',
		'version'           => '0.1',
		'author'            => 'Ruter',
		'description'       => 'Mediawik评论插件',
		'descriptionmsg'    => 'Mediawik评论插件',
		'url'               => 'http://blog.ruterly.com'
);

// 注册钩子
$wgHooks['SkinAfterContent'][] = 'vaSkinAfterContent';

function vaSkinAfterContent(&$data, &$skin) {
    /**
     * 在 LocalSettings.php 定义如下变量：
     * $LEAN_APPID: leancloud 的 appId
     * $LEAN_APPKEY: leancloud 的 appKey
     * $VALINE_MSG: 在评论框未输入内容时显示的提示信息
     */
     global $wgTitle, $wgRequest, $wgOut, $wgUser, $LEAN_APPID, $LEAN_APPKEY, $VALINE_MSG;

     if($wgTitle->isSpecialPage()
            || $wgTitle->getArticleID() == 0
            || !$wgTitle->canTalk()
            || $wgTitle->isTalkPage()
            || method_exists($wgTitle, 'isMainPage') && $wgTitle->isMainPage()
            || in_array($wgTitle->getNamespace(), array(NS_MEDIAWIKI, NS_TEMPLATE, NS_CATEGORY))
            || $wgOut->isPrintable()
            || $wgRequest->getVal('action', 'view') != "view")
        return true;

     $path = $wgTitle->getArticleID();
     $data .='
        <div id="comment"></div>
        <script src="//cdn1.lncld.net/static/js/3.0.4/av-min.js"></script>
        <script src="//unpkg.com/valine/dist/Valine.min.js"></script>
        <script>
            new Valine({
                el: "#comment",
                notify:false,
                verify:false,
                appId: "' .$LEAN_APPID. '",
                appKey: "' .$LEAN_APPKEY. '",
                placeholder: "' .$VALINE_MSG. '",
                path: "' .$path. '",
                avatar:"hide",
                guest_info:["nick"]
            });
        </script>';
     return true;
}

?>
