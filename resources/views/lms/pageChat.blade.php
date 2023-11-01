@extends('lms.main')
@section('container')
<link rel="stylesheet" href=" {{ asset('css/pageChat.css')}}">
<style>
    #controls,
    .carousel-inner {
        height: 100%;
        overflow: auto;
    }

    canvas {
        height: auto;
    }
    video{
        height: 50vh;
    }

</style>

<div class="Content px-4 px-lg-5">
    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="row mt-3">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="top_profile">
                        <div class="tp_left d-flex align-items-center gap-4">
                            <div class="tpl_img">
                                <img src="{{asset ('../img/senbud-icon.png')}} " alt="" class="">
                            </div>
                            <div class="tpl_title">
                                <h5 class="mb-0 fw-bold">{{$sub_materi->nama}}</h5>
                                <hr> Author : <span class="badge badge-sm bg-secondary"><i class="fa fa-user"></i>
                                    {{$sub_materi->name}}</span>
                            </div>
                        </div>
                        <p class="mb-0 mt-4 text-justify">Deskripsi : <br> {{$sub_materi->deskripsi}}</p>
                        <input type="text" value="{{$sub_materi->id}}" id="id_submateri">
                        <input type="text" value="{{$sub_materi->file_location}}" id="file_location">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row mt-3">
                <div class="col-md-12 px-1">
                    <a href="{{url('/')}}/add-status/{{$sub_materi->id}}" class="btn btn-success btn-sm"><i
                            class="fa fa-paper-plane"></i> Selesai Materi</a>
                    <div class="navigation-buttons" style="float: right">
                        <span>Page : <span id="pageKe"></span> / <span id="totalHalaman"></span></span>
                    </div>
                    <div style="margin-top: 2%; padding: 10px 70px; height:100vh; background-color:#3b3b3b; border-radius:5px" id="pdf-container">
                        <div id="controls" class="carousel slide" data-interval="false">
                            <div class="carousel-inner" data-interval="false">
                            </div>
                            <button class="carousel-control-prev" id="prev-slide" style="z-index: 9999" type="button"
                                data-bs-target="#controls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" id="next-slide" style="z-index: 9999" type="button"
                                data-bs-target="#controls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div id="video-container" style="margin-top: 2%; padding: 10px ; height:50vh; background-color:#3b3b3b; border-radius:5px"></div>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
$(document).ready(function () {
    // const fileUrl = '/storage/data_upload_lms/HVETLEWJ1PLYq9rNbFsigQdIQGZqByvd6isMSqve.pdf';
    let id_submateri = $('#id_submateri').val();
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    let fileUrl = $('#file_location').val();
    console.log("tes",fileUrl)


    let currentPage = 1;
    let pdfDoc = null;

    const loadPdf = async () => {
        try {
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
        } catch (error) {
            console.error('Error loading PDF:', error);
        }
    };

    const renderPage = (pageNumber, canvas) => {
        pdfDoc.getPage(pageNumber).then((page) => {
            const viewport = page.getViewport({
                scale: .5
            });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const ctx = canvas.getContext('2d');
            const renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };

            page.render(renderContext);
            const pageKeElem = document.getElementById('pageKe');
            const totalHalamanElem = document.getElementById('totalHalaman');

            pageKeElem.textContent = currentPage;
            totalHalamanElem.textContent = pdfDoc.numPages;
        });
    };

    let fileExtension = fileUrl.split('.').pop().toLowerCase();
    if (fileExtension == 'pdf') {
        $('#video-container').hide();
        loadPdf();
        
    } else {
        $('#pdf-container').hide();
        const videoElement = document.createElement('video');
        videoElement.controls = true;
        videoElement.src = fileUrl;

        $('#video-container').append(videoElement);

        videoElement.addEventListener('loadedmetadata', function() {
            const video = this;

            video.addEventListener('timeupdate', function() { 
                const currentTime = video.currentTime;
                const duration = video.duration;
                const progres = (currentTime / duration) * 100;

                console.log('Waktu saat ini:', currentTime);
                console.log('Durasi total:', duration);
                console.log('Progres:', Math.floor(progres));
                $.ajax({
                    method: 'post',
                    url: '/update-progres',
                    data: {
                        _token: csrfToken,
                        id_submateri: id_submateri,
                        progres: Math.floor(progres)
                    },
                    success: function (res) {
                        console.log(res);
                    }
                });
            });
        });
    }
//    loadPdf();

    document.getElementById('prev-slide').addEventListener('click', () => {
        if (currentPage > 1) {  // Periksa jika currentPage bukan 1
            currentPage--;
        } else {
            currentPage = pdfDoc.numPages;  // Jika currentPage adalah 1, maka set currentPage ke jumlah total halaman
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
            let progres = (currentPage * 100 ) / pdfDoc.numPages;
            console.log(progres);
            $.ajax({
                method: 'post',
                url: '/update-progres',
                data: {
                    _token: csrfToken,
                    id_submateri: id_submateri,
                    progres: Math.floor(progres)
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
</script>
@endsection
