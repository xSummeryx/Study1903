<html>
<head>
    <title>这是一个网页版的简单计算器</title>
    <meta http-equiv="Content-Type" content="text/html;chaset=utf-8" >
</head>
<?php
$num1=true;
$num2=true;
$numa=true;
$numb=true;
$message="";
if(isset($_GET["sub"])){
    if($_GET["num1"]==""){
        $num1=false;
        $message.="第一个数不能为空";
    }
    if($_GET["num2"]==""){
        $num1=false;
        $message.="第二个数不能为空";
    }

    if(!is_numeric($_GET["num1"])){
        $numa=false;
        $message.="第一个数应该是数字";
    }

    if(!is_numeric($_GET["num2"])){
        $numb=false;
        $message.="第二个数应该是数字";
    }

    if($num1 && $num2 && $numa && $numb){
        $sum=0;
        switch($_GET["ysf"]){
            case "+":
                $sum=$_GET["num1"]+$_GET["num2"];
                break;
            case "-":
                $sum=$_GET["num1"]-$_GET["num2"];
                break;
            case "x":
                $sum=$_GET["num1"]*$_GET["num2"];
                break;
            case "/":
                $sum=$_GET["num1"]/$_GET["num2"];
                break;
            case "%":
                $sum=$_GET["num1"]%$_GET["num2"];
                break;
        }
    }
}
?>
<body>
<table align="center" border="1" width="500">
    <caption><h1>网页计算器</h1></caption>
    <form action="jsq.php">
        <tr>
            <td>
                <input type="text" size="5" name="num1" value="<?php echo $_GET["num1"] ?>">
            </td>
            <td>
                <select name="ysf">
                    <option value="+" <?php if($_GET["ysf"]=="+") echo "selected" ?>>+</option>
                    <option value="-" <?php if($_GET["ysf"]=="-") echo "selected" ?>>-</option>
                    <option value="x" <?php echo $_GET["ysf"]=="x"?"selected":"" ?>>x</option>
                    <option value="/" <?php echo $_GET["ysf"]=="/"?"selected":"" ?>>/</option>
                    <option value="%" <?php echo $_GET["ysf"]=="%"?"selected":"" ?>>%</option>
                </select>
            </td>
            <td>
                <input type="text" size="5" name="num2" value="<?php echo $_GET["num2"] ?>">
            </td>
            <td>
                <input type="submit" name="sub" value="计算">
            </td>
            <?php
            if(isset($_GET["sub"])){

                echo '<tr><td colspan="4">';
                if($num1 && $num2 && $numa && $numb){
                    echo "结果：".$_GET["num1"]." ".$_GET["ysf"]." ".$_GET["num2"]." = ".$sum;
                }else{
                    echo $message;
                }
                echo '</td></tr>';
            }
            ?>
    </form>
</table>
</body>
</html>
