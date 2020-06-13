<?php
    /* 
        函数定义集合
    */
    class Mysql {
        // 默认属性
        public $host = 'localhost';
        public $user = 'root';
        public $password = 'root';
        public $dbname = 'gaogeqiang';
        public $table;//传入的表名字

        // 构造函数
        public function __construct($table) {
            $this->table =$table;
        }

        // 连接数据库
        public function connectdb() {
            // $dns = "mysql:host=$this->$host;dbname=$this->$dbname";
            $dns = "mysql:host=$this->host;dbname=$this->dbname";
            // echo $dns;
            $db = new PDO($dns,$this->user,$this->password); $db->exec("SET name 'UTF8'");
            return $db;
        }
        // 增加数据
        public function insert($arr) {
            $str='';
            foreach($arr as $k=>$v) {
            $str .=$k.'='."'$v'".',';
            }
            $str = rtrim($str,',');//去除最右边的点
            $sql = "insert into $this->table set $str";
            $db = $this->connectdb($this->table);
            $count = $db->exec($sql);
            return $count;
        }
        // 数据更改提交 传递id和更改的数组
        public function update($id,$arr) {
            $str='';
            foreach($arr as $k=>$v) {
                $str .=$k.'='."'$v'".',';
            };
            $str = rtrim($str,',');//去除最右边的句号
            echo "<br>";
            $db = $this->connectdb($this->table);
            $sql = "update  $this->table set $str where id=$id";
            $query = $db->query($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            pagejump('./index.php');
        }
        // 查找全部数据
        public function selectAll() {
            $db = $this->connectdb($this->table);
            $sql = "select * from $this->table order by id asc";
            $query = $db->query($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query->fetchAll();
            return $result;
        }
        // 根据ID查找单个数据 
        public function selectByID($id) {
            $db = $this->connectdb($this->table);
            $sql = "select * from $this->table where id=$id";
            $query = $db->query($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $result =$query->fetch();
            return $result;
        }
        // 删除数据 传入id数组
        public function delete($idarr) {
            $db = $this->connectdb($this->table);
            $sql = "delete from $this->table where id in($idarr)";
            $db = $db->exec($sql);
            // 删除后执行页面跳转
            pagejump('./index.php');
        }
        // 分页查询  $num 每一页展示的数据
        public function selectByPage($num,$page,$search="") {
            $sql = "select count(id) as t from $this->table $search";//获得总数
            $db = $this->connectdb();
            $query = $db->query($sql);
            $row = $query->fetch();
            $total = $row["t"]; //总的数据条数
            $pages = ceil($total / $num); //总的页数
            $page = isset($page)?$page:1;
            $start =  ($page - 1)*$num; //每页显示的开始页面
            $start < 0 ?$start =0:$start; 
            $sql = "select * from $this->table $search order by id asc limit $start,$num";
            $db = $this->connectdb();
            $query = $db->query($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query->fetchAll();
            $beforepage = $page-1;//上一页
            if($beforepage<1) {
                $beforepage =1;
            }
            $afterpage = $page+1; //下一页
            if($afterpage>$pages) {
                $afterpage = $pages;
            }   
            $arr = array('pages'=>$pages,'result'=>$result,'beforepage'=>$beforepage,'afterpage'=>$afterpage);
            return $arr;
        }

        //分页展示 
        public function showpages($page,$pages,$beforepage,$afterpage,$params='') {
            echo $pages;
            $str = '';//分页处的标签展示
            if($page ==1|| !$page) {
                $str .= '';
            }else {
                $str .= "<li><a href=".'?page=1'.">首页</a></li><li><a href="."?page=$beforepage$params".">上一页</a></li>";
            }
            for($i=1;$i<=$pages;$i++) {
                $str .= "<li><a href='?page=$i$params'>$i</a></li>";
            }
            if($page == $pages || $pages ==1) {
                $str .= '';
            }else {
                $str .= "<li><a href="."?page=$afterpage$params".">下一页</a></li><li><a href="."?page=$pages$params".">尾页</a></li>";
            }
            return $str;
        } 
       
    }
     // 搜索
     function selectByser($name='',$classfiy='') {
        $name = isset($name)?$name:'';
        $classfiy = isset($classfiy)?$classfiy:'';
        $search = '';
        $params = '';
        if($name) {
            $search .= " and name like '%$name%'";
            $params .= "&name=$name";
        }
        if($classfiy) {
            $search .= " and classfiy like '%$classfiy%'";
            $params .= "&classfiy=$classfiy";
        }
        if($search) {
            $search = "where ". substr($search,4);
        }
        $sql = "select *  from demostudents $search";
        // $db = $this->connectdb();
        // $query = $db -> query($sql);
        // $query->setFetchMode(PDO::FETCH_ASSOC);
        // $result = $query ->fetchall();
        return array('search'=>$search,'params'=>$params);
    }
    //打印数组 
     function dump($arr) {
         echo '<pre>';
         print_r($arr);
         echo '</pre>';
     }
    // 页面跳转函数
    function pagejump($url) {
        $str = "<script>location.href= '$url',target='admin'</script>";
        echo $str;
    }
    // 文件上传
    function fileup($_FILE) {
        $file = $_FILE;
        // 判断文件的大小
        if($file['size']>0) {
            if($file['size'] > 1024*1024) {
                echo "<script>alert('请选择正确的文件大小')</script>";
            }
            // 判断文件的类型
            $pos = strrpos($file['name'],'.');
            $ext = substr($file['name'],$pos+1);
            $all = ['jpg','jpeg','gif','png','jfif'];
            if(!in_array($ext,$all)) {
                echo "<script>alert('请传入正确的文件')</script>";
            };
            //防止文件重名
            $newname = time().rand(0,100).'.'.$ext;
            move_uploaded_file($file["tmp_name"],"./../upload/".$newname);
            return $newname;
        }
    }
    // 判断选中情况 并点击删除按钮获得id  跳转到删除页面
    function checkbox() {
        $str = " <script>
        // 点击删除
        var all = document.querySelector('thead').querySelector('input[type=checkbox]');
        var sons =  document.querySelector('tbody').querySelectorAll('input[type=checkbox]');
        var del =document.querySelector('#del');
        // id数组
        var idarr = [];
        var flag = true;
        all.onclick = function() {
            sons.forEach(v=> {
                v.checked = this.checked;
            })
        };
        sons.forEach(v=> {
            v.onclick= function() {
                var flag = true;
                sons.forEach(v => {
                    if(!v.checked) {
                        flag = false;
                        // break;
                    }
                })
                all.checked = flag;
            }
        })
        function delclick() {
            for(var i=0;i<sons.length;i++) {
            if(sons[i].checked) {
                idarr.push(sons[i].value)
                }
            }
            if(idarr.length ==0) {
                alert('请选择一个进行删除');
                return ;
            }
        location.href = 'del.php?id='+idarr;
        }
        del.addEventListener('click',delclick)
    </script>";
    echo $str;
    }
?>
