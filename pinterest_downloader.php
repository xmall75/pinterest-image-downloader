<?php

/* Pinterest Image Downloader
** @author Rep - Xmall75 */

function search($url) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}
echo "Pinterest Image Downloader";

?>
<title>Pinterest Image Downloader</title>
<form method="POST">
	<input type="text" name="url" placeholder="https://www.pinterest.com/pin/281545414194622988/">
	<input type="submit" name="submit">
	<?php
	if (isset($_POST['submit'])) {
		if (empty($_POST['url'])) {
			echo "<br />Please input the URL";
		}
		else {
			$search = search($_POST['url']);
			$pisah = explode('href="https://i.', $search);
			if (isset($pisah[1])) {
				$pisah2 = explode('" as="image"/>', $pisah[1]);
?>
</form>
<div class="preview">
	Preview Image
	<br />
	<img width="300px" src="<?php echo "https://i.$pisah2[0]"?>">
</div>
<div class="download">
	<a href="<?php echo "https://i.$pisah2[0]"?>" target="_blank">Download the Original Size</a>
</div>
<?php
			} else {
				echo "<br />Please input the correct URL.";
			}
		} 
	}

?>
