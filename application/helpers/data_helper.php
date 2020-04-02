<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


// -----------------------------------------------------------------------------
function getUserbyId($id)
{
	$CI = &get_instance();
	return $CI->db->get_where('ci_users', array('id' => $id))->row_array()['firstname'];
}

function getAllResiden()
{
	$CI = &get_instance();
	$query = $CI->db->get('residen');
	return $query->result_array();
}

function getAllDivisi(){
	$CI = &get_instance();
	$query = $CI->db->get('divisi');
	return $query->result_array();
}


