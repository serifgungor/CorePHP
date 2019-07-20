<form method='post' action='renkli.php'>
<input type='text' name='metin' />
<input type='submit' value='üret'>
</form>
<?php  
##ferdi akgun ## 02.03.2015 ##

$isim = $_POST['metin'];
$harfler = str_split($isim);
$renkler = array('#2980b9','#2ecc71','#e74c3c','#2c3e50','#e67e22','#8e44ad');
$fontlar = array('tahoma','verdana','arial','courier new','times new roman','impact','century gothic','copper black','forte','comic sans ms','rockwell extra bold','stencil');

for($i=1; $i<=count($harfler); $i++){
		$renk = $renkler[array_rand($renkler)];
		$font = $fontlar[array_rand($fontlar)];
			
			$size = $i*30;
			$x = $i-1;
			
			echo"<font style='font-family:$font;font-weight:bold;color:$renk;font-size:$size'>$harfler[$x]</font>";
			
			//echo $size."px";
		
}
?>