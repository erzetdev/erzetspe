<?php

function is_admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth/login');
    } else {
        $user = $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();
        $level = $user['level'];
        if ($level != 1) {
            redirect('blocked');
        }
    }
}

function is_guru()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth/login');
    } else {
        $user = $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();
        $level = $user['level'];
        if ($level != 2) {
            redirect('blocked');
        }
    }
}

function is_siswa()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $user = $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();
        $level = $user['level'];
        if ($level != 3) {
            redirect('blocked');
        }
    }
}
