<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
}

function access_menu_s1()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    $menuS1 = $ci->uri->segment(1);

    $queryMenu = $ci->db->get_where('menu', ['menu' => $menuS1])->row_array();
    $menu_id = $queryMenu['id'];
    $userAccess = $ci->db->get_where('menu_access', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($userAccess->num_rows() < 1) {
        redirect('auth/blocked');
    }
}
function access_menu_s2()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    $menuS2 = $ci->uri->segment(2);

    $queryMenu = $ci->db->get_where('menu', ['menu' => $menuS2])->row_array();
    $menu_id = $queryMenu['id'];
    $userAccess = $ci->db->get_where('menu_access', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($userAccess->num_rows() < 1) {
        redirect('auth/blocked');
    }
}
function access_menu_s3()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    $menuS3 = $ci->uri->segment(3);

    $queryMenu = $ci->db->get_where('menu', ['menu' => $menuS3])->row_array();
    $menu_id = $queryMenu['id'];
    $userAccess = $ci->db->get_where('menu_access', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($userAccess->num_rows() < 1) {
        redirect('auth/blocked');
    }
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

function format_angka($angka)
{
    $hasil = number_format($angka, '0', '', '.');
    return $hasil;
}
