<?php

function menu_item($label, $view = null, $customSlug = null) {
    return [
        'label' => $label,
        'slug'  => $customSlug ?? str($label)->slug(),
        'view' => $view ?? str($label)->slug()
    ];
}

return [
    'main' => [
        [
            'type' => 'link',
            'label' => 'Beranda',
            'url' => '/'
        ],
        [
            'type' => 'dropdown',
            'label' => 'Profil',
            'prefix' => 'profil',
            'items' => [
               menu_item('Regulasi'),
               menu_item('Seputar PPID', 'seputar'),
               menu_item('Visi dan Misi PPID', 'visimisi'),
               menu_item('Tugas/Fungsi dan Kewenangan PPID', 'tugasfungsi'),
               menu_item('Standar Pelayanan PPID', 'pelayanan'),
               menu_item('SOP PPID', 'sop'),
            ]
        ],
        [
            'type' => 'dropdown',
            'label' => 'Tata Cara',
            'prefix' => 'tata-cara',
            'items' => [
               menu_item('Tata Cara Permohonan Informasi', 'informasi'),
               menu_item('Tata Cara Pengajuan Keberatan', 'keberatan'),
               menu_item('Tata Cara Pengajuan Penyelesaian Sengketa Informasi', 'sengketa'),
               menu_item('Tata Cara Pengaduan Masyarakat', 'masyarakat'),
               menu_item('Tata Cara Pengaduan Integritas', 'integritas'),
            ]
        ],
        [
            'type' => 'dropdown',
            'label' => 'Layanan Informasi',
            'prefix' => 'layanan-informasi',
            'items' => [
               menu_item('Permohonan Informasi', 'informasi'),
               menu_item('Keberatan Informasi', 'keberatan'),
               menu_item('Alasan Keberatan Informasi', 'alasanberat'),
               menu_item('laporan Layanan Informasi Publik', 'laporanlayanan'),
               menu_item('Laporan Akses Informasi Publik', 'laporanakses'),
            ]
        ],
        [
            'type' => 'dropdown',
            'label' => 'Laporan PPID',
            'prefix' => 'laporan-ppid',
            'items' => [
               menu_item('Laporan Keuangan', 'keuangan'),
               menu_item('Laporan LHKPN', 'lhkpn'),
            ]
        ],
        [
            'type' => 'link',
            'label' => 'Web Utama',
            'url' => 'https://bakorwilmalang.jatimprov.go.id/'
        ],
    ]
];