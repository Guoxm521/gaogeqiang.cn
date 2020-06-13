<?php
    // 导入后台封装的函数
    include './admin/fun.php';
    
    /* 网站的导航栏部分 从数据库获得分类 */
    // 关于我们 aboutus
    $aboutus = new Mysql('about');
    $aboutus = $aboutus->selectAll();
    foreach ($aboutus as $v) {
        $aboutusList .= "<li><a href="."aboutus.php?id=$v[id]".">$v[name]</a></li>";
    }
    // 工程案例 cases
    $cases = new Mysql('cases');
    $cases = $cases->selectBygroup('classfiy');
    foreach ($cases as $v) {
        $casesList .= "<li><a href="."cases.php?classfiy=$v[classfiy]".">$v[classfiy]</a></li>";
    }
    // 产品中心 product
    $product = new Mysql('product');
    $product = $product->selectBygroup('classfiy');
    foreach ($product as $v) {
        $productList .= "<li><a href="."product.php?classfiy=$v[classfiy]".">$v[classfiy]</a></li>";
    }
    // 新闻中心 news
    $news = new Mysql('news');
    $news = $news->selectBygroup('classfiy');
    foreach ($news as $v) {
        $newsList .= "<li><a href="."news.php?classfiy=$v[classfiy]".">$v[classfiy]</a></li>";
    }

?>
