# sditanshal
Sistem ini dibuat untuk pengajuan anggaran yang di SDIT Anak Shalih Bogor.

# how its work ?
ada beberapa proses yang harus dilakukan untuk pengambilan dana di SDIT,
1. [Maker] mengajukan dana dengan mengisi didalam form pengajuan,
2. [keuangan / Checker] melakukan koreksi dari anggaran yang ada dengan anggaran yang diajukan oleh maker, conditional terjadi, jika sesuai dengan anggaran bulanan maka checker menyetujui anggaran dan berlajut ke langkah berikutnya, jika tidak (reject) maka pengajuan yang diajukan maker akan di delet.
3. langkah selajutnya ada di user yang mempunyai wewnang untuk meng-approve pengajuan dara -> Approver (bagian manager [Kepala Sekolah] [Kadiv Akademik] [Kadiv Kesiswaan]. Conditional if terjadi, jika approver menyetuji maka maker harus meng-print anggaran yang telah disetuji dan diberikan kepada kasir [keuangan] untuk melakukan pengambilan dana berdasarkan lembaran yang diprint maker dan dicocokan dengan data yang ada didalam sistem, jika tidak maka data akan di-delete.
4. [keuangan] pada saat memberikan dana harus mengisi didalam sistem siapa yang mengambil dana, data tersebut akan direkam dan di store ke databse berupa waktu dan pengambil dana.
5. [maker] harus melaporkan pertanggungjawaban keuangan kepada [keuangan]. [keuangan] berdasarkan laporan tersebut didukung dengan bukti pembayaran menginput laporan kedalam sistem dan meng-upload bukti pembelanjaan.
6. [maker] dapat melihat riwayat pengajuan didasbord riwayat. informasi yang ditampilkan adalah track record waktu, nominal dan pengambil dana serta pelapor dana dan bukti fisik dalam file pdf yang diupload [maker]
