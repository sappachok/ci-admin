<?php

function thutf8($str) {
	return iconv("tis-620","utf-8",$str);
}
?>