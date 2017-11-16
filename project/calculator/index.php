<?php
/**
 * Created by PhpStorm.
 * User: 陈涛
 * Date: 2017/8/7
 * Time: 15:25
 */
//防止$res为空报错
$res = 0;
//防止提交数据为空时报错
if($_POST){
	//switch判断当前符号
	switch ($_POST['num3']){
		//为+号时执行的运算
		case '+';
		$res = $_POST['num1'] + $_POST['num2'];
//		终止当前循环
		break;
		//为-号时执行的运算
		case '-';
			$res = $_POST['num1'] - $_POST['num2'];
//			终止当前循环
			break;
		//为*号时执行的运算
		case '*';
			$res = $_POST['num1'] * $_POST['num2'];
			break;
		//为/号时执行的运算
		case '/';
		//判断被除数为0不执行运算
			if($_POST['num2']==0){
				echo '<script>alert("被除数不能为0")</script>';
			}else{
				//判断被除数不为0执行运算
				$res = $_POST['num1'] / $_POST['num2'];
			}
			//			终止当前循环
			break;
		//为%号时执行的运算
		case '%';
			$res = $_POST['num1'] % $_POST['num2'];
			//			终止当前循环
			break;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		input{
			outline: none;
			border: none;
		}
		.box{
			width: 400px;
			height: 500px;
			border: 1px solid black;
			margin: 50px auto;
			background: #004C96;
		}
		.xian{
			width: 90%;
			height: 80px;
			background: #DFF0D8;
			font-size: 50px;
			text-align: right;
			line-height: 100px;
			white-space: nowrap;
			overflow: hidden;
			box-sizing: border-box;
			margin: 10px auto;
			border-radius: 20px;
		}
		.one{
			display: flex;
			height:80px;
			width: 100%;
		}
		.qp{
			flex: 1;
			margin: 10px;
			border-radius: 20px;
			font-size: 40px;
		}
		.shan{
			flex: 1;
			margin: 10px;
			border-radius: 20px;
			background: red;
		}
		.two{
			display: flex;
			height:80px;
			width: 100%;
		}
		.nu{
			flex: 1;
			font-size: 30px;
			margin: 10px;
			border-radius: 20px;
			background: #000000;
			color: #f7f7f7;
		}
		.nu1{
			flex: 1;
			font-size: 30px;
			margin: 10px;
			border-radius: 20px;
			background: #99FF99;
		}
		form{
			width: 50%;
			height: 80px;
			
		}
		.sub{
			width: 90%;
			height: 80%;
			border-radius: 20px;
			background: slateblue;
			font-size: 40px;
			margin: 10px;
		}
	</style>
</head>
<body>
<div class="box">
	<div class="xian"><?php echo $res ?></div>
	<div class="one">
		<input type="button" value="C" class="qp"/>
		<input type="button" value="/" class="nu1"/>
		<input type="button" value="*" class="nu1"/>
		<input type="button" value="删除" class="shan"/>
	</div>
	<div class="one">
		<input type="button" value="7" class="nu"/>
		<input type="button" value="8" class="nu"/>
		<input type="button" value="9" class="nu"/>
		<input type="button" value="+" class="nu1"/>
	</div>
	<div class="one">
		<input type="button" value="4" class="nu"/>
		<input type="button" value="5" class="nu"/>
		<input type="button" value="6" class="nu"/>
		<input type="button" value="-" class="nu1"/>
	</div>
	<div class="one">
		<input type="button" value="1" class="nu"/>
		<input type="button" value="2" class="nu"/>
		<input type="button" value="3" class="nu"/>
		<input type="button" value="%" class="nu1"/>
	</div>
	<div class="two">
		<input type="button" value="." class="nu"/>
		<input type="button" value="0" class="nu"/>
		<form action="" method="post">
			<input type="hidden" value="" class="num1" name="num1">
			<input type="hidden" value="" class="num2" name="num2">
			<input type="hidden" value="" class="num3" name="num3">
			<input type="submit" value="=" class="sub"/>
		</form>
	</div>
</div>
<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
<!--<script type="text/javascript">-->
<!--    var b=1;-->
<!--    $('.nu').click(function(){-->
<!--        var a=$(this).val();-->
<!--        if(b==1){-->
<!--            var y=$('.xian').html();-->
<!--            if(y==='0'){-->
<!--                $('.xian').empty();-->
<!--			}-->
<!--            $('.xian').eq(0).append(a);-->
<!--			var sz1 = $('.xian').html();-->
<!--            $('.num1').eq(0).val(sz1);-->
<!--        }-->
<!--        if(b==0){-->
<!--            $('.xian').eq(0).append(a);-->
<!--            var sz2 = $('.xian').html();-->
<!--            $('.num2').eq(0).val(sz2);-->
<!--        }-->
<!--    })-->
<!--    $('.nu1').click(function(){-->
<!--        $('.xian').empty();-->
<!--        var fx = $(this).val();-->
<!--        $('.num3').eq(0).val(fx);-->
<!--        b=0;-->
<!--    })-->
<!--	$('.sub').click(function(){-->
<!--        $('.xian').empty();-->
<!--	    b=1;-->
<!--	})-->
<!--    $('.qp').click(function(){-->
<!--        $('.xian').eq(0).html(0);-->
<!--    })-->
<!--	-->
<!--</script>-->
<script type="text/javascript">
    $('.nu').click(function(){
        	var a=$(this).val();
            var y=$('.xian').html();
            if( y === '0' && a!='.'){
                $('.xian').empty();
            }
            $('.xian').eq(0).append(a);
    })
    $('.nu1').click(function(){
        var sz1 = $('.xian').html();
        $('.num1').eq(0).val(sz1);
        fx = $(this).val();
        $('.num3').eq(0).val(fx);
        $('.xian').empty();
    })
    $('.sub').click(function(){
        var sz2 = $('.xian').html();
        $('.num2').eq(0).val(sz2);
        $('.xian').empty();
    })
    $('.qp').click(function(){
        $('.xian').eq(0).html(0);
    })
    $('.shan').click(function(){
        var x = $('.xian').html();
        var newx =x.slice(0,-1);
        $('.xian').html(newx);
    })
</script>
</body>
</html>
