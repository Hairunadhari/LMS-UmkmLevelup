@extends('lms.main')
@section('container')
<style>
    #pdf-container {
        margin-top: 2%;
        /* padding: 10px; */
        height: max-content;
        background-color: #3b3b3b;
        border-radius: 5px;
    }

    .navigation-buttons {
        display: flex;
        justify-content: space-between;
    }
    .buttondetail{
            display: none;
        }
        .content-materi{
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            margin: 0;
        }
    @media only screen and (max-width: 600px) {
        #pdf-container {
            height: max-content;
            width: max-content;
            margin: auto
        }
        .navigation-buttons {
            display: block;
        }
        .selesaikan, .detailmateri{
            text-align: center
        }
        .selesaikan{
            margin-bottom: 1rem;
        }
        /* .buttondetail{
            display: inline;
        } */
        .content-materi{
            padding: 0px;
            margin: 0px;
        }
        
    }

</style>
<link rel="stylesheet" href=" {{ asset('css/pageChat.css')}}">

<div class="Content ">
    <div id="video-container" style=" padding: 10px; height:auto; background-color:#3b3b3b; border-radius:5px">
        <div class="row">
        </div>
    </div>
    <div class="row  content-materi">
        <div class="tp_left d-flex align-items-center gap-4 mt-3">
            <div class="tpl_img">
                <img src="{{asset ('../img/senbud-icon.png')}} " alt="" class="">
            </div>
            <div class="tpl_title">
                <h5 class="mb-0 fw-bold">{{$sub_materi->nama}}</h5>
                <hr> Author : <span class="badge badge-sm bg-secondary"><i class="fa fa-user"></i>
                    {{$sub_materi->name}}</span>
            </div>
        </div>
        <div class="col-12">
            <p class="mb-0 mt-4 text-justify">Deskripsi : <br> {{$sub_materi->deskripsi}}</p>
        </div>
        <div class="col-md-8">
            <div class="row mt-3 mb-4">
                <div class="col-md-12 col-sm-12 col-12">

                    <div class="top_profile">
                        <div class="navigation-buttons">
                            <div class="selesaikan">
                                <a href="{{url('/')}}/add-status/{{$sub_materi->id}}" class="btn btn-success btn-sm"><i
                                        class="fa fa-paper-plane"></i> Selesaikan Semua Materi</a>
                            </div>
                            <div class="detailmateri">
                                {{-- <button type="button"  class="btn btn-dark buttondetail" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{$sub_materi->id}}">
                                    <i class="fas fa-eye"></i> Detail Materi
                                </button> --}}
                                <span>Page : <span id="pageKe"></span> / <span id="totalHalaman"></span></span>
                            </div>
                        </div>
                        <div style="" id="pdf-container">
                            <div id="controls" class="carousel slide" data-interval="false">
                                <!-- Button trigger modal -->
                                <div class="carousel-inner" data-interval="false">
                                    <div class="spinner-border text-light" style="display: none" id="pdfLoader"
                                        role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" id="prev-slide" style="z-index: 9999;  "
                                    type="button" data-bs-target="#controls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark" style="height: 5rem;"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" id="next-slide" style="z-index: 9999;"
                                    type="button" data-bs-target="#controls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-dark" style="height: 5rem;"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>

                        <input style="display: none" type="text" value="{{$sub_materi->file_location}}"
                        id="file_location">
                        <input style="display: none" type="text" value="{{$sub_materi->video_url}}" id="video_url">
                        <input style="display: none" type="text" value="{{$materiid}}" id="id_materi">
                        <input style="display: none" type="text" value="{{Auth::user()->id}}" id="user_id">
                        <input style="display: none" type="text" value="{{Auth::user()->name}}" id="name_user">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="row mt-3">

            </div>
            <div class="col-md-12">
                <section class="msger" style="height: 40rem; overflow: auto">
                    <header class="msger-header">
                        <div class="msger-header-title">
                            <i class="fas fa-comment-alt"></i> Chatting Group Materi
                        </div>
                        <div class="msger-header-options">

                        </div>
                    </header>

                    <main class="msger-chat" id="chats">
                        @foreach ($chats as $chat)
                        @if ($chat->user_id == Auth::user()->id)

                        <div class="msg right-msg">
                            @else

                            <div class="msg left-msg">
                                @endif
                                <div class="msg-img text-center p-2">
                                    <i class="fas fa-user" style="font-size: 30px; color:gray"></i>
                                </div>
                                <div class="msg-bubble">
                                    <div class="msg-info">
                                        <div class="msg-info-name">{{$chat->name}}</div>
                                        <div class="msg-info-time">
                                            {{ \Carbon\Carbon::parse($chat->tanggal)->format('Y M d, H:i') }}
                                        </div>

                                    </div>
                                    <div class="msg-text">
                                        {{$chat->chat}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </main>

                    <form class="msger-inputarea">
                        <input type="text" class="msger-input" placeholder="Enter your message...">
                        <button type="submit" class="msger-send-btn">Send</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js" integrity="sha512-g16L6hyoieygYYZrtuzScNFXrrbJo/lj9+1AYsw+0CYYYZ6lx5J3x9Yyzsm+D37/7jMIGh0fDqdvyYkNWbuYuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script>
    $(document).ready(function () {
        setInterval(function () {
            $('#chats').load(location.href + ' #chats');
        }, 5000);
        // const fileUrl = 'http://127.0.0.1:8080/pdfkominfo.pdf';
        let fileUrl = $('#file_location').val();
        let id_submateri = $('#id_submateri').val();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        console.log('csrftoken', csrfToken);
        let videoUrl = $('#video_url').val();
        let id_materi = $('#id_materi').val();
        console.log("file pdf", fileUrl)
        console.log("file video", videoUrl)
        



        let currentPage = 1;
        let pdfDoc = null;

        const loadPdf = async () => {
            try {
                // Tampilkan loader saat PDF dimuat
                const pdfLoader = document.getElementById('pdfLoader');
                pdfLoader.style.display = 'block';

                pdfDoc = await pdfjsLib.getDocument(fileUrl).promise;

                const carouselInner = document.querySelector('.carousel-inner');
                carouselInner.innerHTML = '';

                console.log('Total halaman:', pdfDoc.numPages); // Menampilkan total halaman di konsol

                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    const page = document.createElement('div');
                    page.classList.add('carousel-item');
                    if (pageNum === 1) {
                        page.classList.add('active');
                    }

                    const canvas = document.createElement('canvas');
                    canvas.id = `pdf-canvas-${pageNum}`;
                    page.appendChild(canvas);

                    carouselInner.appendChild(page);

                    renderPage(pageNum, canvas);
                }

                // Sembunyikan loader setelah PDF dimuat
                pdfLoader.style.display = 'none';
            } catch (error) {
                console.error('Error loading PDF:', error);
                // Sembunyikan loader jika terjadi kesalahan saat memuat PDF
                const pdfLoader = document.getElementById('pdfLoader');
                pdfLoader.style.display = 'none';
            }
        };

        const renderPage = (pageNumber, canvas) => {
            pdfDoc.getPage(pageNumber).then((page) => {
                let scale = 0.6; // Default scale
                if (window.innerWidth <= 600) {
                    scale = 0.25; // Jika lebar layar kurang dari atau sama dengan 600px, gunakan skala 0.5
                }
                const viewport = page.getViewport({
                    scale: scale
                });
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                const ctx = canvas.getContext('2d');
                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };

                page.render(renderContext);
                const pageKeElem = document.getElementById('pageKe');
                const totalHalamanElem = document.getElementById('totalHalaman');

                pageKeElem.textContent = pageNumber; // Ubah currentPage menjadi pageNumber
                totalHalamanElem.textContent = pdfDoc.numPages;
            });
        };

        loadPdf();

        if (videoUrl == '') {
            const h1Element = document.createElement('h1');
            h1Element.textContent = 'Tidak ada video';
            h1Element.style.color = 'white';
            h1Element.style.textAlign = 'center';
            h1Element.style.opacity = '0.7'; // Mengatur opacity menjadi 0.7 (70% transparan)
            $('#video-container').append(h1Element);
        } else {
            const videoElement = document.createElement('iframe');
            videoElement.controls = true;
            videoElement.src = videoUrl;
            // Set width and height
            videoElement.style.width = '100%'; // You can change this value according to your requirements
            videoElement.style.height = '400px'; // You can change this value according to your requirements

            $('#video-container').append(videoElement);


            videoElement.addEventListener('load', function () {
                const iframeDocument = videoElement.contentWindow.document;
                const video = iframeDocument.querySelector('video');
                console.log(video);

                video.addEventListener('timeupdate', function () {
                    const currentTime = video.currentTime;
                    const duration = video.duration;
                    const progres = (currentTime / duration) * 100;

                    console.log('Waktu saat ini:', currentTime);
                    console.log('Durasi total:', duration);
                    console.log('Progres:', Math.floor(progres));
                    $.ajax({
                        method: 'post',
                        url: '/update-progres-video',
                        data: {
                            _token: csrfToken,
                            id_submateri: id_submateri,
                            id_materi: id_materi,
                            progres_video: Math.floor(progres)
                        },
                        success: function (res) {
                            console.log(res);
                        }
                    });
                });
            });
        }

        document.getElementById('prev-slide').addEventListener('click', () => {
            if (currentPage > 1) { // Periksa jika currentPage bukan 1
                currentPage--;
            } else {
                currentPage = pdfDoc
                    .numPages; // Jika currentPage adalah 1, maka set currentPage ke jumlah total halaman
            }

            const pageKeElem = document.getElementById('pageKe');
            pageKeElem.textContent = currentPage;

            // Juga pastikan untuk memperbarui tampilan halaman yang ditampilkan
            const carouselInner = document.querySelector('.carousel-inner');
            const activePage = carouselInner.querySelector('.carousel-item.active');
        });



        $(document).on('click', '#next-slide', function (e) {
            let id_submateri = $('#id_submateri').val();
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            if (currentPage < pdfDoc.numPages) {
                currentPage++;
                const carouselInner = document.querySelector('.carousel-inner');
                const activePage = carouselInner.querySelector('.carousel-item.active');
                const pageKeElem = document.getElementById('pageKe');
                pageKeElem.textContent = currentPage;
                console.log(currentPage);
                console.log(pdfDoc.numPages);
                let progres = (currentPage * 100) / pdfDoc.numPages;
                console.log(progres);
                $.ajax({
                    method: 'post',
                    url: '/update-progres-pdf',
                    data: {
                        _token: csrfToken,
                        id_submateri: id_submateri,
                        id_materi: id_materi,
                        progres_pdf: Math.floor(progres)
                    },
                    success: function (res) {
                        console.log(res);
                    }
                });
            } else {
                currentPage = 1;
                const pageKeElem = document.getElementById('pageKe');
                pageKeElem.textContent = currentPage;
                return; // Menghentikan eksekusi jika ini adalah halaman terakhir
            }
        });

    });

    const msgerForm = get(".msger-inputarea");
    let msgerInput = get(".msger-input");
    const msgerChat = get(".msger-chat");
    let id_user = $('#user_id').val();
    let sub_materi_id = $('#id_submateri').val();
    const csrfToken = $('meta[name="csrf-token"]').attr('content');


    // Icons made by Freepik from www.flaticon.com
    const BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
    const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
    const BOT_NAME = "BOT";
    const PERSON_NAME = $('#name_user').val();

    msgerForm.addEventListener("submit", event => {
        event.preventDefault();
        let msgText = msgerInput.value;
        if (!msgText) return;

        $.ajax({
            method: 'post',
            url: '/send-chatting',
            data: {
                _token: csrfToken,
                chat: msgText,
                id_user: id_user,
                sub_materi_id: sub_materi_id,
            },
            success: function (res) {
                console.log('respon', res);
            }
        });

        appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
        msgerInput.value = "";

    });

    function appendMessage(name, img, side, text) {
        //   Simple solution for small apps
        const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

        msgerChat.insertAdjacentHTML("beforeend", msgHTML);
        msgerChat.scrollTop += 500;
    }



    // Utils
    function get(selector, root = document) {
        return root.querySelector(selector);
    }

    function formatDate(date) {
        const h = "0" + date.getHours();
        const m = "0" + date.getMinutes();

        return `${h.slice(-2)}:${m.slice(-2)}`;
    }

    function random(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
    }

</script>
@endsection
@section('modal')
{{-- <style>
    @media only screen and (max-width: 600px) {
        #pdf-container {
            margin-top: 2%;
            padding: 0;
            height: max-content;
            background-color: #3b3b3b;
            border-radius: 5px;
        }
    }

</style> --}}
<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal{{$sub_materi->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Detail Materi</h1>
                <div style="display: flex; justify-content: center;">
                    <span style="margin-right: 20px;">Page : <span id="pageKex"></span> / <span
                            id="totalHalamanx"></span></span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div style="" id="pdf-container">
                    <div id="controlsx" class="carousel slide" data-interval="false">
                        <div class="carousel-inner carouselx" data-interval="false">
                            <div class="spinner-border text-light" style="margin-left: 45%; display:none"  id="pdfLoadermodal"
                                role="status">
                                <span class="visually-hidden" >Loading...</span>
                            </div>
                        </div>
                        <button class="carousel-control-prev" id="prev-slidex" style="z-index: 9999;  " type="button"
                            data-bs-target="#controlsx" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" style="height: 5rem;"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" id="next-slidex" style="z-index: 9999;" type="button"
                            data-bs-target="#controlsx" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark" style="height: 5rem;"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}


{{-- <script>
    $(document).ready(function () {
        // const fileUrl = '/storage/data_upload_lms/HVETLEWJ1PLYq9rNbFsigQdIQGZqByvd6isMSqve.pdf';
        let id_submateri = $('#id_submateri').val();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        let fileUrl = $('#file_location').val();
        let videoUrl = $('#video_url').val();
        let id_materi = $('#id_materi').val();

        let currentPage = 1;
        let pdfDoc = null;

        const loadPdf = async () => {
            try {
                const pdfLoader = document.getElementById('pdfLoadermodal');
                pdfLoader.style.display = 'block';
                pdfDoc = await pdfjsLib.getDocument(fileUrl).promise;

                const carouselInner = document.querySelector('.carouselx');
                carouselInner.innerHTML = '';


                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    const page = document.createElement('div');
                    page.classList.add('carousel-item');
                    if (pageNum === 1) {
                        page.classList.add('active');
                    }

                    const canvas = document.createElement('canvas');
                    canvas.id = `pdf-canvas-${pageNum}`;
                    page.appendChild(canvas);

                    carouselInner.appendChild(page);

                    renderPage(pageNum, canvas);
                }
            } catch (error) {
                console.error('Error loading PDF:', error);
                const pdfLoader = document.getElementById('pdfLoadermodal');
                pdfLoader.style.display = 'none';
            }
        };

        const renderPage = (pageNumber, canvas) => {
            pdfDoc.getPage(pageNumber).then((page) => {
                const viewport = page.getViewport({
                    scale: 0.5 // Ubah scale dari 0.5 menjadi 1 untuk resolusi yang lebih tinggi
                });
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                const ctx = canvas.getContext('2d');
                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };

                page.render(renderContext);
                const pageKeElem = document.getElementById('pageKex');
                const totalHalamanElem = document.getElementById('totalHalamanx');

                pageKeElem.textContent = currentPage;
                totalHalamanElem.textContent = pdfDoc.numPages;
            });
        };

        loadPdf();

        document.getElementById('prev-slidex').addEventListener('click', () => {
            if (currentPage > 1) { // Periksa jika currentPage bukan 1
                currentPage--;
            } else {
                currentPage = pdfDoc
                    .numPages; // Jika currentPage adalah 1, maka set currentPage ke jumlah total halaman
            }

            const pageKeElem = document.getElementById('pageKex');
            pageKeElem.textContent = currentPage;

            // Juga pastikan untuk memperbarui tampilan halaman yang ditampilkan
            const carouselInner = document.querySelector('.carouselx');
            const activePage = carouselInner.querySelector('.carousel-item.active');
        });



        $(document).on('click', '#next-slidex', function (e) {
            let id_submateri = $('#id_submateri').val();
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            if (currentPage < pdfDoc.numPages) {
                currentPage++;
                const carouselInner = document.querySelector('.carouselx');
                const activePage = carouselInner.querySelector('.carousel-item.active');
                const pageKeElem = document.getElementById('pageKex');
                pageKeElem.textContent = currentPage;
                console.log(currentPage);
                console.log(pdfDoc.numPages);
                let progres = (currentPage * 100) / pdfDoc.numPages;
                console.log(progres);
                $.ajax({
                    method: 'post',
                    url: '/update-progres-pdf',
                    data: {
                        _token: csrfToken,
                        id_submateri: id_submateri,
                        id_materi: id_materi,
                        progres: Math.floor(progres)
                    },
                    success: function (res) {
                        console.log(res);
                    }
                });
            } else {
                currentPage = 1;
                const pageKeElem = document.getElementById('pageKex');
                pageKeElem.textContent = currentPage;
                return; // Menghentikan eksekusi jika ini adalah halaman terakhir
            }
        });

    });

</script> --}}
@endsection
