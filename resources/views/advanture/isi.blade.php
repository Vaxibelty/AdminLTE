<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Dialog</title>
    <style>
        /* Styles */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            height: 100vh;
            overflow: hidden;
            font-family: Arial, sans-serif;
            background: url('{{ asset("img/download.jpg") }}') center center / cover no-repeat fixed;
        }
        .dialog-container {
            width: 100%;
            position: relative;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }
        .character {
            position: absolute;
            width: 40rem;
            height: 40rem;
            bottom: -1px;
            z-index: 1;
            animation: float 3s ease-in-out infinite;
        }
        .dialog-box {
            background-color: rgba(0, 0, 0, 0.85);
            color: #fff;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            width: 100%;
            text-align: left;
            backdrop-filter: blur(8px);
            position: relative;
            z-index: 2;
            min-height: 19rem;
            box-sizing: border-box;
        }
        .dialog-text {
            font-size: 1.2em;
            line-height: 1.6;
            margin-left: 30px;
            margin-top: 30px;
            white-space: pre-wrap;
            overflow-wrap: break-word;
        }
        .options-container {
            display: none;
            margin-top: 15px;
            margin-right: 30px;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }
        .option-button {
            background: rgba(255, 255, 255, 0.1);
            color: #4CAF50;
            padding: 10px 18px;
            font-size: 1em;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            opacity: 0;
            animation: fadeInOption 1s ease forwards;
            animation-delay: 5s;
        }

        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes fadeInOption { from { opacity: 0; } to { opacity: 1; } } 
    </style>
</head>
<body>
    <div class="dialog-container" id="dialogContainer">
        <img src="{{ asset('img/rudal.png') }}" alt="Character" class="character" id="characterImage">
        
        <div class="dialog-box">
            <div class="dialog-text" id="dialogText"></div>
            <div class="options-container" id="optionsContainer">
                <button class="option-button" onclick="chooseOption('lanjutkan')" id="option1">HAH SERIUSANN !!</button>
                <button class="option-button" onclick="chooseOption('ada_apa')" id="option2">Mas Rusdi Boong</button>
                <button class="option-button" onclick="chooseOption('masa_si')" id="option3">Ga deh males</button>
                <button class="option-button" onclick="chooseOption('apakah_iya')" id="option4">Siapa coba?</button>
            </div>
        </div>
    </div>

    <script>
        const dialogTextElement = document.getElementById("dialogText");
        const optionsContainer = document.getElementById("optionsContainer");
        const characterImage = document.getElementById("characterImage");
        
        let currentStage = 1;
        let text = "Selamat datang semuanya kalian aman aja kan? ini adalah situs resmi ngawi dan jmk 48, Btw kamu ke sini mau ngapain ya apakah kamu mau ketemu mas rusdi? atau si imut?,apalgi mas amba??. Kamu boleh kok mengekspor web ini sesuka kamu lohh jangan lupa ya untuk tetap bersyukur sehitam hitamnya batang pasti keluarnya putih aowkoakowo ehh ini mas amba mau ngobrol sama kamuu..";
        let index = 0;

        function typeText() {
            if (index < text.length) {
                dialogTextElement.innerHTML += text[index];
                index++;
                setTimeout(typeText, 10);
            } else {
                optionsContainer.style.display = "flex";
            }
        }

        document.addEventListener("DOMContentLoaded", typeText);

        function chooseOption(choice) {
            dialogTextElement.innerHTML = "";
            optionsContainer.style.display = "none";
            index = 0;

            if (currentStage === 1) {
                characterImage.src = "{{ asset('img/imt.png') }}";
                if (choice === 'lanjutkan') {
                    text = "Hai! Aku si imut, seneng banget kamu mampir ke sini! 😄 Aku udah lama nunggu ada yang datang buat ngobrol bareng, dan akhirnya kamu di sini! Dari mana nih kamu datang? 🌏 Banyak banget yang bisa kita omongin, soalnya aku penasaran banget tentang kamu! Aku ini sih kecil-kecil tapi seru, hehe! Kalau ada apa-apa yang pengen kamu tanya, jangan malu-malu, ya! Aku bakal selalu ada di sini buat kamu, teman ngobrol setia yang nggak bakal kabur. 😘 Jadi, ada cerita seru atau pertanyaan apa yang kamu bawa? Aku siap dengerin semuanya! 🎉";
                } else if (choice == 'ada_apa') {
                    text = "Hmm, gimana ya aku mulai... sebenarnya ada hal yang harus aku kasih tahu. Mas Rusdi tadi itu, dia bohong sama kamu. 🙈 Dia memang suka begitu, suka bercanda kelewatan sampai orang lain percaya! Tapi jangan salah paham, ya. Mas Rusdi nggak bermaksud bikin kamu merasa nggak nyaman. Aku mohon banget, maafin dia kali ini... Dia sebenarnya baik kok, cuma kadang candaannya agak berlebihan. Aku janji bakal tegur dia supaya nggak begitu lagi! Kita cuma pengen kamu tetap di sini, ngobrol sama kita... Soalnya, tempat ini nggak sama tanpa kamu. 😊";
                } else if (choice === 'masa_si') {
                    text = "Ehh, kamu kok cuek banget sih sama aku?! 😤 Aku di sini dari tadi ngomong-ngomong sendiri, tapi kamu malah nggak merhatiin! Apa aku nggak cukup menarik buat kamu? 😢 Aku kan cuma mau ngobrol dan dengerin cerita kamu… Huh, jangan gitu dong, please! Kalau kamu nggak mau cerita, bilang aja, aku kan bisa jadi pendengar yang baik. Tapi kalau kamu tetap ngabaikan aku… hati aku bisa patah lho! 😭 Jadi, ayo dong, kasih aku sedikit perhatian yaa... pretty please? 🙏";
                } else if (choice === 'apakah_iya') {
                    text = "Apa?? Kamu bisa kenal aku? 😡 Gimana bisa?! Aku udah berusaha banget supaya kamu nggak tahu siapa aku, tapi ternyata kamu malah bisa nebak! 🙄 Aku kan pengen jadi misterius dan nggak mau ketahuan! Kamu nggak boleh begitu! Kamu nggak sadar apa yang udah kamu lakukan? Aku jadi marah banget deh! Kamu nggak tahu betapa susahnya buat aku nggak ketahuan. Sekarang, kamu harus tanggung jawab ya! Tapi jangan salah, aku tetap sayang kok, cuma kamu harus tau batasnya. 😤";
                    setTimeout(() => {
                        window.location.href = "http://127.0.0.1:8000/"; // Ganti "/welcome" sesuai URL form welcome Anda
                    }, 8000); // Menunda sedikit untuk efek dialog
                }

                
                // Ubah teks opsi untuk dialog kedua
                document.getElementById("option1").textContent = "Terima Kasihh";
                document.getElementById("option2").textContent = "Ogah ah males amat";
                document.getElementById("option3").textContent = "Bodoamat";
                document.getElementById("option4").textContent = "Siimut Marah";

                currentStage++; // Masuk ke tahap kedua
            } else if (currentStage === 2) {
                characterImage.src = "{{ asset('img/kombo.png') }}";
                if (choice === 'lanjutkan') {
                    text = "Selamat Kamu Bisa Login Ya";
                    setTimeout(() => {
                        window.location.href = "http://127.0.0.1:8000/login"; // Ganti "/welcome" sesuai URL form welcome Anda
                    }, 1000); // Menunda sedikit untuk efek dialog
                } else if (choice == 'ada_apa') {
                    text = "Ohhh kamu gitu ya sama mas rusdi";
                    setTimeout(() => {
                        window.location.href = "https://music.youtube.com/watch?v=cMqfTJdbXpY&list=RDAMVMQ-FaATfcWac"; // Ganti "/welcome" sesuai URL form welcome Anda
                    }, 1000); // Menunda sedikit untuk efek dialog
                } else if (choice === 'masa_si') {
                    setTimeout(() => {
                        window.location.href = ""; // Ganti "/welcome" sesuai URL form welcome Anda
                    }, ); // Menunda sedikit untuk efek dialog
                }
            }

            typeText(); // Ketik ulang teks baru
        }
    </script>
</body>
</html>
