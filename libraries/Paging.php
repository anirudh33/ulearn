<?php
// rks
// it is for providing paging limits
class paging {
	function paging() { // constructor
		$this->page_length = 10; // general page length
		$this->current_page = 1; // current active page
		$this->records = 0; // total no. of records to show
		$this->page_var = 'page'; // it is the page no. variable
		$this->page_set_var = 'pset'; // it is page set variable
		$this->page_separator = '|'; // it is page no. separator displayed on front
	}
	function set_page($page_no = 1) { // set current page
		if (empty ( $page_no ))
			return;
		else
			$this->current_page = $page_no;
		return;
	}
	function set_page_length($page_length = 10) {
		if (! empty ( $page_length ))
			$this->page_length = $page_length;
		return;
	}
	function set_page_var($var = 'page') {
		$this->page_var = $var;
		return;
	}
	function set_records($records = 0) {
		$this->records = $records;
		return;
	}
	function get_limit() { // getting limit to write in query
		$limit_from = $this->page_length * ($this->current_page - 1);
		$limit = $limit_from . ", " . $this->page_length;
		return $limit;
	}
	function get_limit_start() { // getting page starting record
		$limit_from = $this->page_length * ($this->current_page - 1);
		return $limit_from;
	}
	function get_pages() { // getting no. of pages formed
		$pages = ceil ( $this->records / $this->page_length );
		return $pages;
	}
	function get_link_1($limit) {
		
		parse_str ( $_SERVER ['QUERY_STRING'], $get_vars );
		if ($this->get_pages () > 1) {
			//echo "=============$limit======$no"; die;
			$link = "<span style='font-weight:bold;'></span>";
		} else {
			$link = "<span style='font-weight:bold;'> </span>";
		}
		
		for($i = 1; $i <= $this->get_pages (); $i ++) {
			$get_vars [$this->page_var] = $i;
			$url = http_build_query ( $get_vars );
			// Appending limit to url anirudh
			$url .= "&limit=" . $limit;
			
			if ($i == $this->current_page)
				$link .= ($i > 1) ? $this->page_separator . " <span style='color:#cc0000;font-weight:bold;font-size:13px;float:none!important;padding-right:0px!important'> <u>$i</u> </span> " : " <span style='color:#cc0000;font-weight:bold;'> <u>$i</u> </span> ";
			else
				$link .= ($i > 1) ? $this->page_separator . "<a href='?$url'> <u>$i</u> </a>" : "<a href='?$url'> <u>$i</u> </a>";
		}
		
		return $link;
	}
	function get_link_2($limit) {
		$link = $this->get_link_1 ( $limit );
		$pages = $this->get_pages ();
		parse_str ( $_SERVER ['QUERY_STRING'], $get_vars );
		
		if ($pages > 1) {
			$get_vars [$this->page_var] = 1;
			$url_first = http_build_query ( $get_vars );
			$get_vars [$this->page_var] = $pages;
			$url_last = http_build_query ( $get_vars );
// 			// Appending limit to url anirudh
// 			$url_first .= "&limit=" . $limit;
// 			// Appending limit to url anirudh
// 			$url_last .= "&limit=" . $limit;
			$link_new = "<span><a href='?$url_first'>" . PAGINATIONFIRST . "</a></span>  " . $link . "  <span><a href='?$url_last'>Last</a></span>";
		} else {
			$link_new = $link;
		}
		
		return $link_new;
	}
	function get_link_3($limit) {
		$link = $this->get_link_1 ( $limit );
		$pages = $this->get_pages ();
		parse_str ( $_SERVER ['QUERY_STRING'], $get_vars );
		
		if ($pages > 1) {
			$get_vars [$this->page_var] = intval ( $this->current_page ) - 1;
			$url_pre = http_build_query ( $get_vars );
			$get_vars [$this->page_var] = intval ( $this->current_page ) + 1;
			$url_next = http_build_query ( $get_vars );
// 			// Appending limit to url anirudh
// 			$url_pre .= "&limit=" . $limit;
// 			// Appending limit to url anirudh
// 			$url_next.= "&limit=" . $limit;
			
			if ($this->current_page == 1) {
				$link_new = $link . "  <span><a href='?$url_last'>" . PAGINATIONNEXT . "</a></span>";
			} else if ($this->current_page == $pages) {
				$link_new = "<span><a href='?$url_pre'>" . PAGINATIONPREV . "</a></span>  " . $link;
			} else {
				$link_new = "<span><a href='?$url_pre'>" . PAGINATIONPREV . "</a></span>  " . $link . "  <span><a href='?$url_next'>" . PAGINATIONNEXT . "</a></span>";
			}
		} else {
			$link_new = $link;
		}
		
		return $link_new;
	}
	function get_link_4($limit) {
		$this->page_separator = '';
		parse_str ( $_SERVER ['QUERY_STRING'], $get_vars );
		$link = "";
		$total_pages = $this->get_pages ();
		$page_start = (($this->current_page - 9) > 0) ? $this->current_page - 9 : 1;
		$page_end = (($this->current_page + 8) >= $total_pages) ? $total_pages : $this->current_page + 8;
		for($i = $page_start; $i <= $page_end; $i ++) {
			$get_vars [$this->page_var] = $i;
			$url = http_build_query ( $get_vars );
			// Appending limit to url anirudh
// 			$url .= "&limit=" . $limit;
			if ($i == $this->current_page)
				$link .= ($i > 1) ? $this->page_separator . " <span style='color:#cc0000;font-weight:bold;font-size:13px;float:none!important;padding-right:0px!important'> $i </span> " : " <span style='color:#cc0000;font-weight:bold;'> $i </span> ";
			else
				$link .= ($i > 1) ? $this->page_separator . "<a href='?$url'> <u>$i</u> </a>" : "<a href='?$url'> <u>$i</u> </a>";
		}
		
		$pages = $this->get_pages ();
		parse_str ( $_SERVER ['QUERY_STRING'], $get_vars );
		
		if ($pages > 1) {
			$get_vars [$this->page_var] = 1;
			$url_first = http_build_query ( $get_vars );
			$get_vars [$this->page_var] = $pages;
			$url_last = http_build_query ( $get_vars );
			$get_vars [$this->page_var] = intval ( $this->current_page ) - 1;
			$url_pre = http_build_query ( $get_vars );
			$get_vars [$this->page_var] = intval ( $this->current_page ) + 1;
			$url_next = http_build_query ( $get_vars );
			// Appending limit to url anirudh
// 			$url_first.= "&limit=" . $limit;
			
// 			$url_last .= "&limit=" . $limit;
			
// 			$url_pre .= "&limit=" . $limit;
			
// 			$url_next .= "&limit=" . $limit;
			$link_new = "<span style='padding:5px;'><a href='?$url_first'><u>" . PAGINATIONFIRST . "</u></a></span>  ";
			if ($this->current_page > 1)
				$link_new .= "<span style='padding:5px;'><a href='?$url_pre'><u>" . PAGINATIONPREV . "</u></a></span>  ";
			$link_new .= $link;
			if ($this->current_page < $total_pages)
				$link_new .= "<span style='padding:5px;'><a href='?$url_next'><u>" . PAGINATIONNEXT . "</u></a></span>  ";
			$link_new .= "  <span style='padding:5px;'><a href='?$url_last'><u>" . PAGINATIONLAST . "</u></a></span>";
		} else {
			$link_new = $link;
		}
		
		return $link_new;
	}
	function get_link($limit, $no = 1) {

		$no = intval ( $no );
		switch ($no) {
			default :
			case 1 :
	
				$link = $this->get_link_1 ( $limit );
				break;
			case 2 :
				$link = $this->get_link_2 ( $limit );
				break;
			case 3 :
				$link = $this->get_link_3 ( $limit );
				break;
			case 4 :
				$link = $this->get_link_4 ( $limit );
				break;
			case 5 :
				$link = $this->get_link_5 ( $limit );
				break;
		}
		return $link;
	}
	function get_link_5($limit) {
		$pages = $this->get_pages ();
		parse_str ( $_SERVER ['QUERY_STRING'], $get_vars );
		
		if ($pages > 1) {
			$get_vars [$this->page_var] = intval ( $this->current_page ) - 1;
			$url_pre = http_build_query ( $get_vars );
			$get_vars [$this->page_var] = intval ( $this->current_page ) + 1;
			$url_next = http_build_query ( $get_vars );

// 			$url_pre .= "&limit=" . $limit;
				
// 			$url_next .= "&limit=" . $limit;
			if ($this->current_page == 1) {
				$link_new = "  <span><a style='border:1px solid #999;padding-top:1px;' class='morelink' href='?$url_next'>" . PAGINATIONNEXT . " >></a></span>";
			} else if ($this->current_page == $pages) {
				$link_new = "<span><a style='border:1px solid #999;padding-top:1px;' class='morelink' href='?$url_pre'><< " . PAGINATIONPREV . "</a></span>  ";
			} else {
				$link_new = "<span ><a style='border:1px solid #999;padding-top:1px;' class='morelink' href='?$url_pre'><< " . PAGINATIONPREV . "</a></span>  <span><a style='border:1px solid #999;padding-top:1px;' class='morelink' href='?$url_next'>" . PAGINATIONNEXT . " >></a></span>";
			}
		} else {
			$link_new = '';
		}
		
		return $link_new;
	}
}
?>