<?php

	class SqlHelper{
		private $host;
		private $user;
		private $password;
		private $database;
		private $mysqli;
		
		
		function __construct(){
			$filename=dirname(__FILE__)."/"."../configuration/db.ini";
			//从配置文件中取得相应的数据
			$arr=parse_ini_file($filename);
			//print_r($arr);
			$this->host=$arr['host'];
			$this->user=$arr['user'];
			$this->password=$arr['password'];
			$this->database=$arr['database'];
			$this->mysqli=new mysqli($this->host, $this->user, $this->password, $this->database);
			
			if($this->mysqli->connect_error){
				die($this->mysqli->connect_error);
			}
			
		}
		
		/**
		 * 查询
		 * @param string $sql
		 * @return array
		 */
		function execute_dql($sql){
			$res=$this->mysqli->query($sql) or die($this->mysqli->error);
			
			$arr=array();
			
			while($row=$res->fetch_array()){
				$arr[]=$row;
			}
			//释放结果集
			$res->free();
			
			//返回双重数组
			return $arr;
		}
		
		//获得刚刚插入的记录id号
		function getLastId(){
			return $this->mysqli->insert_id;
		}
		
		/**
		 * 分页查询语句
		 * @param string $sql1  查询语句1，查询所需要的结果
		 * @param string $sql2  查询语句2，查询记录的总条数
		 * @param Pageable $pageable  Pageable对象
		 */
		
		function execute_dql_pageable($sql1,$sql2,$pageable){
			
			//查询所有数据
			$res=$this->mysqli->query($sql1) or die($this->mysqli->error);
			
			$arr=array();
			
			//按照字段名查询
			while($row=$res->fetch_assoc()){
				$arr[]=$row;
			}
			
			$res->free();
			
			$pageable->res_array=$arr;
			
			//查询记录的条数
			$res2=$this->mysqli->query($sql2) or die($this->mysqli->error);
			if($row=$res2->fetch_row()){
				$pageable->pageCount=ceil($row[0]/$pageable->pageSize) ;
				$pageable->rowCount=$row[0];
			}
			
			$res2->free();
			
			$navigator="";
			
			if($pageable->pageNow>1){
				$prePage=$pageable->pageNow-1;
				$navigator.="<a href='{$pageable->gotoUrl}?pageNow=$prePage'>上一页</a>&nbsp;";
			}
			
			if($pageable->pageNow<$pageable->pageCount){
				$nextPage=$pageable->pageNow+1;
				$navigator.="<a href='{$pageable->gotoUrl}?nextPage=$nextPage'>下一页</a>";
			}
			
			$start=floor(($pageable->pageNow-1)/$pageable->pageWhole)*$pageable->pageWhole+1;
			$index=$start;
			
			if($pageable->pageNow>$pageable->pageWhole){
				$navigator.="<a href='{$pageable->gotoUrl}?pageNow=".($start>1?$start-1:1)."'><<<&nbsp;&nbsp;</a>";
			}
			
			for(;$start<$index+$pageable->pageWhole;$start++){
				$navigator.="<a href='{$pageable->gotoUrl}?pageNow=$start'>[$start]</a>";
			}
			
			$navigator.="<a href='{$pageable->gotoUrl}?pageNow=$start'>>>></a>";
			
			$navigator.="当前页{$pageable->pageNow}/共{$pageable->pageCount}页";
			
			$pageable->navigator=$navigator;
		}
		
		
		/**
		 * 增删改
		 * @param string $sql
		 * @return number    0 失败   1成功并影响行数  2成功但不影响行数
		 */
		function execute_dml($sql){
			//$flag = $this->mysqli->query($sql) or die($this->mysqli->error);
			$flag = $this->mysqli->query($sql);
			//echo $flag;
			//exit();
			if (!$flag) {
				return 0;   //执行失败
			}else{
				if($this->mysqli->affected_rows>0){
					return 1;	//执行成功，并影响行数
				}else{
					return 2;	//执行成功，但没有影响行数
				}
			}
		}
		
		function close_connect(){
			$this->mysqli->close();
		}
		
		
	}

?>