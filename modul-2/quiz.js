const dataKuis = [
    {
        pertanyaan: "Apa ibukota Indonesia?",
        opsi: ["Jakarta", "Surabaya", "Bandung", "Medan"],
        benar: 0
    },
    {
        pertanyaan: "Berapa hasil dari 2 + 2?",
        opsi: ["3", "4", "5", "6"],
        benar: 1
    },
    {
        pertanyaan: "Apa warna daun?",
        opsi: ["Merah", "Biru", "Hijau", "Kuning"],
        benar: 2
    },
    {
        pertanyaan: "Planet terdekat dari Matahari?",
        opsi: ["Bumi", "Mars", "Venus", "Merkurius"],
        benar: 3
    },
    {
        pertanyaan: "Siapa presiden pertama Indonesia?",
        opsi: ["Joko Widodo", "BJ Habibie", "Soekarno", "Susilo Bambang Yudhoyono"],
        benar: 2
    }
];

let soalSekarang = 0;
let skor = 0;
let jawabanPengguna = Array(dataKuis.length).fill(null);


const teksPertanyaan = $("#question-text");
const wadahOpsi = $("#options-container");
const nomorSoalSekarang = $("#current-question");
const totalSoal = $("#total-questions");
const teksSkor = $("#score");
const batangProgres = $("#progress-bar");
const tombolLanjut = $("#next-btn");
const tombolUlang = $("#restart-btn");
const tombolUlangAkhir = $("#restart-final-btn");
const umpanBalik = $("#feedback");
const teksUmpanBalik = $("#feedback-text");
const wadahKuis = $("#quiz-container");
const wadahHasil = $("#results-container");
const skorAkhir = $("#final-score");
const totalSoalAkhir = $("#total-questions-final");

const mulaiKuis = () => {
    totalSoal.text(dataKuis.length);
    totalSoalAkhir.text(dataKuis.length);
    tampilSoal();
    perbaruiProgres();
};

const tampilSoal = () => {
    const soal = dataKuis[soalSekarang];
    teksPertanyaan.text(soal.pertanyaan);
    wadahOpsi.empty();

    soal.opsi.forEach((opsi, indeks) => {
        const elemenOpsi = $(`
            <div class="option p-3 border-2 border-gray-200 rounded-lg cursor-pointer transition-colors hover:bg-gray-50">
                ${opsi}
            </div>
        `);
        elemenOpsi.click(() => pilihOpsi(indeks));
        wadahOpsi.append(elemenOpsi);
    });

    umpanBalik.addClass("hidden");
    tombolLanjut.prop("disabled", true);
    nomorSoalSekarang.text(soalSekarang + 1);
    teksSkor.text(skor);
};

const pilihOpsi = (indeksTerpilih) => {
    $(".option").removeClass("bg-green-500 text-white bg-red-500");

    const soal = dataKuis[soalSekarang];
    const benar = indeksTerpilih === soal.benar;
    const opsiTerpilih = $(".option").eq(indeksTerpilih);

    if (benar) {
        opsiTerpilih.addClass("bg-green-500 text-white");
        if (jawabanPengguna[soalSekarang] === null) skor++;
    } else {
        opsiTerpilih.addClass("bg-red-500 text-white");
        $(".option").eq(soal.benar).addClass("bg-green-500 text-white");
    }

    jawabanPengguna[soalSekarang] = indeksTerpilih;
    teksUmpanBalik.text(benar ? "🎉 Jawaban Benar!" : "❌ Jawaban Salah!");
    umpanBalik.removeClass("hidden");
    teksSkor.text(skor);
    tombolLanjut.prop("disabled", false);
};

const perbaruiProgres = () => {
    const progres = (soalSekarang / dataKuis.length) * 100;
    batangProgres.css("width", `${progres}%`);
};

const lanjutSoal = () => {
    soalSekarang++;
    if (soalSekarang < dataKuis.length) {
        tampilSoal();
        perbaruiProgres();
    } else {
        tampilHasil();
    }
};

const tampilHasil = () => {
    wadahKuis.addClass("hidden");
    wadahHasil.removeClass("hidden");
    skorAkhir.text(skor);
};

const ulangKuis = () => {
    soalSekarang = 0;
    skor = 0;
    jawabanPengguna = Array(dataKuis.length).fill(null);
    wadahHasil.addClass("hidden");
    wadahKuis.removeClass("hidden");
    mulaiKuis();
};

$(document).ready(() => {
    mulaiKuis();
    tombolLanjut.click(lanjutSoal);
    tombolUlangAkhir.click(ulangKuis);
    tombolUlang.click(ulangKuis);
});
