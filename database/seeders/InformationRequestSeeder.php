<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\InformationRequest;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InformationRequestSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();

        if ($users->isEmpty()) {
            $users = User::factory(10)->create(['role' => 'user']);
        }

        $requestsPerMonth = [
            1 => rand(3, 6),
            2 => rand(5, 8),
            3 => rand(4, 7),
            4 => rand(6, 10),
            5 => rand(3, 5),
            6 => rand(7, 12),
            7 => rand(5, 9),
            8 => rand(4, 6),
            9 => rand(8, 12),
            10 => rand(6, 9),
            11 => rand(4, 7),
            12 => rand(5, 8),
        ];

        $currentYear = Carbon::now()->year;

        foreach ($requestsPerMonth as $month => $count) {
            for ($i = 0; $i < $count; $i++) {
                $user = $users->random();
                $day = rand(1, 28);
                $createdAt = Carbon::create($currentYear, $month, $day, rand(8, 17), rand(0, 59));

                $status = fake()->randomElement(['pending', 'diproses', 'disetujui', 'ditolak']);
                $rejectionReason = null;

                if ($status === 'ditolak') {
                    $rejectionReason = fake()->randomElement([
                        'Dokumen yang dilampirkan tidak lengkap atau tidak sesuai dengan persyaratan.',
                        'Informasi yang diminta termasuk dalam kategori informasi yang dikecualikan.',
                        'Permohonan tidak sesuai dengan format yang ditentukan.',
                        'Data yang diminta tidak tersedia di instansi kami.',
                        'Permintaan informasi tidak dapat diproses karena alasan keamanan.',
                    ]);
                }

                InformationRequest::create([
                    'user_id' => $user->id,
                    'request_type' => 'permohonan',
                    'identity_proof' => 'identity/default.jpg',
                    'institution' => fake()->company(),
                    'proof_institution' => 'institution/default.pdf',
                    'data_request' => fake()->randomElement([
                        'Data statistik pendidikan wilayah Malang Raya tahun 2024',
                        'Laporan keuangan APBD Provinsi Jawa Timur',
                        'Dokumen perencanaan pembangunan infrastruktur',
                        'Data jumlah ASN di lingkungan Bakorwil Malang',
                        'Informasi anggaran proyek pembangunan jalan',
                        'Laporan hasil pengawasan program bantuan sosial',
                        'Data penerima bantuan UMKM di wilayah Malang',
                        'Rencana strategis pembangunan pariwisata',
                        'Dokumen kebijakan pengelolaan sampah',
                        'Informasi tender proyek konstruksi tahun berjalan',
                    ]),
                    'phone_number' => '08' . rand(100000000, 999999999),
                    'status' => $status,
                    'rejection_reason' => $rejectionReason,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            }
        }
    }
}
