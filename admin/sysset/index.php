<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link rel="stylesheet" href="./../index.css" />
	</head>
	<body>
        <?php
            include './../fun.php';
            islogin();
            $mysql = new Mysql('system');
            $result=$mysql->selectAll();
            $result = $result[0];
            $id=$result['id'];
        ?>
		<div id="sysset">
			<table  cellspacing="0">
				<tr>
                    <td>公司名称：</td>
					<td><?php echo $result['company'] ?></td>
                </tr>
                <tr>
                    <td>电  话：</td>
                    <td><?php echo $result['tel'] ?></td>
                </tr>
                <tr>
                    <td>郑经理：</td>
                    <td><?php echo $result['zhen'] ?></td>
                </tr>
                <tr>
                    <td>尧经理：</td>
                    <td><?php echo $result['yao'] ?></td>
                </tr>
                
                <tr>
                    <td>QQ:</td>
                    <td><?php echo $result['QQ'] ?></td>
                </tr>
                <tr>
                    <td>邮箱：</td>
                    <td><?php echo $result['email'] ?></td>
                </tr>
                <tr>
                    <td>地址：</td>
                    <td><?php echo $result['adder'] ?></td>
                </tr>
                <tr>
                    <td>店面：</td>
                    <td><?php echo $result['shop'] ?></td>
                </tr>
                <tr>
                    <td colspan="2"><a <?php
                        echo "href=./modify.php?id=".$id;
                    ?>>修改</a></td>
                </tr>
            </table>
        </div>
        
	</body>
</html>
