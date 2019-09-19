<?php	foreach ($_POST as $key => $value) {$$key = $value;} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>JYTDownload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
<h2>Descarga Videos de YouTube</h2><BR>
  <form action="index.php" method="post">
    <div class="form-group">
      <label>Enlace del Video:</label><BR>
      <input type="text"  class="form-control" name="video_link" placeholder="Ejemplo: https://www.youtube.com/watch?v=C0DPdy98e4c" value="<?php if(isset($video_link)){echo $video_link;}?>">
    <button type="submit" class="btn btn-default">DESCARGAR</button>
  
</div>
	<br>

 <!– TABLA IZQUIERDA ––>
<div class="grid-container" style="float:left;width:100%;">
<?php
    if (isset($_POST['video_link'])) {
        $url = $_POST['video_link'];
        $value = explode("v=", $url);
        $videoId = $value[1];
?>
</div>
<div class="thumbnail">
    <div id="videoDiv">
        <center><iframe id="iframe" style="width: 560px; height: 315px"
            src="//www.youtube.com/embed/<?php echo $videoId; ?>"
            data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1"></iframe></center>
    <div id="titleDiv">
   <h2><?php echo $title; ?></h2>
   <p><u>DESCRIPCIÓN</u>: <?php echo $description; ?></p>
<?php 
	} 
?>
</div>
<BR>
    <BR>
 <!– TABLA DERECHA ––>
 
<div class="container">
	<?php
		if(isset($video_link)){
			https://www.youtube.com/watch?v=bMZo3SBrLUU
			$code = str_replace("https://www.youtube.com/watch?v=","",$video_link);
			
			function get_youtube_title($video_id){
    $html = 'https://www.googleapis.com/youtube/v3/videos?id='.$video_id.'&key=alskdfhwueoriwaksjdfnzxcvxzfserwesfasdfs&part=snippet';
    $response = file_get_contents($html);
    $decoded = json_decode($response, true);
    foreach ($decoded['items'] as $items) {
         $title= $items['snippet']['title'];
         return $title;
    }
}
echo $title = get_youtube_title('PQqudiUdGuo');
			$video_info = file_get_contents("https://www.youtube.com/get_video_info?video_id={$code}");
			parse_str($video_info);
			echo "Nombre : ".$title;
			echo "<br>Las descargas disponibles son:<br><br>";
			$videos = explode(',',$url_encoded_fmt_stream_map);
			foreach ($videos as $video){
				parse_str($video,$video_array);
				if(strstr($video_array['type'],';',true) !== false)
					$parsedtype = strstr($video_array['type'],';',true);
				else $parsedtype = $video_array['type'];
				echo "Tipo: {$parsedtype}<br>Calidad: {$video_array['quality']}<br><a target='_blank' href=\"{$video_array['url']}\" download=\"{$title}_{$parsedtype}_{$video_array['quality']}\">{$title}_{$parsedtype}_{$video_array['quality']}</a>";
				echo "<br><br>";
			}
		}
	?>
</div></div>
<BR>
    <BR>

</body>
</html>
