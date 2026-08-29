let gejala = window.LaravelData.gejala;            
let basispengetahuan = window.LaravelData.rules;  
let cedera = window.LaravelData.cedera;           

if(!Array.isArray(cedera)){
    cedera = Object.keys(cedera).map(k => ({
        nama_cedera: cedera[k].nama_cedera || k,
        penanganan: cedera[k].penanganan || []
    }));
}

// ----------------- STATE -----------------
let jawabanForward = {};    
let jawabanBackward = {};    
let currentForward = 0;
let selectedCedera = null;
let statusDiagnosa = 'awal'; 
let flagForwardDariBackward = false;
let flagBackwardDariForward = false;
let possibleCandidates = []; 
let lastScoreForward = null;   
let lastScoreBackward = null;  
let lastScoreFinal = null;     

//5
const AMBANG_DEC = 0.7;

// ----------------- UTILITY -----------------
function escapeHtml(text){
    if(text === null || text === undefined) return '';
    return String(text)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

//1
function hitungFrekuensiGejala(candidates){
    const freq = new Map();
    candidates.forEach(c => {
        c.gejala.forEach(g => {
            const id = g.id;
            freq.set(id, (freq.get(id) || 0) + 1);
        });
    });
    return freq;
}

// ----------------- STEP CONTROL -----------------
function showStep(step){
    ['welcome','awal','forward','backward','hasil'].forEach(id => {
        const el = document.getElementById('step-'+id);
        if(el) el.classList.add('d-none');
    });
    const activeEl = document.getElementById('step-'+step);
    if(activeEl) activeEl.classList.remove('d-none');

    if(step==='backward'){
        document.getElementById('pilihCederaSection')?.classList.remove('d-none');
        document.getElementById('pertanyaanBackwardSection')?.classList.add('d-none');
    }
}

// ----------------- MULAI DIAGNOSA -----------------
function mulaiDiagnosa(){ 
    jawabanForward = {};
    jawabanBackward = {};
    currentForward = 0;
    selectedCedera = null;
    statusDiagnosa = 'awal';
    flagForwardDariBackward = false;
    flagBackwardDariForward = false;
    possibleCandidates = JSON.parse(JSON.stringify(basispengetahuan));
    lastScoreForward = null;
    lastScoreBackward = null;
    lastScoreFinal = null;
    showStep('awal'); 
}

// ----------------- PILIH PENALARAN -----------------
function pilihPenalaran(jawaban){
    if(jawaban==='ya'){
        jawabanBackward={}; selectedCedera=null; statusDiagnosa='backward';
        flagForwardDariBackward=false; flagBackwardDariForward=false;
        showStep('backward'); tampilkanDaftarCedera();
    } else {
        jawabanForward={}; currentForward=0; statusDiagnosa='forward';
        flagForwardDariBackward=false; flagBackwardDariForward=false;
        possibleCandidates = JSON.parse(JSON.stringify(basispengetahuan));
        showStep('forward'); tampilPertanyaanForward();
    }
}

// ----------------- BACKWARD CHAINING -----------------
function tampilkanDaftarCedera(){
    const container = document.getElementById('daftarCedera');
    if(!container) return;
    container.innerHTML = '<h4>Daftar Cedera:</h4>';
    cedera.forEach(item=>{
        container.innerHTML += `<button class="btn btn-outline-primary me-2 mb-2"
            onclick="pilihCedera('${escapeHtml(item.nama_cedera)}')">${escapeHtml(item.nama_cedera)}</button>`;
    });
}

// 6
function pilihCedera(nama){
    selectedCedera = basispengetahuan.find(r=>r.nama_cedera===nama);
    if(!selectedCedera){ alert("Gejala cedera ini belum tersedia"); return; }
    jawabanBackward={};

    if(flagForwardDariBackward){
        if(lastScoreForward && lastScoreForward.matchedGejala){
            lastScoreForward.matchedGejala.forEach(g => { jawabanBackward[g.id] = 'ya'; });
        }
    }

    document.getElementById('pilihCederaSection').classList.add('d-none');
    document.getElementById('pertanyaanBackwardSection').classList.remove('d-none');
    tampilPertanyaanBackward(0);
}

function tampilPertanyaanBackward(index){
    const box = document.getElementById('backwardBox');
    if(!box || !selectedCedera?.gejala) return;
    const g = selectedCedera.gejala[index];
    if(!g) return;
    if(jawabanBackward[g.id]) {
        const nextIndex = Math.min(index+1, selectedCedera.gejala.length-1);
        let i = index;
        while(i < selectedCedera.gejala.length && jawabanBackward[selectedCedera.gejala[i].id]) i++;
        if(i < selectedCedera.gejala.length) {
            return tampilPertanyaanBackward(i);
        } else {
            return jawabBackwardComplete();
        }
    }

    const gambar = g.gambar? `<img src="${g.gambar}" style="max-height:200px;" class="mb-3">` : '';
    box.innerHTML = `
        ${gambar}
        <p>Apakah Anda mengalami <strong>${escapeHtml(g.nama_gejala)}</strong>?</p>
        <button class="btn btn-dark me-2" onclick="jawabBackward(${g.id},'ya',${index})">Ya</button>
        <button class="btn btn-dark" onclick="jawabBackward(${g.id},'tidak',${index})">Tidak</button>
    `;
}

function jawabBackward(id, jawab, _index) {
    jawabanBackward[id] = jawab;
    const total = selectedCedera.gejala.length;
    const answered = Object.keys(jawabanBackward).length;
    if(answered < total){
        for(let i=0;i<selectedCedera.gejala.length;i++){
            const g = selectedCedera.gejala[i];
            if(!jawabanBackward[g.id]) return tampilPertanyaanBackward(i);
        }
    } else {
        return jawabBackwardComplete();
    }
}

//3
function jawabBackwardComplete(){
    const total = selectedCedera.gejala.length;
    const yaItems = selectedCedera.gejala.filter(g => jawabanBackward[g.id] === 'ya');
    const yaCount = yaItems.length;
    const skorBackward = (yaCount / total); 

    lastScoreBackward = {
        nama: selectedCedera.nama_cedera,
        skor: skorBackward,
        matchedGejala: yaItems
    };

    if(yaCount === total){
        tampilkanHasil(selectedCedera.nama_cedera, true, true, selectedCedera.gejala, 'backward-murni');
        return;
    }

    if(flagForwardDariBackward && lastScoreForward){
        const G_cocok_awal = lastScoreForward.matchedGejala.filter(g =>
            selectedCedera.gejala.some(sg => sg.id === g.id)).length;
        const G_cocok_akhir = yaItems.length;
        const G_total_terbaik = selectedCedera.gejala.length;
        const S_final = (G_cocok_awal + G_cocok_akhir) / G_total_terbaik;
        lastScoreFinal = {
            nama: selectedCedera.nama_cedera,
            skorFinal: S_final,
            G_cocok_awal,
            G_cocok_akhir,
            G_total_terbaik,
            matchedGejala: Array.from(new Set([
                ...lastScoreForward.matchedGejala.map(g=>g.id),
                ...yaItems.map(g=>g.id)
            ]))
        };
    
        if(S_final >= AMBANG_DEC){
            const matchedObjs = selectedCedera.gejala.filter(g => lastScoreFinal.matchedGejala.includes(g.id));
            tampilkanHasil(
                selectedCedera.nama_cedera, true, true, matchedObjs, 'backward-lanjutan');
        } else {
            tampilkanHasil(
                selectedCedera.nama_cedera, true, false, yaItems, 'backward-lanjutan');
        }
        flagForwardDariBackward = false;
        return;
    }

if(!flagForwardDariBackward){
    if(skorBackward >= AMBANG_DEC){
        tampilkanHasil(selectedCedera.nama_cedera, true, true, yaItems, 'backward-murni');
    } else {
        tampilkanHasil(selectedCedera.nama_cedera, true, false, yaItems, 'backward-murni');
    }
    return;
}   
}

// ----------------- FORWARD CHAINING -----------------
function tampilPertanyaanForward(){
    const box = document.getElementById('forwardBox');
    if(!box) return;

    const askedIds = Object.keys(jawabanForward).map(id => Number(id));
    const remainingGejala = [];

    possibleCandidates.forEach(c => {
        c.gejala.forEach(g => {
            if(!askedIds.includes(g.id) && !remainingGejala.find(x=>x.id===g.id)){
                remainingGejala.push(g);
            }
        });
    });

if(remainingGejala.length === 0){
    let hasilForward = [];
    for(let r of basispengetahuan){
        const total = r.gejala.length;
        if(total === 0) continue;
        const yaItems = r.gejala.filter(g => jawabanForward[g.id] === 'ya');
        const yaCount = yaItems.length;
        const persen = yaCount / total;
        hasilForward.push({ nama_cedera: r.nama_cedera, persen, matched: yaItems });
    }

    const kandidatTersisa = hasilForward.filter(h => h.persen >= AMBANG_DEC);

    if(kandidatTersisa.length === 1){
        const c = kandidatTersisa[0];
        lastScoreForward = { nama: c.nama_cedera, skor: c.persen, matchedGejala: c.matched };
        tampilkanHasil(c.nama_cedera,false,true,c.matched,'forward-murni');
        return;
    }

    else if(kandidatTersisa.length > 1){
        const gejalaUnik = cariGejalaPembeda(kandidatTersisa);
        if(gejalaUnik){
            tampilkanPertanyaanTerakhir(gejalaUnik);
            return;
        } else {
            const tertinggi = kandidatTersisa.sort((a,b)=>b.persen - a.persen)[0];
            lastScoreForward = { nama: tertinggi.nama_cedera, skor: tertinggi.persen, matchedGejala: tertinggi.matched };
            tampilkanHasil(tertinggi.nama_cedera,false,false,tertinggi.matched,'forward-murni');
            return;
        }
    }

    else {
        const tertinggi = hasilForward.sort((a,b)=>b.persen - a.persen)[0];
        lastScoreForward = { nama: tertinggi.nama_cedera, skor: tertinggi.persen, matchedGejala: tertinggi.matched };
        tampilkanHasil(tertinggi.nama_cedera,false,false,tertinggi.matched,'forward-murni');
        return;
    }
}
//1
    const freqMap = hitungFrekuensiGejala(possibleCandidates);
    remainingGejala.sort((a,b) => (freqMap.get(b.id) || 0) - (freqMap.get(a.id) || 0));
    const g = remainingGejala[0];

    const gambar = g.gambar? `<img src="${g.gambar}" style="max-height:200px;" class="mb-3">` : '';
    box.innerHTML = `
        ${gambar}
        <h4>Apakah Anda mengalami <strong>${escapeHtml(g.nama_gejala)}</strong>?</h4>
        <button class="btn btn-dark me-2" onclick="jawabForward('${g.id}','ya')">Ya</button>
        <button class="btn btn-dark" onclick="jawabForward('${g.id}','tidak')">Tidak</button>
    `;
}

function jawabForward(gid, jawab){
    const id = Number(gid);
    jawabanForward[id]=jawab;

    //2
    if(jawab === 'ya'){
        possibleCandidates = possibleCandidates.filter(c => c.gejala.some(g => Number(g.id) === id));
    } else {
        possibleCandidates = possibleCandidates.filter(c => !c.gejala.some(g => Number(g.id) === id));
    }
    const cek = cekDiagnosa(jawabanForward);
    if(cek && cek.nama){
        lastScoreForward = { nama: cek.nama, skor: cek.skor, matchedGejala: cek.matched };
    }

    console.log("Jawab YA di G" + id);
    console.log("Kandidat tersisa:", possibleCandidates.map(c => c.nama_cedera));

    if (possibleCandidates.length === 0) {
        if(lastScoreForward){
            if(lastScoreForward.skor >=AMBANG_DEC){
                tampilkanHasil ( lastScoreForward.nama, false, true, lastScoreForward.matchedGejala, 'forward-murni');

            } else {
                tampilkanHasil ( lastScoreForward.nama, false, false, lastScoreForward.matchedGejala, 'forward-murni');
            }
        } else {
            tampilkanHasil( '', false, false, [], 'forward-murni');
        }
        return;
    }
    
    if(cek && cek.pasti){
        lastScoreForward = { nama: cek.nama, skor: 1, matchedGejala: cek.matched };
        tampilkanHasil(cek.nama,false,true,cek.matched,'forward-murni');
        return;
    }
    tampilPertanyaanForward();
}

// ----------------- CEK DIAGNOSA -----------------
function cekDiagnosa(jawabanById){
    let kandidatTerbaik = null;
    let matchedTerbaik = [];
    let maxSkor = -1;

    for(let r of basispengetahuan){
        const total = r.gejala.length || 0;
        if(total === 0) continue;
//3
        const yaItems = r.gejala.filter(g => jawabanById[g.id] === 'ya');
        const yaCount = yaItems.length;
        const skor = yaCount / total; 

        if(yaCount === total){
            return { nama: r.nama_cedera, pasti: true, matched: yaItems, skor: 1 };
        }

        console.log("Skor sementara:", r.nama_cedera, skor, yaItems.map(g=>g.nama_gejala));

        //4
        if(skor > maxSkor){
            maxSkor = skor;
            kandidatTerbaik = r;
            matchedTerbaik = yaItems;
        }
    }

    if(!kandidatTerbaik){
        return null;
    }

    return {
        nama: kandidatTerbaik.nama_cedera,
        pasti: false,
        matched: matchedTerbaik,
        skor: maxSkor
    };
}

// ----------------- TAMPILKAN HASIL  -----------------
function tampilkanHasil(namaCedera, _dariBackward=false, pasti=false, matchedGejala=[], mode=''){
    showStep('hasil');

    const hasilText = document.getElementById('hasilText');
    const alasanText = document.getElementById('alasanText');
    const penangananText = document.getElementById('penangananText');
    if(!hasilText || !alasanText || !penangananText) return;

    const gejalaStr = matchedGejala.map(g=>escapeHtml(g.nama_gejala)).join(', ') || 'Tidak ada gejala yang cocok';

    switch(mode){
        case 'forward-murni':
        case 'backward-murni':
            if(pasti){
                hasilText.innerHTML = `Anda mengalami <strong>${escapeHtml(namaCedera)}</strong>`;
                alasanText.innerHTML = `Berdasarkan gejala: ${gejalaStr}`;
                penangananText.innerHTML = getPenanganan(namaCedera);
                simpanRiwayatKeServer(namaCedera, matchedGejala);
            } else if(matchedGejala.length > 0){
                if(mode === 'forward-murni'){
                    hasilText.innerHTML = `Anda Kemungkinan Mengalami <br>
                    <strong style="font-size:1.2rem;">${escapeHtml(namaCedera)}</strong>`;
                    alasanText.innerHTML = `Berdasarkan gejala: ${gejalaStr}`;
                    penangananText.innerHTML = `<p class="mb-2">
                    Silakan klik tombol Cek Lebih Lanjut di bawah ini untuk memastikan gejala yang Anda alami
                </p>
                    <a href="#" class="btn btn-info mt-2" onclick="lanjutKeBackward('${escapeHtml(namaCedera)}')">Cek Lebih Lanjut</a>`;
                } else {
                    hasilText.innerHTML = `Cedera ini tidak sesuai dengan gejala Yang Anda Alami`;
                    alasanText.innerHTML = `Coba telusuri <a href="#"class="fw-bold text-primary "onclick="showStep('backward'); tampilkanDaftarCedera(); return false;">
                    kemungkinan cedera lain
                    </a>
                    atau lakukan penelusuran berdasarkan gejala yang Anda alami Menggunakan Tombol Dibawah ini.
                    `;
                    penangananText.innerHTML = `<button class="btn btn-warning mt-2" onclick="lanjutKeForward('${escapeHtml(namaCedera)}')">Telusuri Gejala</button>`;
                }
            } else {
                hasilText.innerHTML = `Cedera Yang Anda Alami Belum Diketahui`;
                alasanText.innerHTML = `segera ke fasilitas medis terdekat`;
                penangananText.innerHTML = '';
            }
            statusDiagnosa = 'selesai';
            break;

        case 'forward-lanjutan':
            if(pasti){
                hasilText.innerHTML = `Anda mengalami <strong>${escapeHtml(namaCedera)}</strong>`;
                alasanText.innerHTML = `Berdasarkan gejala: ${gejalaStr}`;
                penangananText.innerHTML = getPenanganan(namaCedera);
                simpanRiwayatKeServer(namaCedera, matchedGejala);
            } else {
                hasilText.innerHTML = `<div style="text-align:center;font-weight:bold;">Cedera ini tidak sesuai dengan gejala Anda</div>`;
                alasanText.innerHTML = `segera ke fasilitas medis terdekat`;
                penangananText.innerHTML = ``;
            }
            statusDiagnosa = 'selesai';
            break;

        case 'backward-lanjutan':
            if(pasti){
                hasilText.innerHTML = `Anda mengalami <strong>${escapeHtml(namaCedera)}</strong>`;
                alasanText.innerHTML = `Berdasarkan gejala: ${gejalaStr}`;
                penangananText.innerHTML = getPenanganan(namaCedera);
                simpanRiwayatKeServer(namaCedera, matchedGejala);
            } else {
                hasilText.innerHTML = `<div style="text-align:center;font-weight:bold;">Cedera ini tidak sesuai dengan gejala Anda</div>`;
                alasanText.innerHTML = `segera ke fasilitas medis terdekat`;
                penangananText.innerHTML = ``;
            }
            statusDiagnosa = 'selesai';
            break;

        default:
            hasilText.innerHTML = `Hasil kemungkinan: ${escapeHtml(namaCedera)}`;
            alasanText.innerHTML = `Berdasarkan gejala: ${gejalaStr}`;
            penangananText.innerHTML = '';
            statusDiagnosa = 'selesai';
            break;
    }
}

// ----------------- lanjutan -----------------
function lanjutKeBackward(nama){
    selectedCedera = basispengetahuan.find(r=>r.nama_cedera===nama);
    if(!selectedCedera){ alert("Data gejala tidak tersedia"); return; }
    statusDiagnosa='backward';
    flagForwardDariBackward = true; 
    flagBackwardDariForward = false;

    jawabanBackward = {};
    Object.keys(jawabanForward).forEach(k => {
        if(jawabanForward[k] === 'ya') jawabanBackward[Number(k)] = 'ya';
    });

    showStep('backward');
    document.getElementById('pilihCederaSection').classList.add('d-none');
    document.getElementById('pertanyaanBackwardSection').classList.remove('d-none');
    tampilPertanyaanBackward(0);
}

function lanjutKeForward(){
    const gejalaYa = Object.keys(jawabanBackward).filter(k => jawabanBackward[k] === 'ya').map(k => Number(k));
    const freq = new Map();
    basispengetahuan.forEach(rule => {
        rule.gejala.forEach(g => {
            if(gejalaYa.includes(g.id)){
                freq.set(g.id, (freq.get(g.id) || 0) + 1);
            }
        });
    });

    const gejalaMulti = gejalaYa.filter(id => freq.get(id) > 1);
    if(gejalaMulti.length === 0) {
        jawabanBackward={}; 
        jawabanForward = {};
        currentForward=0;
        possibleCandidates = JSON.parse(JSON.stringify(basispengetahuan));
        statusDiagnosa='forward';
        flagBackwardDariForward = true;
        flagForwardDariBackward = false;

        showStep('forward');
        tampilPertanyaanForward();
        return;
    }

    jawabanForward = {};
    gejalaMulti.forEach(id => jawabanForward[id] = 'ya');
    possibleCandidates = JSON.parse(JSON.stringify(basispengetahuan));
    gejalaMulti.forEach(gid => {
        possibleCandidates = possibleCandidates.filter(c => c.gejala.some(g => g.id === gid));
    });

    jawabanBackward = {};
    currentForward = 0;
    statusDiagnosa = 'forward';
    flagBackwardDariForward = true;
    flagForwardDariBackward = false;
    

    showStep('forward');
     tampilPertanyaanForward();
}

// ----------------- RESET -----------------
function ulangiDiagnosa(){
    mulaiDiagnosa();
}

// ----------------- SIMPAN RIWAYAT -----------------
function simpanRiwayatKeServer(namaCedera, matchedGejala) {
    if (!namaCedera || !matchedGejala || matchedGejala.length === 0) return;

    const gejalaIds = matchedGejala.map(g => g.id);

    fetch('/pasien/diagnosa/simpan', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            cedera_nama: namaCedera,
            gejala: gejalaIds,
            is_valid : true
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            console.log('✅ Riwayat tersimpan:', data.data);
        } else {
            console.error('⚠️ Gagal menyimpan:', data.message);
        }
    })
    .catch(err => console.error('❌ Error:', err));
}

// ----------------- AMBIL PENANGANAN DARI DATA cedera (DB) -----------------
function getPenanganan(namaCedera){
    const ced = cedera.find(c => c.nama_cedera === namaCedera);
    if(!ced || !ced.penanganan || ced.penanganan.length === 0) return 'Penanganan tidak tersedia.';
    return `<strong>Penanganan:</strong><br>
    <ul>${ced.penanganan.map(p => `<li>${escapeHtml(p)}</li>`).join('')}</ul>
    <div class="border rounded p-3 mt-3" style="font-size: 0.9rem;">
    <em>
    Jika gejala tidak kunjung membaik atau bertambah parah, silakan pergi ke fasilitas medis terdekat.
    </em>
    </div>`;
}

// ----------------- INISIAL START -----------------
window.onload = function(){
    mulaiDiagnosa();
};