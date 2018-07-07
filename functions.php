function srt2vtt($file){
$name=basename($file,'.vtt');

/*count file lines*/
$linecount = 0;
$handle=fopen($file,'r');
$text = array(file($file));
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;


}
fclose($handle);
$vtt = 'uploads/subs/' .$name . '.vtt';
$fh = fopen($vtt,'w');
$text = str_replace(',','.',$text);
fwrite($fh, "WEBVTT\n\n");
for($i=0; $i<=($linecount-3);$i++) {
	$length = strlen((string)$text[0][$i]);
	if ( !is_numeric(trim($text[0][$i])))
	{
		if ($length>0){
		fwrite($fh, $text[0][$i]);

	}}

}
file_put_contents($vtt,str_replace(',','.',file_get_contents($vtt)));

fclose($fh);
}
