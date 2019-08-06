<form method="post">
<input name="query" type="text" id="query" />
<input type="submit" value="Gönder" />
</form>

<?php
function ara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
    return @$m[1];
}

if(isset($_POST["query"])){

$site = "https://play.google.com/store/apps/details?id=".$_POST["query"];//
$icerik = file_get_contents($site);
$ss = ara('class="cover-image" src="', '"', $icerik);
$kategori_url = ara('<a class="document-subtitle category" href="','"',$icerik);
$kategori = ara('<span itemprop="genre">','</span>',$icerik);
$developer_url = ara('<a class="document-subtitle primary" href="','"',$icerik);
$developer_name = ara('"> <span itemprop="name">','</span>',$icerik);
$app_score = ara('<div class="score">','</div>',$icerik);
$last_update_time = ara('<div class="content" itemprop="datePublished">','</div>',$icerik);
$toplam_oy = ara('<span class="reviews-num">','</span>',$icerik);
$numberDownloads = ara('<div class="content" itemprop="numDownloads">','</div>',$icerik);
$icerikDegerlendme = ara('<div class="content" itemprop="contentRating">','</div>',$icerik);
$appIcerikAciklama = ara('<div class="id-app-orig-desc">','</div>',$icerik);
$appDeveloperMail = ara('<a class="dev-link" href="mailto:','"',$icerik);

$appImage0 = ara('data-expand-to="full-screenshot-0" src="','"',$icerik);
$appImage1 = ara('data-expand-to="full-screenshot-1" src="','"',$icerik);
$appImage2 = ara('data-expand-to="full-screenshot-2" src="','"',$icerik);
$appImage3 = ara('data-expand-to="full-screenshot-3" src="','"',$icerik);
$appImage4 = ara('data-expand-to="full-screenshot-4" src="','"',$icerik);
$appImage5 = ara('data-expand-to="full-screenshot-5" src="','"',$icerik);
$appImage6 = ara('data-expand-to="full-screenshot-6" src="','"',$icerik);


?>

<table width="500" height="157" border="1">
  <tr>
    <td width="150"><img src="<?php echo $ss[0]; ?>" width="150" height="150" /></td>
    <td width="334">
    <a href="<?php echo "https://play.google.com".$developer_url[0]; ?>" target="_blank"><?php echo $developer_name[0]; ?></a>
    <br />
	<a href="<?php echo "https://play.google.com".$kategori_url[0]; ?>" target="_blank"><?php echo $kategori[0]; ?></a>
    <br />
    Ortalama oy; <?php echo $app_score[0]; ?>
    <br />
    Son güncelleme; <?php echo $last_update_time[0]; ?>	
    <br />
    Toplam oy; <?php echo $toplam_oy[0]; ?>	
    <br />
    Yükleme sayısı; <?php echo $numberDownloads[0]; ?>	
    <br />
    İçerik değerlendirme; <?php echo $icerikDegerlendme[0]; ?>	
    <br />
    Geliştirici e-mail; <?php echo $appDeveloperMail[0]; ?>
    </td>
  </tr>
  <tr>
    <td>Açıklama</td>
    <td><?php echo $appIcerikAciklama[0]; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <?php if($appImage0[0] != ""){ echo '<img src="'.$appImage0[0].'" />'; }else{  } ?>
    <br />
    <?php if($appImage1[0] != ""){ echo '<img src="'.$appImage1[0].'" />'; }else{  } ?>
    <br />
    <?php if($appImage2[0] != ""){ echo '<img src="'.$appImage2[0].'" />'; }else{  } ?>
    <br />
    <?php if($appImage3[0] != ""){ echo '<img src="'.$appImage3[0].'" />'; }else{  } ?>
    <br />
    <?php if($appImage4[0] != ""){ echo '<img src="'.$appImage4[0].'" />'; }else{  } ?>
    <br />
    <?php if($appImage5[0] != ""){ echo '<img src="'.$appImage5[0].'" />'; }else{  } ?>
    <br />
    <?php if($appImage6[0] != ""){ echo '<img src="'.$appImage6[0].'" />'; }else{  } ?>
    </td>
  </tr>
</table>
<?php } ?>