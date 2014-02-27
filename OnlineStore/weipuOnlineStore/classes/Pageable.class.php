<?php


	class Pageable{
		public $pageSize;    //每一页的条数
		public $res_array;	 //从数据中取得数据
		public $rowCount;	 //数据库中记录的条数
		public $pageNow;	 //当前页
		public $pageCount;   //页的总数
		public $pageWhole;	 //上一页和下一页中包含的总页数
		public $navigator;	 //导航条
		public $gotoUrl;     //调整url
		
	}

?>